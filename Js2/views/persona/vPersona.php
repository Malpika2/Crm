<!DOCTYPE html>
<html>
<head>
	<title>Persona</title>
</head>
<body>
<h1>Persona</h1>
<form action=" <?php echo base_url();?>cPersona/guardar" method="POST">
	<table>
		<tbody>
			<tr>
				<td>
					<label>Nombre</label>
					<input type="text" name="txtnombre">
				</td>
			</tr>
			<tr>
				<td>
					<label>Materno</label>
					<input type="text" name="txtmaterno">

				</td>
			</tr>
			<tr>
				<td>
					<label>Paterno</label>
					<input type="text" name="txtpaterno">

				</td>
			</tr>
			<tr>
				<td>boton
					<input type="submit" name="btnAgregar" value="Agregar">
				</td>
			</tr>
			<tr>
				<td>
					<label>Clave</label>
					<input type="text" name="txtclave">

				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo base_url();?>cPersona/otra"><label>Usuario</label></a>
					<input type="text" name="txtusuario">

				</td>
			</tr>
		</tbody>
	</table>
</form>
</body>
</html>