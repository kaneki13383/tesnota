<?
    require './connect.php';

    session_start();
    $id = $_SESSION['user']['id'];

    $sql = $connect->query("DELETE FROM `cart` WHERE `id_user` = '$id'");

    $_SESSION['error-remove'] = 1;

    $link = $_SERVER['HTTP_REFERER'];
    header('Location:' . $link);