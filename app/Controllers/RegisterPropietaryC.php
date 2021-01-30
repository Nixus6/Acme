<?php
if ($peticionAjax) {
    require_once "../models/RegisterPropietaryM.php";
    require_once "../functions/mainFunction.php";
} else {
    require_once "app/models/RegisterPropietaryM.php";
    require_once "app/functions/mainFunction.php";
}

class RegisterPropietaryC extends RegisterPropietaryM
{
    public function RegistrarPropietario()
    {
        $functions = new mainFunction();

        //datos Propietario
        $documento = $functions->limpiar_cadena($_POST['document']);
        $nombre = $functions->limpiar_cadena($_POST['name']);
        $apellido = $functions->limpiar_cadena($_POST['surname']);
        $direccion = $functions->limpiar_cadena($_POST['address']);
        $telefono = $functions->limpiar_cadena($_POST['phone']);
        $ciudad = $functions->limpiar_cadena($_POST['city']);

        //datos Acceso
        $Usuario = $functions->limpiar_cadena($_POST['user']);
        $Clave = $functions->limpiar_cadena($_POST['password']);

        $usuarioExiste = $functions->ejecutar_consulta_simple("SELECT cedula_U from usuario where cedula_U = $documento");

        if ($usuarioExiste->rowCount() >= 1) {
            echo '<script type="text/javascript">
            alert("El Numero de Documento Ingresado ya se Encuentra Registrado");
            </script>';
        } else {
            $UsuarioExiste = $functions->ejecutar_consulta_simple("SELECT usuario From
            acceso WHERE usuario = $Usuario");
            if ($UsuarioExiste->rowCount() >= 1) {
                echo '<script type="text/javascript">
                alert("El Usuario Ingresado ya se Encuentra Registrado");
                </script>';
            } else {
                $datosP = [
                    "Documento" => $documento,
                    "Nombre" => $nombre,
                    "Apellido" => $apellido,
                    "Direccion" => $direccion,
                    "Telefono" => $telefono,
                    "Ciudad" => $ciudad
                ];
                $guardarPropietario = RegisterPropietaryM::Crear_Propietario($datosP);
                if ($guardarPropietario->rowCount() >= 1) {
                    $clave = $functions->encryptation($Clave);
                    $dataA = [
                        "Usuario" => $Usuario,
                        "Clave" => $clave,
                        "Cedula" => $documento,
                        "Privilegio" => 2
                    ];
                    $guardarAcceso = RegisterPropietaryM::Crear_Acceso($dataA);
                    if ($guardarAcceso->rowCount() >= 1) {
                        //se loguea
                    } else {
                        RegisterPropietaryM::eliminar_usuario($documento);
                        echo '<script type="text/javascript">
                        alert("No Hemos Podido Crear El Acceso  Para El Nuevo Usuario Intentelo de Nuevo");
                        </script>';
                    }
                } else {
                    echo '<script type="text/javascript">
                    alert("No Hemos Podido Crear El Usuario Intentelo de Nuevo");
                    </script>';
                }
            }
        }
    }
}
