<?php
require_once "Modelos/adminM.php"; // Asegúrate de que la ruta sea correcta

class AdminC {
    public function IngresoC() {
        if (isset($_POST["usuarioI"]) && isset($_POST["claveI"])) {
            $datosC = array(
                "usuario" => $_POST["usuarioI"],
                "clave" => $_POST["claveI"]
            );

            $tablaBD = "administradores";
            $respuesta = AdminM::IngresoM($datosC, $tablaBD);

            if ($respuesta && $respuesta["usuario"] == $datosC["usuario"] && $respuesta["clave"] == $datosC["clave"]) {
                session_start();
                $_SESSION["ingreso"] = true; // ✅ usa 'ingreso' en minúscula para que funcione con empleados.php
                header("Location: index.php?ruta=empleados");
                exit();
            } else {
                echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";
            }
        }
    }
}