<?php
require_once "conexionBD.php";

class EmpleadosM extends ConexionBD {

    // Registrar empleados en la base de datos MySQL:
    static public function RegistrarEmpleadosM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, apellido, email, puesto, salario) VALUES (:nombre, :apellido, :email, :puesto, :salario)");

        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo->bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

        $resultado = $pdo->execute();

        $pdo = null;

        if($resultado){
            return "Todo bien.";
        }else{
            return "Error, volver a intentarlo";
        }
    }

    // Mostrar empleados 
    static public function MostrarEmpleadosM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD");

        $pdo-> execute();

        $resultado = $pdo->fetchAll();
        $pdo = null;
        return $resultado;
    }

    //Editar empleados
    static public function EditarEmpleadoM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD WHERE id = :id");

        $pdo-> bindParam(":id", $datosC, PDO::PARAM_INT);

        $pdo -> execute();

        $resultado = $pdo -> fetch();
        $pdo = null;
        return $resultado;
    }

    //Actualizar empleado:
    static public function ActualizarEmpleadoM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()->prepare(
            "UPDATE $tablaBD SET 
                nombre = :nombre, 
                apellido = :apellido, 
                email = :email, 
                puesto = :puesto, 
                salario = :salario 
            WHERE id = :id"
        );
    
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo->bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);
    
        $resultado = $pdo->execute();
        $pdo = null;
    
        if($resultado){
            return "Todo bien.";
        }else{
            return "Error, volver a intentarlo";
        }
    }

    //Borrar empleado:
    static public function BorrarEmpleadoM($datosC, $tablaBD) {

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM " . $tablaBD . " WHERE id = :id");
    
        $pdo->bindParam(":id", $datosC, PDO::PARAM_INT);
    
        if ($pdo->execute()) {
            return "Bien";
        } else {
            return "Error";
        }
    
        // Cierre correcto de la conexión (opcional en PDO)
        $pdo = null;
    }
}

?>