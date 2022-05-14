<?php

    session_start();
    $_SESSION['error-login'] = 0;
    require './connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = $connect->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

    $user = $check_user->fetch(PDO::FETCH_ASSOC);

    if ($user>0){
        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "login" => $user['login'],
            "email" => $user['email'],
            "avatar" => $user['avatar'],
            "adress" => $user['adress'],
            "number" => $user['number'],
            "role" => $user['role']
        ];
        header("Location: ../output/profile.php");
        $_SESSION['error-login'] = 0;
    } 
    else{
        $_SESSION['message'] = 'Невереный логин или пароль!';
        
        header("Location: ../output/index.php");
        $_SESSION['error-login'] = 1;
    }
?>