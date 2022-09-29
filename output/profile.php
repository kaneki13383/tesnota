<?php 
session_start();
if (!$_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title><?=$_SESSION['user']['full_name']?></title>
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
                    <a class="nav-link" href="./menu">Меню</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./about_us">О нас</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Профиль</a>
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

<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="<?
                                if($_SESSION['user']['avatar'] === 'avatars/'){
                                    echo '../images/noavatar.png';
                                }
                                else{
                                    echo "/{$_SESSION['user']['avatar']}";
                                }
                            ?>" alt="">
              </a>
              <h1><?=$_SESSION['user']['full_name']?></h1>
              <p><?=$_SESSION['user']['email']?></p>
          </div>

          <ul class="nav nav-pills nav-stacked ">
              <li id="profile" class="active"><a href="#" onclick="profile()"> <i class="fa fa-user"></i> Профиль</a></li>
              <li id="ed_prof"><a href="#"  onclick="edit()"> <i class="fa fa-edit"></i> Редактировать профиль</a></li>
              <li><a href="../functions/logout.php"> <i class="fa fa-logout"></i> Выход</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <div id="edit_prof" class="container">
          <h3>Редактировать профиль</h3>
          <form class="row g-3" method="post" action="../functions/edit_profile.php">
              <input class="input-none" type="text" name="id" value="<?=$_SESSION['user']['id']?>">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">ФИО</label>
                <input type="text" name="full_name" class="form-control" id="inputEmail4" value="<?=$_SESSION['user']['full_name']?>">
            </div>
            <div class="col-md-6">
            <label for="inputAddress" class="form-label">Адрес</label>
                <input type="text" name="adress" class="form-control" id="inputAddress" placeholder="Ул. Пушкина, Дом Колотушкина 17 подьезд 3 кв 142" value="<?
                             if ($_SESSION['user']['adress'] == NULL){
                                echo 'Не указан';
                            }
                            else{
                                echo $_SESSION['user']['adress'];
                            }                 
                      ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Телефон</label>
                <input type="text" name="number" class="form-control" id="inputAddress" placeholder="8XXXXXXXXXX" value="<?
                            if ($_SESSION['user']['number'] == NULL){
                                echo 'Не указан';
                            }
                            else{
                                echo $_SESSION['user']['number'];
                            }                  
                      ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn ">Сохранить изменения</button>
            </div>
            <?php 
                if (isset($_SESSION['error-edit'])){
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?=$_SESSION['error-edit']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                            </div>
                    <?

                }
                unset($_SESSION['error-edit']);
            ?>
            <?php 
                if (isset($_SESSION['success-edit'])){
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=$_SESSION['success-edit']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                            </div>
                    <?

                }
                unset($_SESSION['success-edit']);
            ?>
          </form>
          <form action="../functions/change_avatar.php" enctype="multipart/form-data" method="post" class="row g-3">
            <h3>Изменить аватар</h3>
            <div class="col-md-6">
                <input type="text" class="input-none" value="<?=$_SESSION['user']['id']?>">
                <input type="file" name="avatar" class="form-control" id="formFile">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn">Изменить</button>
            </div>
            <?php 
                if (isset($_SESSION['avatar-error'])){
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?=$_SESSION['avatar-error']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                            </div>
                    <?

                }
                unset($_SESSION['avatar-error']);
            ?>
            <?php 
                if (isset($_SESSION['avatar-success'])){
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=$_SESSION['avatar-success']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                            </div>
                    <?

                }
                unset($_SESSION['avatar-success']);
            ?>
          </form>
            
          </div>
          <div id="biograph" class="panel-body bio-graph-info">
              <h3>Ваши данные</h3>
              <div class="row">
                  <div class="bio-row">
                      <p><span>ФИО:</span><?=$_SESSION['user']['full_name']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Роль:</span> <?php
                          if ($_SESSION['user']['role'] == 0){
                                echo 'Пользователь';
                            }
                            else{
                                echo 'Администратор';
                            }                    
                      ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email:</span><?=$_SESSION['user']['email']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Телефон:</span><?php
                          if ($_SESSION['user']['number'] == NULL){
                            echo 'Не указан';
                            }
                            else{
                                echo $_SESSION['user']['number'];
                            }                   
                      ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Адрес:</span><?php
                          if ($_SESSION['user']['adress'] == NULL){
                            echo 'Не указан';
                            }
                            else{
                                echo $_SESSION['user']['adress'];
                            }                   
                      ?></p>
                  </div>
              </div>
          </div>
      </div>

      <?require'./details/cart.php'?>
        
      <?
          if ($_SESSION['user']['addres'] == NULL & $_SESSION['user']['number'] == NULL){
            ?>
                <div id="zakaz" class="container">
                    <h3>Для заказа необходимо запонить форму</h2>
                    <form action="../functions/form-profile.php" method="post">
                        <input type="text" class="input-none" name="id" placeholder="" value="<?=$_SESSION['user']['id']?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Номер телефона</label>
                            <input type="text"  name="number" class="form-control" id="exampleFormControlInput1" placeholder="8XXXXXXXXXX">
                            </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Место проживания</label>
                            <input type="text" name="adress" class="form-control" id="exampleFormControlInput1" placeholder="Ул. Пушкина, Дом Колотушкина 17 подьезд 3 кв 142">
                        </div>
                        <button type="submit" class="btn">Отправить</button>
                    </form>
                </div>
            <?
          }
      ?>



<?php 
    if (isset($_SESSION['message-form-profile'])){
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=$_SESSION['message-form-profile']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                </div>
        <?

    }
    unset($_SESSION['message-form-profile']);
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/edit_profile.js"></script>
    <?php
        if($_SESSION['error'] == 1){
            ?>
                <script>
                    edit();
                </script>
            <?php
            $_SESSION['error'] = 0;
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
</div>
<?require'./details/footer.php'?>
</body>
</html>