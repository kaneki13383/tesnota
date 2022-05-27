<<<<<<< HEAD
<?
    require './connect.php';

    session_start();
    $id = $_SESSION['user']['id'];

    $sql = $connect->query("DELETE FROM `cart` WHERE `id_user` = '$id'");

    $_SESSION['error-remove'] = 1;

=======
<?
    require './connect.php';

    session_start();
    $id = $_SESSION['user']['id'];

    $sql = $connect->query("DELETE FROM `cart` WHERE `id_user` = '$id'");

    $_SESSION['error-remove'] = 1;

>>>>>>> 6227bbcd97e95233a1c33a50c3628df651f24c98
    header("Location: ../output/menu.php");