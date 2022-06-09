<?
    session_start();

    require './connect.php';

    $id_order = $_GET['id'];

    $sql = $connect->query("DELETE FROM `cart` WHERE `cart`.`id_order` = '$id_order'");

    $_SESSION['error-remove'] = 1;

    header("Location: ../output/menu.php");