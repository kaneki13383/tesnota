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
  <title>Главная</title>
</head>
<body class="bg-dark" id="body">
<?php 
  if(!$_SESSION['user'] && !$_SESSION['admin']){ ?>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navheader">
        <div class="container">
          <a class="navbar-brand" href="../output/index">
            <img src="../images/logo.png" class="img-fluid" style="width: 200px;" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../output/menu">Меню</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../output/about_us">О нас</a>
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
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navheader">
        <div class="container">
          <a class="navbar-brand" href="../output/index">
              <img src="../images/logo.png" class="img-fluid" style="width: 200px;" alt="">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../output/index">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../output/menu">Меню</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../output/about_us">О нас</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?
                  if($_SESSION['admin']){
                    echo '../output/admin';
                  }
                  elseif($_SESSION['user']){
                    echo '../output/profile';
                  }
                ?>">Профиль</a>
              </li>
            </ul>
            <?php 
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

      <section class="section1">
        <div class="container">
          <div class="d-flex" style="align-items: center; justify-content: space-evenly;">
            <img class="img-fluid image-big-picture div-sec-1" src="../images/img-sec-1 1.png" alt="">
            <div class="div-sec-1">
              <h1>Кафе "Теснота"</h1>
              <p class="lead">Лучше в тесноте с друзьями,<br> чем одному в просторе</p>
              <a class="btn" href="./menu" role="button">Перейти к Меню →</a>
            </div>            
          </div>          
        </div>        
      </section>

      <section class="about_company">
        <div class="container">
            <h2>О компании</h2>
          <div class="d-flex" style="align-items: center; justify-content: space-evenly;"> 
            <img src="../images/image 11.png" alt="" width="150px" class="img-fluid">
            <p class="lead">Наше кафе является один из самых лучших в городе, у нас постоянно пополняется каталог товаров, у нас приятная музыка и астомсфера.</p>
          </div>
        </div>
      </section>

      <section class="popular">
        <div class="container">
          <h2>Популярные товары</h2>
          <div class="d-flex pop-flex">
            <?
              require '../functions/connect.php';
              $sql = $connect->query("SELECT * FROM `menu` ORDER BY id LIMIT 6");
              while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                ?>
                  <figure class="figure">
                    <a href="/output/full_discription_food.php?id=<?=$row['id']?>"><img src="<?='/'.$row['img']?>" style="width: 400px; height: 310px;" class="figure-img img-fluid rounded" alt="..."></a>
                    <figcaption class="figure-caption"><?=$row['name']?></figcaption>
                  </figure>
                <?
              }
            ?>
          </div>
        </div>
      </section>
      
      <section class="qwestions">
        <div class="container">
          <h2>Часто задаваемые вопросы</h2>
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  До скольки мы работаем?
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Наше кафе работает с <code>9.00</code> до <code>22.00</code></div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  Есть ли у нас столики на свежем воздухе?
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Да, у нас есть столики на свежем воздухе</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  Где находится наше кафе?
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">ул. Джона Рида 12б</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="feedback">
        <div class="container">
          <h2>Обратная связь</h2>
          <form action=""></form>
          <form class="row g-3" method="POST" action="../functions/feedback.php">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Иван">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Фамилия</label>
            <input type="text" name="surname" class="form-control" id="inputPassword4" placeholder="Иванов">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Эл. почта</label>
            <input type="email" name="email" class="form-control" id="inputAddress" placeholder="tesnota@mail.ru">
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Комментарий</label>
            <textarea type="text" name="comment" class="form-control" style="height: 200px;" id="inputAddress2"></textarea>
          </div>
          <div class="col-12">
            <button type="submit" style="width: 150px" class="btn ">Отправить</button>
          </div>
        </form>
      </section>
    <?require'./details/footer.php'?>
    <?require'./details/cart.php'?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/scroll.js"></script>
    <script src="../js/up.js"></script>
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