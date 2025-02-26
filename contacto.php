<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</head>
<body>
    <h2>Formulario de Contacto</h2>
    
    <form class="contactoForm" action="procesar_contacto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label for="email">Correo Electronico:</label>
        <input type="email" name="email" required>
        
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" required></textarea>
        
        <label for="archivo">Adjuntar archivo (Máx 2MB, jpg/png/pdf):</label>
        <input type="file" name="archivo">
        
        <button type="submit"><a>Enviar</a></button>
        <button type="submit"><a href="inicio.php">Volver al inicio</a></button>
    </form>
</body>
</html>
