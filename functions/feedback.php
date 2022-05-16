<?php

session_start();

$to = "kdo17107@gmail.com"; // емайл получателя данных из формы
$tema = "Отзыв о кафе ТЕСНОТА"; // тема полученного емайла
$message = "Ваше имя: ".$_POST['name']."<br>";//присвоить переменной значение, полученное из формы name=name
$message .= "Фамилия: ".$_POST['surname']."<br>";
  $message .= "E-mail: ".$_POST['email']."<br>"; //полученное из формы name=email
$message .= "Сообщение: ".$_POST['comm']."<br>"; //полученное из формы name=message
$headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
mail($to, $tema, $message, $headers); //отправляет получателю на емайл значения переменных

header("Location: ../output/index.php");