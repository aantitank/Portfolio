<?php include ROOT . '/views/layouts/header.php'; ?>

        <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="http://myballs.ru/">Home</a> <span class="divider">/</span></li>
                    <li class="active">Registration</li>
                </ul>
                <h3> Registration</h3>
                <div class="well">

                <?php if ($result): ?>
                    <div style="font-size: 30px; font-weight: bold; text-align: center; margin: 20px 0 20px 0;" class="alert alert-info fade in">
                    <p>You are regestrated</p>
                    </div>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <div style="font-size: 15px; font-weight: bold;" class="alert alert-block alert-error fade in">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        </div>
                    <?php endif; ?>
                    <div class="alert fade in">
                        <strong>Name min 3 symbols</strong>
                        </br>
                        <strong>Password min 6 symbols</strong>
                    </div>
                    <form class="form-horizontal"  action="#" method="post" style="text-align: center;">
                        <div class="control-group">
                            <input type="text" name="name" placeholder="*Name" value="<?php echo $name; ?>"/>
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" placeholder="*E-mail" value="<?php echo $email; ?>"/>
                        </div>
                        <div class="control-group">
                            <input type="password" name="password" placeholder="*Password" value="<?php echo $password; ?>"/>
                        </div>
                        <div class="control-group" style="vertical-align: middle;">
                            <div class="col-sm-12 captcha">
                                <span class="input-group-addon"><img src="/components/Captcha/Captcha.php"></span>
                                </br>
                                <input type="text" name="captcha" placeholder="*Captcha">
                            </div>
                        </div>
                        <p style="font-size: medium "><sup style="font-weight: bold;">*</sup>Required field	</p>

                        <div class="control-group">
                                <input type="submit" name="submit" class="btn btn-large btn-success" type="submit" value="Register"  />
                        </div>
                    </form>
                <?php endif; ?>
        </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>