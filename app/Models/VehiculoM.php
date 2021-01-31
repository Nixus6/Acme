<?php

require_once "Conexion.php";

class VehiculoM extends Conexion
{
    protected static function Consultar_Vehiculos()
    {
        try {

            $sql = conexion::conectar()->prepare("SELECT * FROM Vehiculo");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase UsuarioM Metodo Consultar_Vehiculos' . $e->getMessage();
        }
    }
}