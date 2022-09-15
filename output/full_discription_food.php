<?
    session_start();
    require '../functions/connect.php';
    $id = $_GET['id'];
    $give_food = $connect->query("SELECT * FROM `menu` WHERE `id` = '$id'");
    $food = $give_food->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/full_disc_food.css">
    <title><?=$food['name']?></title>
</head>
<body class="bg-dark">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navheader">
        <div class="container">
          <a class="navbar-brand" href="./index">
              <img src="../images/logo.png" class="img-fluid" style="width: 200px;" alt="">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./menu">Меню</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./about_us">О нас</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?
                  if($_SESSION['admin']){
                    echo './admin';
                  }
                  elseif($_SESSION['user']){
                    echo './profile';
                  }
                ?>">Профиль</a>
              </li>
            </ul>  <?php 
              require '../functions/connect.php';
              $id_user = $_SESSION['user']['id'];
              $sql = $connect->query("SELECT `id_user` FROM `cart` WHERE `id_user` = '$id_user'");
              $row = $sql->fetch(PDO::FETCH_ASSOC);                
                if($row['id_user'] == $id_user){?>
                  <button type="button" class="btn btn_backet" data-bs-toggle="modal" style="border: none; background-color: transparent;" data-bs-target="#modalCART">
                    <img src="../images/Group 1 (1).png" alt="" class="backet">
                  </button>
                <?}
                else{?>
                  <button type="button" class="btn btn_backet" data-bs-toggle="modal" style="border: none; background-color: transparent;" data-bs-target="#modalCART">
                    <img src="../images/basket.png" alt="" class="backet">
                  </button>
                <?}              
            ?>    
            <form class="d-flex" action="../output/search_res" method="GET">
            <input class="form-control me-2 search" style="width: 250px; border-right: none;" type="search" name="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn" style="margin-right: 20px; margin-left: -10px; border-left: none;" type="submit"><img src="../images/search.png" alt=""></button>
            </form>
          </div>
        </div>
      </nav>
</header>

<section style="color: white;">
    <div class="container" >
        <div class="row">
            <div class="col">
              <div class="img-zoom-container">
                <img id="myimage" src="/<?=$food['img']?>" width="540" alt="">            
                <div id="myresult" class="img-zoom-result"></div>
              </div>              
            </div>
            <div class="col">
              <h3 style="text-align: center; margin-top: 2vh;"><?=$food['name']?></h3>
              <hr style="background: #AF3131; height: 3px;">
              <div style="display: flex; flex-direction: column;">
                <div style="margin: 0vw 2vw;">
                    <p><?=$food['discription']?></p>
                </div>
                <div style="text-align: center;">
                <p><?=$food['price']?> ₽ / <?
                        if($food['type'] == 'drinks'){
                          echo 'за 100мл';
                        }else{
                          echo 'за порцию';
                        }
                ?></p>
                     <?
                    if($_SESSION['user']){
                      ?><a href="../functions/add_basket.php?id=<?=$food['id']?>" class="btn">В корзину</a><?
                    }
                  ?>
                  <?
                  if($_SESSION['admin']){
                    ?>
                      <a href="../functions/edit_menu.php?id=<?=$food['id']?>"><img src="../images/icons8-edit-64.png" width="40" alt=""></a>
                      <a href="../functions/del_menu.php?id=<?=$food['id']?>"><img src="../images/icons8-удалить-навсегда-64.png" width="40" alt=""></a>
                    <?
                  }
                ?>    
                </div>
              </div>
             
            </div>
        </div>
    </div>
</section>

<div class="modal" id="modalCART" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title">Корзина</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?
        require '../functions/connect.php';
        $id = $_SESSION['user']['id'];
        $sql = $connect->query("SELECT * FROM `cart` WHERE `id_user` = '$id'");
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
          $id_product = $row['id_product'];
          $sql2 = $connect->query("SELECT * FROM `menu` WHERE `id` = '$id_product'");
            while($res = $sql2->fetch(PDO::FETCH_ASSOC)){                  
              ?>
                <div class="card mb-3 bg-dark" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="<?='/'. $res['img']?>" style="height: 120px;" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" style="font-size: 17px;"><?=$res['name']?></h5>
                        <div class="d-flex" style="justify-content: space-between;">
                        <p class="card-text">Цена: <?=$summ = $res['price'] * $row['count']?> ₽</p>                        
                        <p class="card-text">Кол-во: <a href="<?
                          if($row['count'] == 1){
                            ?>
                              ../functions/remove_basket.php?id=<?=$row['id_order']?>
                            <?
                          } else{
                            ?>
                              ../functions/minus_product.php?id=<?=$row['id_product']?>
                            <?
                          }
                        ?>" style="text-decoration: none; color: white">-</a> <?=$row['count']?> <a href="../functions/plus_product.php?id=<?=$row['id_product']?>" style="text-decoration: none; color: white">+</a></p>
                        <a href="../functions/remove_basket.php?id=<?=$row['id_order']?>" class="card-text"><img src="../images/icons8-удалить-навсегда-64.png" width="30" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?
            }
          }         
        ?>
        <p class="p_buskcet">Корзина пуста!</p>
      </div>
      <div class="modal-footer">
        <a href="../functions/remove_all_basket.php" type="button" class="btn">Очистить корзину</a>
        <button type="button" class="btn">Оформить заказ</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../js/zoom.js"></script>
<script>
// Инициировать эффект масштабирования:
imageZoom("myimage", "myresult");
</script>
<?php
      if($_SESSION['error-login'] === 1){
    ?>
        <script>
          const modal = new bootstrap.Modal(document.querySelector('#exampleModalToggle'));
          modal.show();
        </script>
        <?
        $_SESSION['error-login'] = 0;
      }

      if ($_SESSION['error-registration'] === 1){
        ?>
        <script>
          const modal = new bootstrap.Modal(document.querySelector('#exampleModalToggle2'));
          modal.show();
        </script>
        <?
        $_SESSION['error-registration'] = 0;
      }

      if ($_SESSION['error-remove'] === 1){
        ?>
        <script>
          const modal = new bootstrap.Modal(document.querySelector('#modalCART'));
          modal.show();
        </script>
        <?
        $_SESSION['error-remove'] = 0;
      }
    ?>
</body>
</html>