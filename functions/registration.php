<?php
    session_start();

    require './connect.php';

    $_SESSION['error-registration'] = 0;

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm){
        $avatar = 'avatars/' . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $avatar);

        $check_login = $connect->query("SELECT * FROM `users` WHERE `login` = '$login'");
        $response = $check_login->fetch(PDO::FETCH_ASSOC);
        if ($response['login']){
            $_SESSION['message1'] = 'Этот логин занят, придумайте другой!';
            header("Location: ../output/index.php");
            $_SESSION['error-registration'] = 1;
        }
        else{
            $check_email = $connect->query("SELECT * FROM `users` WHERE `email` = '$email'");
            // $check_email->execute();
            $response1 = $check_email->fetch(PDO::FETCH_ASSOC);
            if($response1['email']){
                $_SESSION['message1'] = 'Такая почта уже используется, введите свою почту!';
                header('Location: ../output/index.php'); 
                $_SESSION['error-registration'] = 1;
            }
            else{
                $add_user = $connect->query("INSERT INTO `users`(`id`, `full_name`, `login`, `email`, `avatar`, `password`) VALUES (NULL, '$full_name','$login','$email','$avatar','$password')");
                // $add_user->execute();
                $_SESSION['message2'] = 'Регистрация прошла успешно!';
                header('Location: ../output/index.php');
                $_SESSION['error-registration'] = 1;
            }
        }
    }
    else{
        $_SESSION['message1'] = 'Пароли не совпадают!';
        header('Location: ../output/index.php'); 
        $_SESSION['error-registration'] = 1;
    }