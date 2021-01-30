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

    protected static function Cerrar_Sesion_M($datos)
    {
        try {
            if ($datos['usuario'] != "" && $datos['id_S'] == $datos['id_Boton']) {
                // $sql = Conexion::conectar()->prepare("UPDATE bitacoraaccesos SET hora_fin = ".$datos['HFin']." WHERE id_bitacoraaccesos = ".$datos['idBitacora']);
                // $sql = Conexion::conectar()->prepare("UPDATE bitacoraaccesos SET hora_fin = '11:44:47 am' WHERE id_bitacoraaccesos = ".$datos['idBitacora']);
                $sql = Conexion::conectar()->prepare("UPDATE bitacoraaccesos SET hora_fin = '11:44:47 am' WHERE id_bitacoraaccesos = Id");
                // $sql->bindParam("Hora", $datos['Hora']);
                $sql->bindParam("Id", $datos['idBitacora']);
                $sql->execute();
                // return $sql;
                if($sql->rowCount()==1){
                // if($sql == true){
                    session_unset();
                    session_destroy();
                    $respuesta = "true";
                } else{
                  $respuesta = "false";  
                }
            } else {
                $respuesta = "false";
            }
            return $respuesta;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Cerrar_Sesion_M ' . $e->getMessage();
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
