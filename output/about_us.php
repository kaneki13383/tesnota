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
    <link rel="stylesheet" href="../css/style.css">
    
    <title>О нас</title>
</head>
<body class="bg-dark" id="body">

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
                <a class="nav-link" href="./menu">Меню</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./about_us">О нас</a>
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
                <a class="nav-link" href="./menu">Меню</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./about_us">О нас</a>
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
            </ul><?php 
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
    <a class="back_to_top" href="#" id="btt" title="Наверх">↑</a>

    <?require'./details/modal.php'?>

      <section style="margin-top: 50px;">
        <div class="container" style="color: white;">
        <h1 style="text-align: center; font-size: 50px; margin-bottom: 50px">О нас</h1>
            <div class="row d-flex about_flex">
                <div class="col">
                        <img src="../images/9f817ffb7627fc8c7fac7d4f4daf339d.jpg" class="img-fluid" alt="">
                </div>
                <div class="col">
                    <h3 class="about">Почему именно мы?</h3>
                    <p class="lead">Потому, что у нас только свежие продукты, которые привозят каждый день. Все блюда, приготовленные нашими поварами, получили максимальныые оценки критиков!
                       Наше кафе работает уже на протяжении 10 лет, люди посетившие наше заведение остаются довольными и сытыми. <br> ТЕСНОТА - выбор гурманов!
                    </p>
                </div>
            </div>
            <div class="row d-flex about_flex">
                <div class="col">
                    <h3 class="about">Наши особенности</h3>
                    <p class="lead">Наш шеф-повар получил премию "Лучший шеф-повар года". Зерна для нашего кофе поставляются исключительно из Колубии.
                        Блюда приготовленные в нашем кафе имеют доступную цену.
                        В честь праздников мы делаем притные бонусы и скидки.
                    </p>
                </div>
                <div class="col">
                        <img src="../images/original.jpeg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
      </section>
      <?require'./details/cart.php'?>

<?require'./details/footer.php'?>
      
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