<?php include ROOT . '/views/layouts/header.php'; ?>


    <div class="span9">
    <ul class="breadcrumb">
        <li><a href="http://myballs.ru/">Home</a> <span class="divider">/</span></li>
        <li><a href="http://myballs.ru/cabinet/">Profile</a></li>
        <li class="active"><span class="divider">/</span>Edit</li>
    </ul>

    <div class="well">


            <?php if ($result): ?>

                <div class="alert alert-info fade in">
                    <p style="font-size: 30px; font-weight: bold; text-align: center; margin: 20px 0 20px 0;">Success edit!</p>
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
            <h2>Edit data</h2>
            <form class="form-horizontal"  action="" method="post" enctype="multipart/form-data" style="text-align: center;">
                <div class="control-group">
                            <h5>Name:</h5>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                </div>
    <div class="control-group">
                            <h5>Password:</h5>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
    </div>
    <div class="control-group">
                            <h5>Avatar:</h5>
                            <img style = "text-align: center;" src="<?php echo $user['image']; ?>" alt="" width="250" height="250"/>
                </div>
                                <div class="control-group">
                                    <input type="file" name="image" style="text-align: center; margin-bottom: 20px;" >
                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-large btn-success" value="Save" />
                                </div>
                    </form>
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>