<?php

require_once "Conexion.php";

class VehiculoM extends Conexion
{
    protected static function Consultar_Vehiculos($dato)
    {
        try {

            $sql = conexion::conectar()->prepare("SELECT * FROM Vehiculo WHERE propietario_id = $dato");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase UsuarioM Metodo Consultar_Vehiculos' . $e->getMessage();
        }
    }
    protected static function Consultar_Todos_Vehiculos()
    {
        try {

            $sql = conexion::conectar()->prepare("SELECT * FROM Vehiculo");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase UsuarioM Metodo Consultar_Vehiculos' . $e->getMessage();
        }
    }
    
    protected static function Crear_Vehiculo($datos)
    {

        $sql = conexion::conectar()->prepare("INSERT INTO Vehiculo (Placa, Color, Marca, Tipo, propietario_id) 
        values (:Placa, :Color, :Marca, :Tipo, :Propietario)");
        // Datos en Array
        $sql->bindParam(":Placa", $datos['Placa']);
        $sql->bindParam(":Color", $datos['Color']);
        $sql->bindParam(":Marca", $datos['Marca']);
        $sql->bindParam(":Tipo", $datos['Tipo']);
        $sql->bindParam(":Propietario", $datos['Propietario']);
        // Ejecutar 
        $sql->execute();
        return $sql;
    }
}
