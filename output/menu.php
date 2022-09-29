<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Меню</title>
</head>
<body class="bg-dark">
<?php 
  if(!$_SESSION['user'] && !$_SESSION['admin']){ ?>
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
            </ul>
            <form class="d-flex" action="../output/search_res" method="GET">
                <input class="form-control me-2 search" style="width: 250px; border-right: none;" type="search" name="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn" style="margin-right: 20px; margin-left: -10px; border-left: none;" type="submit"><img src="../images/search.png" alt=""></button>
            </form>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                Войти
            </button>
          </div>
        </div>
      </nav>
  </header> <?
  }
  else{?>
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
<?
  }
?>

<?php 
    if (isset($_SESSION['message1'])){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?=$_SESSION['message1']?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
        <?
    }
    unset($_SESSION['message1']);
?>

<?require'./details/modal.php'?>

      <div class="sort">
      <div onclick="click4()" class="first-div-sort">
        <p>Фильтры</p>
        <img src="/images/filter.png" alt="">
      </div>
      <form action=""></form>
      <form class="filter-menu" action="" method="POST">
        <div>
          <input onclick="dessert()" value="1" name="1" type="radio">
          <label for="des">Дессерты</label>
        </div>
        <div>
          <input onclick="snacks()" value="2" name="1" type="radio">
          <label  for="snac">Закуски</label>
        </div>
        <div>
          <input onclick="drinks()" value="3" name="1" type="radio">
          <label  for="dri">Напитки</label>
        </div>
        <div>
          <input onclick="clear1()" value="4" name="1" type="radio">
          <label  for="clear">Сбросить фильтры</label>
        </div>
        </form>
    </div>

<section class="menu">
  <div class="container">   
  <h1 style="text-align: center; font-size: 50px; margin-bottom: 50px">Меню</h1>
    
    <section id="service">
        <div class="service-box">
      <?
        require '../functions/connect.php';
        $sql = $connect->query("SELECT * FROM `menu`");
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
          ?>
          <a href="/output/full_discription_food?id=<?=$row['id']?>" style="text-decoration: none;"><div id="<?=$row['type']?>" class="single-service">
                <img id="<?=$row['id']?>" class="img-menu" src="<?='/'.$row['img']?>" alt="">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h4 style="color: white;"><?=$row['name']?></h4>
                    <hr>
                    <!-- <p class="discription"><?=$row['discription']?></p> -->
                    <p class="card-price"><?=$row['price']?> ₽ / <?
                    if($row['type'] == 'drinks'){
                      echo 'за 100мл';
                    }else{
                      echo 'за порцию';
                    }
                  ?></p>
                  <?
                    if($_SESSION['user']){
                      ?><a href="../functions/add_basket.php?id=<?=$row['id']?>" class="btn">В корзину</a><?
                    }
                  ?>
                  <?
                  if($_SESSION['admin']){
                    ?>
                      <a href="../functions/edit_menu.php?id=<?=$row['id']?>"><img src="../images/icons8-edit-64.png" width="40" alt=""></a>
                      <a href="../functions/del_menu.php?id=<?=$row['id']?>"><img src="../images/icons8-удалить-навсегда-64.png" width="40" alt=""></a>
                    <?
                  }
                ?>
                </div>
            </div>
          <?
        }
      ?> 
    </div>
    </div></a>
  </section>
  </section>

  <?require'./details/cart.php'?>

<?require'./details/footer.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/sort.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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