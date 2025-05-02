<?php
session_start();

if(!$_SESSION["ingreso"]){
	header("location:index.php?ruta=ingreso");
	exit();
}

?>
	<br>
	<h1>REGISTRAR UN EMPLEADO</h1>

	<form method="post" action="">
		
		<input type="text" placeholder="Nombre" name="nombreR" required>

		<input type="text" placeholder="Apellido" name="apellidoR" required>

		<input type="email" placeholder="Email" name="emailR" required>

		<input type="text" placeholder="Puesto" name="puestoR" required>

		<input type="text" placeholder="Salario" name="salarioR" required>

		<input type="submit" value="Registrar">

	</form>

	<?php
	require_once "Controladores/empleadosC.php";
	require_once "Modelos/empleadosM.php";

	$registrar = new EmpleadosC();
	$mensaje = $registrar -> RegistrarEmpleadosC();

	if(isset($mensaje)){
		echo "<p style='color:green'>$mensaje</p>";
	}

	?>