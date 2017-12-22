<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="span9">
        <div class="features_items">

            <?php if ($result): ?>
                <p>Заказ оформлен. Мы Вам перезвоним.</p>
            <?php else: ?>
                <h2 class="title text-center">Last step</h2>
               <br>
                <p>In your cart: <?php echo $totalQuantity; ?> item(s) </p>
                <p>Total sum: <?php echo $totalPrice; ?>, $</p>
                <br/>

                <?php if (!$result): ?>

                    <div class="col-sm-4">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <div class="alert alert-error" style="width:150px;">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                        <div class="login-form">
                            <form action="#" method="post">

                                <p>Ваша имя</p>
                                <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>

                                <p>Номер телефона</p>
                                <input type="text" name="userPhone" placeholder=" Your number phone" value="<?php echo $userPhone; ?>"/>

                                <p>Комментарий к заказу</p>
<!--                                <input class="input-xlarge" style="resize: none; height: 65px;" type="textarea" name="userComment" placeholder="" value="--><?php //echo $userComment; ?><!--"/>-->
                                <textarea class="input-xlarge" id="textarea" rows="3" style="height:65px; resize: none;" name="userComment"  value="<?php echo $userComment; ?>" placeholder="Your comment"></textarea>
                                <br/>
                                <br/>
                                <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                            </form>
                        </div>
                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>