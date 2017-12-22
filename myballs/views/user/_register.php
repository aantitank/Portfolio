<?php include ROOT . '/views/layouts/header.php'; ?>

        <div class="span9">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                            <div class="col-sm-12 captcha">
										<span class="input-group-addon"><img src="/components/Captcha/Captcha.php"></span>
										<input type="text" name="captcha" placeholder="Код с картинки">
			    </div>
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                            
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>