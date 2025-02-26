<?php
// aplicamos el bloque de codigo dentro del try para generar excepciones con catch si ocurre algun error
try {
    //verificamos que los valores ingresados sean solo numericos con is_numeric
    // en mi caso en los input del formulario calculadora.php los he ingresado manualmente (solo permite numeros)
    if (!is_numeric($_POST["numerador"]) || !is_numeric($_POST["denominador"])) {
        throw new Exception("Ambos valores deben ser numeros.");
    }
    //realizamos una condicion de que si el valor enviado en el denominador es igual a 0 muestra un mensaje
    if ($_POST["denominador"] == 0) {
        throw new Exception("No se puede dividir por cero.");
    }
    // si todo es correcto mostrara el resultado de la division entre el numerador y denominador 
    echo "Resultado: " . ($_POST["numerador"] / $_POST["denominador"]);
} 
catch (Exception $e) { //capturamos los errores en error.log con fecha y hora
    file_put_contents("error.log", date("Y-m-d H:i:s") . " - " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo $e->getMessage();
}
?>
<button type="submit"><a href="calculadora.php">Volver atras</a></button>
