<?php
session_start();

require './connect.php';

$name = $_POST['name'];
$discription = $_POST['discription'];
$price = $_POST['price'];
$type = $_POST['type'];

$img = 'img_menu/' . $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], '../' . $img);

$sql = $connect->query("INSERT INTO `menu` (`name`, `img`, `discription`, `price`, `type`) VALUES ('$name', '$img', '$discription', '$price', '$type')");
$_SESSION['add_menu'] = 1;
header("Location: ../output/admin");