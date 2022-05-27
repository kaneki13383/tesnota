<<<<<<< HEAD
<?php
    session_start();
    
    require 'connect.php';

    $id = $_POST['id']; 
    $full_name = $_POST['full_name'];
    $adress = $_POST['adress'];
    $number = $_POST['number'];

    $check_full_name = $connect->query("SELECT `full_name` FROM `users` WHERE `id` = '$id'");
    $response2 = $check_full_name->fetch(PDO::FETCH_ASSOC);
    if($response2['full_name'] == $full_name){
        header('Location: ../output/profile.php');
        $_SESSION['error'] = 1;
    }
    else{
       $update_full_name = $connect->query("UPDATE `users` SET `full_name` = '$full_name' WHERE `users`.`id` = '$id'");
       $_SESSION['user']['full_name'] = $full_name;
    } 
    
    $check_number = $connect->query("SELECT `number` FROM `users` WHERE `id` = '$id'");
    $response = $check_number->fetch(PDO::FETCH_ASSOC);
    if($response['number'] == $number){
        header('Location: ../output/profile.php'); 
        $_SESSION['error'] = 1;
    }
    else{
        $update_number = $connect->query("UPDATE `users` SET `number` = '$number' WHERE `users`.`id` = '$id'");
        $_SESSION['user']['number'] = $number;
    }

    $update_adress = $connect->query("UPDATE `users` SET `adress` = '$adress' WHERE `users`.`id` = '$id'");    
    $_SESSION['user']['adress'] = $adress;
    
    
    $_SESSION['success-edit'] = 'Данные успешно изменены!';

    header("Location: ../output/profile.php");
=======
<?php
    session_start();
    
    require 'connect.php';

    $id = $_POST['id']; 
    $full_name = $_POST['full_name'];
    $adress = $_POST['adress'];
    $number = $_POST['number'];

    $check_full_name = $connect->query("SELECT `full_name` FROM `users` WHERE `id` = '$id'");
    $response2 = $check_full_name->fetch(PDO::FETCH_ASSOC);
    if($response2['full_name'] == $full_name){
        header('Location: ../output/profile.php');
        $_SESSION['error'] = 1;
    }
    else{
       $update_full_name = $connect->query("UPDATE `users` SET `full_name` = '$full_name' WHERE `users`.`id` = '$id'");
       $_SESSION['user']['full_name'] = $full_name;
    } 
    
    $check_number = $connect->query("SELECT `number` FROM `users` WHERE `id` = '$id'");
    $response = $check_number->fetch(PDO::FETCH_ASSOC);
    if($response['number'] == $number){
        header('Location: ../output/profile.php'); 
        $_SESSION['error'] = 1;
    }
    else{
        $update_number = $connect->query("UPDATE `users` SET `number` = '$number' WHERE `users`.`id` = '$id'");
        $_SESSION['user']['number'] = $number;
    }

    $update_adress = $connect->query("UPDATE `users` SET `adress` = '$adress' WHERE `users`.`id` = '$id'");    
    $_SESSION['user']['adress'] = $adress;
    
    
    $_SESSION['success-edit'] = 'Данные успешно изменены!';

    header("Location: ../output/profile.php");
>>>>>>> 6227bbcd97e95233a1c33a50c3628df651f24c98
    $_SESSION['error'] = 1;