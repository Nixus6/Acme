<?php

require_once "Conexion.php";

class RegisterPropietaryM extends Conexion
{
    protected static function Crear_Propietario($datos)
    {
        // Estructura insert registrar un nuevo usuario
        $sql = conexion::conectar()->prepare("INSERT INTO usuario (cedula,nombre,apellido,direccion,telefono,ciudad) 
                values (:Cedula,:Nombre:,Apellido,:Direccion,:Telefono,:Ciudad)");
        // Datos en Array
        $sql->bindParam(":Cedula", $datos['Documento']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":Direccion", $datos['Direccion']);
        $sql->bindParam(":Telefono", $datos['Telefono']);
        $sql->bindParam(":Ciudad", $datos['Ciudad']);
        //Ejecutar 
        $sql->execute();
        return $sql;
    }

    protected function Crear_Acceso($datos)
    {
        // Estructura insert registrar un nuevo usuario
        $sql = conexion::conectar()->prepare("INSERT INTO acceso (usuario,clave,cedula_U,privilegio_id) 
        values (:Usuario,:Clave,:Cedula,:PLicitaciones,:PCertificaciones,:Acceso)");
        // Datos en Array
        $sql->bindParam(":Usuario", $datos['Usuario']);
        $sql->bindParam(":Clave", $datos['Clave']);
        $sql->bindParam(":Cedula", $datos['Cedula']);
        $sql->bindParam(":Privilegio", $datos['Privilegio']);
        //Ejecutar 
        $sql->execute();
        return $sql;
    }

    protected function eliminar_usuario($codigo)
    {
        // Estructura insert registrar un nuevo usuario
        $sql = SELF::conectar()->prepare("DELETE FROM usuario WHERE cedula_U=:Codigo");
        // Datos en Array
        $sql->bindParam(":Codigo", $codigo);
        //Ejecutar 
        $sql->execute();
        return $sql;
    }
}
