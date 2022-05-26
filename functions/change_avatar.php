<?php
    session_start();
    
    require_once('./connect.php');

    $new_avatar = 'avatars/' . time() . $_FILES['avatar']['name'];

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $new_avatar)){
        $_SESSION['avatar-error'] = "Ошибка загрузки аватарки!";
        header("Location: ../output/profile.php");
        $_SESSION['error'] = 1;
        exit();
    }
    else{
        if (isset($_SESSION['user']['avatar'])){
            unlink('../'.$_SESSION['user']['avatar']);
        }
        $userID = $_SESSION['user']['id'];
        $change_avatar = $connect->prepare("UPDATE `users` SET `avatar` = '$new_avatar' WHERE `id` = '$userID'");
        $change_avatar->execute();
        $_SESSION['user']['avatar'] = $new_avatar;
        header("Location: ../output/profile.php");
        $_SESSION['error']= 1;
        $_SESSION['avatar-success'] = 'Аватар успешно изменен!';
    }