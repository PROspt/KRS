<?php 
require __DIR__.'/db_connect.php';

$stmt = $pdo->prepare("SELECT email, first_name FROM users");
$stmt->execute();
$emails = $stmt->fetchAll();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/phpmailer/src/Exception.php';
require __DIR__.'/phpmailer/src/PHPMailer.php';
require __DIR__.'/phpmailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';

$yourEmail = 'TheTildaT@yandex.ru'; // ваш email на яндексе
$password = 'obtzcxhqmeryiqjd'; // ваш пароль к яндексу или пароль приложения

$message = $_POST['mail-doc'];

// настройки SMTP
$mail->Mailer = 'smtp';
$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = $yourEmail; // ваш email - тот же что и в поле From:
$mail->Password = $password; // ваш пароль;


// формируем письмо

// от кого: это поле должно быть равно вашему email иначе будет ошибка
foreach($emails as $us){
    $mail->setFrom($yourEmail, 'DevRel Hack 2.0');

    // кому - получатель письма
    $mail->addAddress($us['email'], $us['first_name']);  // кому

    $mail->Subject = 'Проверка';  // тема письма

    $mail->msgHTML($message);
    $mail->send();


};
if ($mail->send()) { // отправляем письмо
    header("Location: /admin.php");
    exit( );
} else {
    echo 'Ошибка: ' . $mail->ErrorInfo;
}

?>