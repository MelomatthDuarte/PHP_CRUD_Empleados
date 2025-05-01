<?php
require_once "conexionBD.php"; // Asegúrate de que esta línea esté presente

class AdminM extends ConexionBD {

    static public function IngresoM($datosC, $tablaBD) {
        // Preparamos la consulta SQL
        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave FROM $tablaBD WHERE usuario = :usuario");

        // Vinculamos el parámetro de forma segura
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        // Ejecutamos la consulta
        $pdo->execute();

        // Recuperamos los resultados
        $resultado = $pdo->fetch();

        // Cerramos la conexión
        $pdo = null;

        return $resultado;
    }
}
?>