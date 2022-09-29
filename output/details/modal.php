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
                        <label for="password_confirm" class="col-sm-2 col-form-label">Повтори пароль</label>
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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
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