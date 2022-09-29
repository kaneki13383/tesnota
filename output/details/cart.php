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