<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="span9">
        <ul class="breadcrumb">
        <li><a href="http://myballs.ru/">Home</a> <span class="divider">/</span></li>
        <li class="active">Log in</li>
    </ul>
    <div class="well">


                <?php if (isset($errors) && is_array($errors)): ?>
                <div style="font-size: 15px; font-weight: bold;" class="alert alert-block alert-error fade in">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

        <form class="form-horizontal"  action="#" method="post" style="text-align: center;">
                    <h3>Log in</h3>
                    <div class="control-group">
                        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                    </div>
                        <div class="control-group">
                        <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                        </div>
                        <div class="control-group">
                            <input type="checkbox" name="remember"/> Remember me <br/> <br/>
                        </div>
                    <div class="control-group">
                                <input type="submit" name="submit" class="btn btn-large btn-success" value="Log in" />
                    </div>
        </form>
                <br/>
                <br/>
            </div>
        </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>