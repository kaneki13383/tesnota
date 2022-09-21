<?php
    session_start();

    require './connect.php';

    $id_comm = $_GET['id'];

    $sql = $connect->query("DELETE FROM feedback_food WHERE `feedback_food`.`id` = '$id_comm'");
    header("Location:" . $_SERVER['HTTP_REFERER']);