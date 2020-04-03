<?php
// print_r($_POST);     //  Array ( [email] => aa@ru [message] => текст сообщения [send] => ) 

$email = $_POST['email'];
$message = $_POST['message'];

$error = '';

if (trim($email) == '')
    $error = 'Вы не ввели Email';
elseif (trim($message) == '')
    $error = 'Вы не написали сообщение';
elseif (strlen($message) < 10)
    $error = 'Ваше сообщение меньше 10 символов';



if ($error != '') {
    echo $error;
    exit;
}

$mailto = 'homo-2017@yandex.ru';
$subject1 = 'Тестовое письмо';
$body = $message;
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n";


mail($mailto, "=?utf-8?B?" . base64_encode($subject1) . "?=", $body, $headers);

// echo 'good';
header('Location: /about.php');

?><br>