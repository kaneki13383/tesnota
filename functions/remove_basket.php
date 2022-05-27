<<<<<<< HEAD
<?
    session_start();

    require './connect.php';

    $id_order = $_GET['id'];

    $sql = $connect->query("DELETE FROM `cart` WHERE `cart`.`id_order` = '$id_order'");

    $_SESSION['error-remove'] = 1;

=======
<?
    session_start();

    require './connect.php';

    $id_order = $_GET['id'];

    $sql = $connect->query("DELETE FROM `cart` WHERE `cart`.`id_order` = '$id_order'");

    $_SESSION['error-remove'] = 1;

>>>>>>> 6227bbcd97e95233a1c33a50c3628df651f24c98
    header("Location: ../output/menu.php");