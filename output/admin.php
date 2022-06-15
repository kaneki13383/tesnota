<?php 
session_start();
if (!$_SESSION['admin']){
    header('Location: admin.php');
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
    <title>Профиль <?=$_SESSION['admin']['login']?></title>
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
                </ul>
                <button type="button" class="btn btn_backet" data-bs-toggle="modal" style="border: none; background-color: transparent;" data-bs-target="#modalCART">
                    <img src="../images/basket.png" alt="" class="backet">
                </button>
                <form class="d-flex">
                    <input class="form-control me-2 search" type="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn" style="margin-right: 20px;" type="submit"><img src="../images/search.png" alt=""></button>
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
                  <img src="<?='/' . $_SESSION['admin']['avatar']?>" alt="">
              </a>
              <h1><?=$_SESSION['admin']['full_name']?></h1>
              <p><?=$_SESSION['admin']['email']?></p>
          </div>

          <ul class="nav nav-pills nav-stacked ">
              <li id="profile" class="active"><a href="#" onclick="profile_admin()"> <i class="fa fa-user"></i> Профиль</a></li>
              <li id="ed_prof"><a href="#"  onclick="users()"> <i class="fa fa-edit"></i> Пользователи</a></li>
              <li id="menu_add"><a href="#"  onclick="menu_add()"> <i class="fa fa-edit"></i> Новые блюда</a></li>
              <li><a href="../functions/logout_admin.php"> <i class="fa fa-logout"></i> Выход</a></li>
          </ul>
      </div>
  </div>
  <div  class="profile-info col-md-9">
      <div class="panel">
          <div id="users" style="display: none;" class="container">
          <h3>Пользователи</h3>
            <?
                require '../functions/connect.php';
                $sqli = $connect->query("SELECT * FROM `users`");
                while($res = $sqli->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <div class="card bg-dark" style="color: white; margin-bottom: 25px;">
                            <div class="card-header">
                                <?=$res['full_name']?>
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                <img src="<?
                                    if($res['avatar'] === 'avatars/'){
                                        echo '../images/noavatar.png';
                                    }
                                    else{
                                        echo "/{$res['avatar']}";
                                    }
                                ?>" width="110" height="110" style="border-radius: 50%;" alt="">
                                <div>
                                    <p>Логин: <?=$res['login']?></p>
                                    <p>Адрес: <?if ($res['adress'] === 'avatars/'){
                                                    echo 'Не указан';
                                                    }
                                                    else{
                                                        echo $res['adress'];
                                                    }     ?></p>
                                    <p>Номер телефона: <?if ($res['number'] == NULL){
                                                    echo 'Не указан';
                                                    }
                                                    else{
                                                        echo $res['number'];
                                                    }     ?></p>
                                    <p>Роль: <?if ($res['role'] == 1){
                                        echo 'Администратор';
                                    }
                                    else{
                                        echo 'Пользователь';
                                    }
                                    ?></p>
                                </div>                                
                                <footer class="blockquote-footer"><?=$res['email']?></footer>
                                <a href="../functions/delete_user.php?id=<?=$res['id']?>" class="btn">Удалить</a>
                                </blockquote>
                            </div>
                            </div>
                        
                    <?
                }
            ?></div>
           </div>
          <div id="biograph" class="panel-body bio-graph-info">
              <h3>Ваши данные</h3>
              <div class="row">
                  <div class="bio-row">
                      <p><span>ФИО:</span><?=$_SESSION['admin']['full_name']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Роль:</span> <?php
                          if ($_SESSION['admin']['role'] == 0){
                                echo 'Пользователь';
                            }
                            else{
                                echo 'Администратор';
                            }                    
                      ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email:</span><?=$_SESSION['admin']['email']?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Телефон:</span><?php
                          if ($_SESSION['admin']['number'] == NULL){
                            echo 'Не указан';
                            }
                            else{
                                echo $_SESSION['admin']['number'];
                            }                   
                      ?></p>
                  </div>
                  <div class="bio-row">
                      <p><span>Адрес:</span><?php
                          if ($_SESSION['admin']['adress'] == NULL){
                            echo 'Не указан';
                            }
                            else{
                                echo $_SESSION['admin']['adress'];
                            }                   
                      ?></p>
                  </div>
              </div>
          </div>

          <div id="form_menu" style="display: none;">
          <h3>Добавить новое блюдо</h3>
            <form action="../functions/add_menu.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Название блюда или напитка</label>
                <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Фотография блюда или напитка</label>
                <input type="file" class="form-control" name="img" id="formGroupExampleInput2" placeholder="">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Описание блюда</label>
                <textarea type="text" class="form-control" name="discription" rows="6" id="formGroupExampleInput2" placeholder=""></textarea>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Стоимость</label>
                <input type="text" class="form-control" name="price" id="formGroupExampleInput" placeholder="">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="dessert" name="type" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Дессерт
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="snacks" name="type" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Закуски
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="drinks" name="type" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Напитки
                </label>
            </div>
            <button type="submit" class="btn">Добавить</button>
            </form>
          </div>
      </div>

      <div id="order" class="container">
          <h3>Отзывы</h3>
        <?
            require '../functions/connect.php';
            $sql = $connect->query("SELECT * FROM `feedback`");
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="card bg-dark" style="color: white;">
                    <div class="card-header">
                        <?=$row['name']?> <?=$row['surname']?>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <p><?=$row['comment']?></p>
                        <footer class="blockquote-footer"><?=$row['email']?></footer>
                        <a href="../functions/delete_order.php?id=<?=$row['id']?>" class="btn">Удалить</a>
                        </blockquote>
                    </div>
                    </div>
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
        if($_SESSION['error'] === 1){
            ?>
                <script>
                    edit();
                </script>
            <?php
            $_SESSION['error'] = 0;
        }

        if($_SESSION['del-user'] === 1){
            ?>
                <script>
                    users();
                </script>
            <?php
            $_SESSION['del-user'] = 0;
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

          if($_SESSION['add_menu'] === 1){
              ?><script>menu_add();</script><?
          }
          $_SESSION['add_menu'] = 0;
    ?>
</body>
</html>