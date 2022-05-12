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
<body class="bg-dark">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navheader">
            <div class="container">
              <a class="navbar-brand" href="#">
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
                    <a class="nav-link" href="#">Меню</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">О нас</a>
                  </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 search" type="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn search-logo" type="submit"><img src="../images/search.png" alt=""></button>
                </form>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    Войти
                </button>
              </div>
            </div>
          </nav>
    </header>

    <a class="back_to_top" href="#" id="btt" title="Наверх">↑</a>

    <!-- Модальное окно -->
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
                  <label for="exampleInputEmail1" class="form-label">Ваш email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Пароль</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button class="btn" id="singin" onclick="login(e)">Войти</button>
                <?php 
                        if (isset($_SESSION['message'])){
                            echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
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
              <form method="post" enctype="multipart/form-data" action="../functions/registration.php"> 
                <!---------------------------------------------------------------------------------------------------------->
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">ФИО</label>
                  <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="inputNamel3">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Логин</label>
                  <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="inputNamel3">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Почта</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmaill3">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Выберите аватар</label>
                  <input class="form-control" name="avatar" type="file" id="formFile">
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Повторите пароль</label>
                  <div class="col-sm-10">
                    <input type="password" name="password_confirm" class="form-control" id="inputPassword3">
                  </div>
                </div>
                <button type="submit" class="btn btn-sing-in-2">Зарегистрироваться</button>
                <?php 
                        if ($_SESSION['message']){
                            echo '<p class="message">' . $_SESSION['message'] . '</p>';
                        }
                        unset($_SESSION['message']);
                    ?> 
              </form>
              <!---------------------------------------------------------------------------------------------------------->
            </div>
            <div class="modal-footer">
              <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Уже есть аккаунт? Войдите в него!</button>
            </div>
          </div>
        </div>
      </div>

      <section class="section1">
        <div class="container">
          <div class="d-flex" style="align-items: center; justify-content: space-evenly;">
            <img class="img-fluid image-big-picture div-sec-1" src="../images/img-sec-1 1.png" alt="">
            <div class="div-sec-1">
              <h1>Кафе "Теснота"</h1>
              <p class="lead">В тесноте, да не в обиде</p>
              <a class="btn btn-primary" href="#" role="button">Перейти к каталогу →</a>
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
          <figure class="figure">
            <img src="../images/image 4.png" style="width: 400px;" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption">Баранья корейка в духовке</figcaption>
          </figure>
          <figure class="figure">
            <img src="../images/image 5.png" style="width: 400px; height: 306.36px" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption">Тигровые креветки в томатном соусе</figcaption>
          </figure>
          <figure class="figure">
            <img src="../images/image 12.png" style="width: 400px; height: 306.36px" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption">Тальятта из говядины</figcaption>
          </figure>
          <figure class="figure">
            <img src="../images/image 14.png" style="width: 400px; height: 306.36px" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption">Суп Том Ян</figcaption>
          </figure>
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

      <section>
        <div class="container">
          <h2>Обратная связь</h2>
          <form class="row g-3">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Имя</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Иван">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Иванов">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Эл. почта</label>
            <input type="email" class="form-control" id="inputAddress" placeholder="tesnota@mail.ru">
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Комментарий</label>
            <textarea type="text" class="form-control" style="height: 200px;" id="inputAddress2"></textarea>
          </div>
          <div class="col-12">
            <button type="submit" style="width: 150px" class="btn btn-primary">Отправить</button>
          </div>
        </form>
      </section>

      <footer>

      </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        function login(event) {
          event.preventDefault()
          $.ajax({
              url: '../functions/login.php',
              method: 'POST',
              success: (response)=>{
                  console.log('asfhnf');
              }
        })
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/scroll.js"></script>
    <script src="../js/up.js"></script>
  </body>
</html>