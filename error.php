<?php
session_start();
$errorMensaje = isset($_SESSION["error"]) ? $_SESSION["error"] : "Ocurrió un error.";
session_unset(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Error en el registro</h2>
    <p><?php echo htmlspecialchars($errorMensaje); ?></p>
    <button><a href="registro.php">Volver al formulario</a></button>
</body>
</html>
