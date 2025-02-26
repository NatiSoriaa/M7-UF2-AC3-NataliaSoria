<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Calculadora</h2>
<form class="calculadoraForm"action="procesar_calculadora.php" method="POST">
    <label for="numerador">Numero 1:</label>
    <input type="number" name="numerador" required>
    <label for="denominador">Numero 2:</label>
    <input type="number" name="denominador" required>
    
    <button type="submit"><a>Dividir</a></button>
    <button type="submit"><a href="inicio.php">Volver al inicio</a></button>
</form>
</body>
</html>
