<!DOCTYPE html>
<html> 
<head> 
	<title>Ejemplo Formularios</title> 
</head> 
<body>
<h1>Ejemplo de procesado de formularios</h1>
<h2>GET</h2> 
	<form action="ejemplo1.php" method="get">
        <label for="nombre">Introduzca su nombre:</label>
		<input type="text" id="nombre" name="nombre">
		<br/> 
        <label for="apellido">Introduzca sus apellidos:</label>
		<input type="text" id="apellido" name="apellidos"><br/> 
        <label for="edad">Introduzca su edad:</label>
		<input type="number" id="edad" name="edad"><br/> 

		<input type="submit" name="enviar" value="Enviar">
	</form>
    <h2>POST</h2> 
	<form action="ejemplo1.php" method="post">
        <label for="nombre">Introduzca su nombre:</label>
		<input type="text" id="nombre" name="nombre">
		<br/> 
        <label for="apellido">Introduzca sus apellidos:</label>
		<input type="text" id="apellido" name="apellidos"><br/> 
        <label for="edad">Introduzca su edad:</label>
		<input type="number" id="edad" name="edad"><br/> 
		<input type="submit" name="enviar" value="Enviar">
	</form>
</body> 
</html> 