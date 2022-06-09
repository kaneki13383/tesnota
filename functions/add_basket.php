<?
    session_start();
    require './connect.php';

    $id_user = $_SESSION['user']['id'];
    $id_product = $_GET['id'];

    $sql = $connect->query("SELECT * FROM `users` WHERE `id` = '$id_user'");
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        if($row['adrees'] == NULL && $row['number'] == NULL){
            $_SESSION['message1'] = 'Чтобы добавить товар в корзину, нужно заполнить данные в профиле!';
            header("Location: ../output/menu.php");
        }
        else{
            $sql = $connect->query("SELECT * FROM `cart` WHERE `id_product` = '$id_product'");
            $res = $sql->fetch(PDO::FETCH_ASSOC);
            if($res['id_product'] != $id_product){
                $add_to_cart = $connect->query("INSERT INTO `cart` (`id_user`, `id_product`, `count`) VALUES ('$id_user', '$id_product', 1)");
                $_SESSION['error-remove'] = 0;
                header("Location: ../output/menu.php");
            }else{
                $_SESSION['message1'] = 'Такой товар уже есть в корзине!';
                $_SESSION['error-remove'] = 0;
                header("Location: ../output/menu.php");
            }                                  
        }
    }