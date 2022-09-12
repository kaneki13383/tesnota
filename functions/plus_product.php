<?

session_start();

require './connect.php';
$id_product = $_GET['id'];

$sql = $connect->query("UPDATE `cart` SET `count` = `count` + 1 WHERE `cart`.`id_product` = '$id_product'");

$_SESSION['error-remove'] = 1;
header("Location:" . $_SERVER['HTTP_REFERER']);