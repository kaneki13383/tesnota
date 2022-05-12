<?php
    require './connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm){
        $avatar = 'avatars/' . time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $avatar);

        $check_login = $connect->query("SELECT * FROM `users` WHERE `login` = '$login'");
        $response = $check_login->fetch(PDO::FETCH_ASSOC);
        if ($response['login']){
            $_SESSION['message'] = "Этот логин занят, придумайте другой!";
            header("Location: ../output/index.php");
        }
        else{
            $check_email = $connect->prepare("SELECT * FROM `users` WHERE `email` = '$email'");
            $check_email->execute();
            $response1 = $check_email->fetch(PDO::FETCH_ASSOC);
            if($response1['email']){
                $_SESSION['message'] = "Такая почта уже используется, введите свою почту!";
                header('Location: ../output/registration.php'); 
            }
            else{
                $add_user = $connect->prepare("INSERT INTO `users`(`id`, `full_name`, `login`, `email`, `avatar`, `password`) VALUES (NULL, '$full_name','$login','$email','$avatar','$password')");
                $add_user->execute();
                $_SESSION['message'] = "Регистрация прошла успешно!";
                header('Location: ../output/index.php');
            }
        }
    }
    else{
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../output/index.php'); 
    }