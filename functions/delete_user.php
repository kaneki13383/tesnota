<?php
session_name();

require './connect.php';

$id = $_GET['id'];

$sql = $connect->query("DELETE FROM users WHERE `users`.`id` = '$id'");
$_SESSION['del-user'] = 1;
header("Location: ../output/admin");