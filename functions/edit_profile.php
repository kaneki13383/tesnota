<?php
    session_start();
    
    require 'connect.php';

    $id = $_POST['id']; 
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];
    $number = $_POST['number'];

    $update_full_name = $connect->query("UPDATE `users` SET `full_name` = '$full_name' WHERE `users`.`id` = '$id'");
    $update_adress = $connect->query("UPDATE `users` SET `adress` = '$adress' WHERE `users`.`id` = '$id'");
    

    $check_email = $connect->query("SELECT `email` FROM `users` WHERE `id` = '$id'");
    $response1 = $check_email->fetch(PDO::FETCH_ASSOC);
    if($response1['email'] == $_SESSION['user']['email']){
        $_SESSION['error-edit'] = 'Такая почта уже используется, введите свою почту!';
        header('Location: ../output/profile.php'); 
        $_SESSION['error'] = 1;
    }
    else{
        $update_email = $connect->query("UPDATE `users` SET `email` = '$email' WHERE `users`.`id` = '$id'");
    }
    
    $check_number = $connect->query("SELECT `number` FROM `users` WHERE `id` = '$id'");
    $response = $check_number->fetch(PDO::FETCH_ASSOC);
    if($response['number'] == $_SESSION['user']['number']){
        $_SESSION['error-edit'] = 'Такой номер уже используется, введите свой номер!';
        header('Location: ../output/profile.php'); 
        $_SESSION['error'] = 1;
    }
    else{
        $update_number = $connect->query("UPDATE `users` SET `number` = '$number' WHERE `users`.`id` = '$id'");
    }
    
    header("Location: ../output/profile.php");
    $_SESSION['error'] = 1;
    $_SESSION['success-edit'] = 'Данные успешно изменены!';