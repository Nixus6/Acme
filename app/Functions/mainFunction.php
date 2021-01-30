<?php
if ($peticionAjax == true) {
    require_once "../models/Conexion.php";
} else {
    require_once "app/models/Conexion.php";
}


const METHOD = "AES-256-CBC";
const SECRET_KEY = '$Acme@2021';
const SECRET_IV = '101712';

class mainFunction extends Conexion
{
    public function ejecutar_consulta_simple($consulta)
    {
        $respuesta = SELF::conectar()->prepare($consulta);
        $respuesta->execute();
        return $respuesta;
    }
    
    public function encryptation($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    public function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    public function generar_codigo_aleatorio($letra, $longitud, $num)
    {
        for ($i = 1; $i <= $longitud; $i++) {
            $numero = rand(0, 9);
            $letra .= $numero;
        }
        return $letra . $num;
    }

    public function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("<script>", "", $cadena);
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src>", "", $cadena);
        $cadena = str_ireplace("<script type=>", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        return $cadena;
    }
}
