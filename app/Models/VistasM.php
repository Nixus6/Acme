<?php
class VistasM
{
    protected function obtener_vistas_m($vistas)
    {
        $listablanca = [
            "Principal",
        ];

        if (in_array($vistas, $listablanca)) {
            if (is_file("app/views/") . $vistas . ".php") {
                $contenido[] = array(
                    "url" => "app/views/" . $vistas . ".php",
                    "seccion" => "Principal",
                    "UbicacionAjax" => $vistas,
                );
            } else {
                $contenido = "login";
            }
        } else if ($vistas == "RegisterPropietary") {
            $contenido = "RegisterPropietary";
        } elseif ($vistas == "login") {
            $contenido = "login";
        } elseif ($vistas == "index") {
            $contenido = "login";
        } else {
            $contenido = "login";
        }
        return $contenido;
    }
}
