<?php
session_start();

require './connect.php';

$name = $_POST['name'];
$discription = $_POST['discription'];
$price = $_POST['price'];
$type = $_POST['type'];
$id = $_POST['id'];


$img = 'img_menu/' . $_FILES['img']['name'];

if($img == 'img_menu/'){

}else{
    move_uploaded_file($_FILES['img']['tmp_name'], '../' . $img);
    $add_img = $connect->query("UPDATE `menu` SET `img` = '$img' WHERE `menu`.`id` = '$id'");
}

$sql = $connect->query("UPDATE `menu` SET `name` = '$name', `discription` = '$discription', `price` = '$price', `type` = '$type' WHERE `menu`.`id` = '$id'");
header("Location: ../output/menu");