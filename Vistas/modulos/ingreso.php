<?php
require_once "Controladores/adminC.php"; // Asegúrate de que esta ruta es correcta

?>
<br>
<h1>INGRESAR</h1>

<form method="post" action="">
    <input type="text" placeholder="Usuario" name="usuarioI" required>
    <input type="password" placeholder="Contraseña" name="claveI" required>
    <input type="submit" value="Ingresar">
</form>

<?php
$ingreso = new AdminC();
$ingreso->IngresoC();
?>