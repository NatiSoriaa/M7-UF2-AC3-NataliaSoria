<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Registro de Usuario</h2>
<form class="registroForm" action="procesar_registro.php" method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" >
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password"  >
    
    <button type="submit"><a>Registrarse</a></button>
    <button type="submit"><a href="inicio.php">Volver al inicio</a></button>
</form>

</body>
</html>
