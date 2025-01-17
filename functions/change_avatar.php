<?php
    session_start();
    
    require_once('./connect.php');

    $new_avatar = 'avatars/' . $_FILES['avatar']['name'];

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $new_avatar)){
        $_SESSION['avatar-error'] = "Ошибка загрузки аватарки!";
        header("Location:" . $_SERVER['HTTP_REFERER']);
        $_SESSION['error'] = 1;
        exit();
    }
    else{
        if (isset($_SESSION['user']['avatar'])){
            unlink('../'.$_SESSION['user']['avatar']);
        }
        $userID = $_SESSION['user']['id'];
        $user_name = $_SESSION['user']['full_name'];
        $change_avatar = $connect->prepare("UPDATE `users` SET `avatar` = '$new_avatar' WHERE `id` = '$userID'");
        $change_avatar->execute();
        $change_avatar_comm = $connect->query("UPDATE `feedback_food` SET `avatar_user` = '$new_avatar' WHERE `name_user` = '$user_name'");
        $_SESSION['user']['avatar'] = $new_avatar;
        header("Location:" . $_SERVER['HTTP_REFERER']);
        $_SESSION['error']= 1;
        $_SESSION['avatar-success'] = 'Аватар успешно изменен!';
    }