<?php
session_start();

require '../functions/connect.php';

$search = $_GET['search'];

$sql = $connect->query("SELECT * FROM `menu` WHERE `name` LIKE '%$search%'");
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
                <input class="form-control me-2 search" style="width: 250px;" type="search" name="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn" style="margin-right: 20px; margin-left: -10px;" type="submit"><img src="../images/search.png" alt=""></button>
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
            </ul>            
            <button type="button" class="btn btn_backet" data-bs-toggle="modal" style="border: none; background-color: transparent;" data-bs-target="#modalCART">
              <img src="../images/basket.png" alt="" class="backet">
            </button>
            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2 search" style="width: 250px;" type="search" name="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn" style="margin-right: 20px; margin-left: -10px;" type="submit"><img src="../images/search.png" alt=""></button>
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

<!-- Модальное окно -->
<div id="god_div"></div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">Войти в аккаунт</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="formlogin" method="POST" action="../functions/login.php">  <!---------------------------------------------------------------------------------------------------------->
                <div class="mb-3">
                  <label for="email" class="form-label">Ваш email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Пароль</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button class="btn" id="singin">Войти</button>                
                <?php 
                    if (isset($_SESSION['message'])){
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?=$_SESSION['message']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                                </div>
                        <?

                    }
                    unset($_SESSION['message']);
                ?>

              </form> <!---------------------------------------------------------------------------------------------------------->
            </div>
            <div class="modal-footer">
              <button class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Нет аккаунта? Зарегистрируйтесь!</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Регистрация</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" enctype="multipart/form-data" action="../functions/registration.php"> 
                <!---------------------------------------------------------------------------------------------------------->
                <div class="row mb-3">
                  <label for="full_name" class="col-sm-2 col-form-label">ФИО</label>
                  <div class="col-sm-10">
                    <input type="text" name="full_name" required class="form-control" id="inputFullName">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="login" class="col-sm-2 col-form-label">Логин</label>
                  <div class="col-sm-10">
                    <input type="text" name="login" required class="form-control" id="inputLogin">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Почта</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" required class="form-control" id="inputEmaill">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="avatar" class="form-label">Выберите аватар</label>
                  <input class="form-control" name="avatar" type="file" id="formFile">
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Пароль</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" required class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password_confirm" class="col-sm-2 col-form-label">Повторите пароль</label>
                  <div class="col-sm-10">
                    <input type="password" name="password_confirm" required class="form-control" id="inputPasswordConfirm">
                  </div>
                </div>
                <button type="submit" class="btn btn-sing-in-2">Зарегистрироваться</button>
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
                  <?php 
                    if (isset($_SESSION['message2'])){
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?=$_SESSION['message2']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                                </div>
                        <?

                    }
                    unset($_SESSION['message2']);
                ?>
              <!---------------------------------------------------------------------------------------------------------->
            </div>
            <div class="modal-footer">
              <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Уже есть аккаунт? Войдите в него!</button>
            </div>
          </div>
        </div>
      </div>


<div class="container">
<h1 style="text-align: center; font-size: 50px; margin-bottom: 50px; margin-top: 50px;">Поиск по запросу: <?=$search?></h1>
      <?
      while($ser = $sql->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div id="<?=$ser['type']?>" class="card bg-dark" style="width: 18rem;">
          <img src="<?='/'.$ser['img']?>" height="220px" class="card-img-top" alt="...">
          <div class="card-body card-style">
            <h5 class="card-title"><?=$ser['name']?></h5>
            <p class="card-text"><?=$ser['discription']?></p>
            <div style="display: flex;justify-content: space-between;align-items: baseline;">
              <p class="card-price"><?=$ser['price']?> ₽ / <?
                if($ser['type'] == 'drinks'){
                  echo 'за 100мл';
                }else{
                  echo 'за порцию';
                }
              ?></p>
              <?
                if($_SESSION['user']){
                  ?><a href="../functions/add_basket.php?id=<?=$ser['id']?>" class="btn">В корзину</a><?
                }
              ?>
              <?
              if($_SESSION['admin']){
                ?>
                  <a href="../functions/del_menu.php?id=<?=$ser['id']?>"><img src="../images/delete.png" alt=""></a>
                <?
              }
            ?>
            </div>                
          </div>
        </div>
      <?
      }
    ?>
</div>

<section class="menu">
  <div class="container">   
  <h1 style="text-align: center; font-size: 50px; margin-bottom: 50px">Меню</h1>
    <div class="sort">
      <div onclick="click4()" class="first-div-sort">
        <p>Фильтры</p>
        <img src="/images/filter.png" alt="">
      </div>
      <form action=""></form>
      <form action="" method="POST">
        <div>
          <input onclick="dessert()" value="1" name="1" type="radio">
          <label onclick="dessert()" for="des">Дессерты</label>
        </div>
        <div>
          <input onclick="snacks()" value="2" name="1" type="radio">
          <label onclick="snacks()" for="snac">Закуски</label>
        </div>
        <div>
          <input onclick="drinks()" value="3" name="1" type="radio">
          <label onclick="drinks()" for="dri">Напитки</label>
        </div>
        <div>
          <input onclick="clear1()" value="4" name="1" type="radio">
          <label onclick="clear1()" for="clear">Сбросить фильтры</label>
        </div>
        </form>
    </div>
    <div class="d-flex" style="flex-wrap: wrap; justify-content: space-evenly">
      <?
        require '../functions/connect.php';
        $sql = $connect->query("SELECT * FROM `menu`");
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
          ?>
            <div id="<?=$row['type']?>" class="card bg-dark" style="width: 18rem;">
              <img src="<?='/'.$row['img']?>" height="220px" class="card-img-top" alt="...">
              <div class="card-body card-style">
                <h5 class="card-title"><?=$row['name']?></h5>
                <p class="card-text"><?=$row['discription']?></p>
                <div style="display: flex;justify-content: space-between;align-items: baseline;">
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
                      <a href="../functions/del_menu.php?id=<?=$row['id']?>"><img src="../images/delete.png" alt=""></a>
                    <?
                  }
                ?>
                </div>                
              </div>
            </div>
          <?
        }
      ?>
    </div>
  </div>  
</section>
<footer>
      <nav class="navbar footer_navbar navbar-light bg-dark">
        <div class="container">
          <li>
            <a class="navbar-brand" href="#"><img style="margin-bottom: 16px;" src="../images/logo.png" width="200px" alt=""></a>
            <p class="lead">©Гавкошмыг corporation</p>
          </li>
          <li>
            <p class="lead"><img src="../images/-.png" alt=""> 8 (967) 331 37-86</p>
            <p class="lead"><img src="../images/mail.png" alt="">  danchik.kun@mail.ru</p>
          </li>
        </div>
      </nav>
      </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/sort.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>