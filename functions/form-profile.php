<?php 

session_start();

require './connect.php';

$id = $_POST['id'];

$number = $_POST['number'];
$adress = $_POST['adress'];

$add_info = $connect->query("UPDATE `users` SET `number` = '$number' WHERE `users`.`id` = '$id'");
$add_info = $connect->query("UPDATE `users` SET `adress` = '$adress' WHERE `users`.`id` = '$id'");

$_SESSION['message-form-profile'] = 'Изменения сохранены!'; 

header("Location: ../output/profile.php");