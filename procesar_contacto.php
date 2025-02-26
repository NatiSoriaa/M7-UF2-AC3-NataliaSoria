<?php
// Incluir el autoload.php de Composer para cargar todas las dependencias para enviar correos
require 'vendor/autoload.php'; 
//importamos las clases necesarias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Validamos que los campos obligatorios esten completos
if (empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["mensaje"])) {
    die("Todos los campos son obligatorios.");//si estan vacios el programa se detiene (no se encia el correo)
}

// Validamos el correo electronico (debe tener un formato valido usuario@gmail.com)
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Correo electrónico no valido.");
}

// Verificar si se subio un archivo 
$adjunto = null;//le asignamos a la variable null por defecto y despues verificamos que el usuario subio un archivo
if (!empty($_FILES["archivo"]["name"])) {
    $permitidos = ["image/jpeg", "image/png", "application/pdf"];//archivos permitidos
    $max_size = 2 * 1024 * 1024; // esto equivale a 2MB como maximo
    //si el archivo es mas grande detiene el programa
    if ($_FILES["archivo"]["size"] > $max_size) {
        die("El archivo es demasiado grande (Máx 2MB).");
    }
    //si es un tipo de archivo diferente a los permitidos se detiene el programa
    if (!in_array($_FILES["archivo"]["type"], $permitidos)) {
        die("Formato de archivo no permitido.");
    }

    $adjunto = $_FILES["archivo"]["tmp_name"];//guardamos la ubicacion temporal del archivo y despues se adjunta
}

// Configuracion de PHPMailer
//creamos un objeto phpmailer para enviar el correo
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';//nos conectamos a Gmail
    $mail->SMTPAuth = true;
    $mail->Username = ' '; // Aca deberemos ingresar nuestro gmail
    $mail->Password = ' '; // Aca deberemos ingresar la contraseña de aplicacion del gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port = 587; // el puerto de conexion al gmail

    // Configurar remitente y destinatario
    $mail->setFrom('', ''); //Asignamos como primer parametro nuestro gmail y segundo parametro nuestro nombre, para que le aparezca al destinatario quien lo envio 
    $mail->addAddress(" "); //gmail a donde se quiere enviar el email

    // Adjuntar archivo si existe
    if ($adjunto) {
        $mail->addAttachment($adjunto, $_FILES["archivo"]["name"]);// si el usuario anteriormente, adjunto un archivo lo adjunta al correo
    }

    // Contenido del correo
    $mail->isHTML(true); // permitimos que el mensaje tenga un formato basico, y no se reciba todo en una linea
    $mail->Subject = "Mensaje de contacto"; //asunto del correo
    //creamos un cuerpo de mensaje con html (nombre, email, mensaje, etc.)
    $mail->Body = "<h1>Nuevo mensaje de contacto</h1><p><strong>Nombre:</strong> {$_POST["nombre"]}</p><p><strong>Email:</strong> {$_POST["email"]}</p><p><strong>Mensaje:</strong><br>" . nl2br($_POST["mensaje"]) . "</p>";
    $mail->AltBody = "Nombre: {$_POST["nombre"]}\nEmail: {$_POST["email"]}\nMensaje: {$_POST["mensaje"]}";

    // Por ultimo se envia el correo
    $mail->send();
    echo "El mensaje se ha enviado correctamente.";
} catch (Exception $e) { // en caso de haber un error lo adjunta a la lista de errores en error.log
    file_put_contents("error.log", date("Y-m-d H:i:s") . " - Error al enviar correo: " . $mail->ErrorInfo . PHP_EOL, FILE_APPEND);
    echo "Hubo un error al enviar el mensaje: " . $mail->ErrorInfo;
}
?>
