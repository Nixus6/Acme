<?php

require_once "Conexion.php";

class LoginM extends Conexion
{

    protected static function Iniciar_Sesion_M($datos)
    {
        try {
            $sql = Conexion::conectar()->prepare("CALL Loguear(:Usuario,:Clave)");
            $sql->bindParam(':Usuario', $datos['Usuario']);
            $sql->bindParam(':Clave', $datos['Clave']);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Iniciar_Sesion_M ' . $e->getMessage();
        }
    }

    protected static function Consultar_Datos_Usuario_M($cedula)
    {
        try {
            $sql = Conexion::conectar()->prepare("CALL Usuario($cedula,'DatosUsuario')");
            // $sql = Conexion::conectar()->prepare("Select * from usuario where cedula_U = $cedula;");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Consultar_Datos_Usuario_M' . $e->getMessage();
        }
    }

}
