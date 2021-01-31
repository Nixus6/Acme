<?php
if ($peticionAjax) {
    require_once "../models/LoginM.php";
    require_once "../functions/mainFunction.php";
} else {
    require_once "app/models/LoginM.php";
    require_once "app/functions/mainFunction.php";
}

class LoginC extends LoginM
{

    public function Iniciar_Sesion_C()
    {
        $functions = new mainFunction();
        $usuario = $functions->limpiar_cadena($_POST['user']);
        $clave = $functions->limpiar_cadena($_POST['password']);

        $clave = $functions->encryptation($clave);

        $datoslogin = [

            "Usuario" => $usuario,
            "Clave" => $clave

        ];

        $datosCuenta = LoginM::Iniciar_Sesion_M($datoslogin);

        $Acceso = $datosCuenta->fetch();

        if ($Acceso['usuario'] != $usuario) {
            echo '<script type="text/javascript">
            alert("Usuario Incorrecto");
            </script>';
        } elseif ($Acceso['clave'] != $clave) {
            echo '<script type="text/javascript">
            alert("Contraseña Incorrecta");
            </script>';
        } elseif ($Acceso['estado'] == "I") {
            echo '<script type="text/javascript">
            alert("Se Encuentra Inactivo en La Plataforma");
            </script>';
        } else {

            session_start(['name' => 'SAcme']);

            //Datos Usuario
            $DatosSession = LoginM::Consultar_Datos_Usuario_M($Acceso['cedula_U']);
            $rowS = $DatosSession->fetch();
            $_SESSION['Nombre_U'] = $rowS['nombre'];
            $_SESSION['Apellido_U'] = $rowS['apellido'];

            //Datos Acceso       
            $_SESSION['id']  = $Acceso['id_Acceso'];
            $_SESSION['usuario'] =  $Acceso['usuario'];
            $_SESSION['cedula'] = $Acceso['cedula_U'];

            //Datos Privilegio
            $DatosPrivilegio = $functions->ejecutar_consulta_simple("SELECT privilegio from Privilegio where id_privilegio ='" . $Acceso['privilegio_id'] . "'");
            $Privilegio = $DatosPrivilegio->fetch();
            $_SESSION['Privilegio'] = $Privilegio['privilegio'];

            $url = SERVERURL . "Principal/";

            return '<script> window.location="' . $url . '"</script>';
        }
    }
    public function Iniciar_Sesion_Al_Registrar_C($user,$Password)
    {
        $functions = new mainFunction();
        $usuario = $functions->limpiar_cadena($user);
        $clave = $functions->limpiar_cadena($Password);

        $datoslogin = [

            "Usuario" => $usuario,
            "Clave" => $clave

        ];

        $datosCuenta = LoginM::Iniciar_Sesion_M($datoslogin);

        $Acceso = $datosCuenta->fetch();

        if ($Acceso['usuario'] != $usuario) {
            echo '<script type="text/javascript">
            alert("Usuario Incorrecto");
            </script>';
        } elseif ($Acceso['clave'] != $clave) {
            echo '<script type="text/javascript">
            alert("Contraseña Incorrecta");
            </script>';
        } elseif ($Acceso['estado'] == "I") {
            echo '<script type="text/javascript">
            alert("Se Encuentra Inactivo en La Plataforma");
            </script>';
        } else {

            session_start(['name' => 'SAcme']);

            //Datos Usuario
            $DatosSession = LoginM::Consultar_Datos_Usuario_M($Acceso['cedula_U']);
            $rowS = $DatosSession->fetch();
            $_SESSION['Nombre_U'] = $rowS['nombre'];
            $_SESSION['Apellido_U'] = $rowS['apellido'];

            //Datos Acceso       
            $_SESSION['id']  = $Acceso['id_Acceso'];
            $_SESSION['usuario'] =  $Acceso['usuario'];
            $_SESSION['cedula'] = $Acceso['cedula_U'];

            //Datos Privilegio
            $DatosPrivilegio = $functions->ejecutar_consulta_simple("SELECT privilegio from Privilegio where id_privilegio ='" . $Acceso['privilegio_id'] . "'");
            $Privilegio = $DatosPrivilegio->fetch();
            $_SESSION['Privilegio'] = $Privilegio['privilegio'];

            $url = SERVERURL . "Principal/";

            return '<script> window.location="' . $url . '"</script>';
        }
    }

    public function Cerrar_Sesion_C()
    {
        session_start(['name' => 'SAcme']);
        $functions = new mainFunction();
        $idAcceso = $functions->decryption($_GET["token"]);
        if ($_SESSION['usuario'] != "" && $_SESSION['id'] == $idAcceso) {
            session_unset();
            session_destroy();
            return "true";
        }
    }

    public function Forzar_Cierre_Sesion_C()
    {
        session_destroy();
        return header("location:" . SERVERURL . "login/");
    }
}
