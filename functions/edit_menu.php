<?php
    session_start();
    require './connect.php';
    $id = $_GET['id'];
    $sql = $connect->query("SELECT * FROM `menu` WHERE `id` = '$id'");
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $name = $row['name'];
        $img = '../'.$row['img'];
        $discription = $row['discription'];
        $price = $row['price'];
        $type = $row['type'];
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
    <title>Редактирование</title>
</head>
<body class="bg-dark">
<div class="container">
<div id="form_menu">
          <h3>Редактирование</h3>
            <form action="/functions/edit_menu_done.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id?>">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Название блюда или напитка</label>
                <input type="text" class="form-control" name="name" id="formGroupExampleInput" pattern="^[А-Яа-яЁё\s]+$" value="<?=$name?>">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Фотография блюда или напитка</label>
                <input type="file" class="form-control" name="img" id="formGroupExampleInput2" accept=".png, .jpg, .jpeg">
            </div>
            <img src="<?=$img?>" alt="">
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Описание блюда</label>
                <textarea type="text" class="form-control" name="discription" rows="6" id="formGroupExampleInput2"><?=$discription?></textarea>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Стоимость</label>
                <input type="text" class="form-control" name="price" id="formGroupExampleInput" value="<?=$price?>">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" <?
                    if($type == 'dessert'){
                        echo 'checked';
                    }
                ?> value="dessert" name="type" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Дессерт
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" <?
                    if($type == 'snacks'){
                        echo 'checked';
                    }
                ?> value="snacks" name="type" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Закуски
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" <?
                    if($type == 'drinks'){
                        echo 'checked';
                    }
                ?> value="drinks" name="type" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Напитки
                </label>
            </div>
            <button type="submit" class="btn">Редактировать</button>
            </form>
          </div>
      </div>
</div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>