<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<script type="text/javascript" src="lib/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="lib/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/ini.js"></script>
<script type="text/javascript" src="js/registro.js"></script>
<form id="regpros" name="regpros" method="post">
<label for="textfield">Nombres:</label>
<input type="text" name="nombre" id="nombre"><br>
<label for="textfield">Apellidos:</label>
<input type="text" name="apellido" id="apellido"><br>
<label for="textfield">Email:</label>
<input type="text" name="email" id="email"><br>
<label for="textfield">Pais:</label>
<input type="text" name="pais" id="pais"><br>
<label for="textfield">Ciudad:</label>
<input name="ciudad" type="text" disabled="disabled" id="ciudad"><br>
<label for="textfield">Revista:</label>
<input type="text" name="revista" id="revista">
<input type="hidden" name="opt" id="opt" value="respros">
<input type="submit" name="submit" id="submit" value="Submit">
</form>
<div id="respuesta"></div>
</body>
</html>