<?php
    session_start();

    require 'connect.php';

    $comment = $_POST['comment'];
    $name_user = $_SESSION['user']['full_name'];
    $avatar_user = $_SESSION['user']['avatar'];
    $id_food = $_POST['id_food'];

    if(empty($name_user)){
        $name_user = 'Guest';
    }

    if(empty($avatar_user)){
        $avatar_user = 'images/no_avatar.webp';
    }

    $sql = $connect->query("INSERT INTO `feedback_food` (`comment`, `name_user`, `avatar_user`, `id_food`) VALUES ('$comment', '$name_user', '$avatar_user', '$id_food')");
    header("Location:" . $_SERVER['HTTP_REFERER']);