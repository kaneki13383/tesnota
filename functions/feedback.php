<?php

session_start();

require './connect.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$comment = $_POST['comment'];

$sql = $connect->query("INSERT INTO `feedback` (`name`, `surname`, `email`, `comment`) VALUES ('$name', '$surname', '$email', '$comment')");
header("Location: ../output/index.php");