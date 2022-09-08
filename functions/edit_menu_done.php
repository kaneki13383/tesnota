<?php
session_start();

require './connect.php';

echo $name = $_POST['name'];
echo $discription = $_POST['discription'];
echo $price = $_POST['price'];
echo $type = $_POST['type'];
echo $id = $_POST['id'];

$img = 'img_menu/' . $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], '../' . $img);

// $sql = $connect->query("INSERT INTO `menu` (`name`, `img`, `discription`, `price`, `type`) VALUES ('$name', '$img', '$discription', '$price', '$type') WHERE `id` = '$id'");
// header("Location: ../output/menu");