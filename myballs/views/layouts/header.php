<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MyBalls - best in the World!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="/template/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/template/themes/css/base.css" rel="stylesheet" media="screen"/>
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap style responsive -->
    <link href="/template/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="/template/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="/template/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <style type="text/css" id="enject"></style>
</head>
<body>
<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">
                Contact information
            </div>
            <div class="span6">
                <div class="pull-right">
                        Welcome<strong >
                            <?php echo (User::getUserName());?>
                        </strong>!
                    <a href="/cart"><span  class="btn btn-mini btn-primary "><i class="icon-shopping-cart icon-white"></i>  Cart [<span id="cart-count1">
                    <?php echo (Cart::countItems()); ?></span> ] Item(s) in your cart
                    </a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="http://myballs.ru/"><img src="/template/themes/images/logo.png" alt="Bootsshop"/></a>
                <a class="brand" href="http://myballs.ru/"><img src="/template/themes/images/vinni5.gif" style="height: 60px;" alt="Vini-puch"/></a>
                <ul id="topMenu" class="nav pull-right">
                    <li class=" " style="font-size:20px; color: #FFFFFF; text-align: center; margin-top: 15px; margin-right: 10px;">
                        <p>Никто не может грустить, когда у него есть воздушный шарик!</p>
                        <p style="text-align: right"> © Винни Пух</p>
                    </li>
                    <?php if (User::isGuest()): ?>
                        <li ><a href="/user/login/"><i ></i>  Log in</a></li>
                        <li><a href="/user/register/"><i ></i> Sig in</a></li>
                    <?php else: ?>
                        <li><a href="/cabinet/"><img src="<?php echo User::getUserAvatar()['image']; ?>" style=" margin-left: 10px; height: 50px;"></a></li>
                        <li><a href="/cabinet/"><i ></i>Profile</a></li>
                        <li><a href="/user/logout/"><i ></i> Exit</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody" style="min-height: 760px;">
    <div class="container">
        <div class="row">
                <div id="sidebar" class="span3">
                    <div  class="" style="width: auto;" >
                        <a id="myCart" href="/cart" style="align-items: center">
                            <img src="/template/themes/images/ico-cart.png" alt="cart" style="margin-right: 5px;">
                            <span  class="badge badge-warning">[ <div id="cart-count2" style="display:inline "><?php echo(Cart::countItems()); ?></div> ] Item(s) in your cart</span>
                        </a>
                    </div>
                    <h4> Каталог:</h4>
                    <ul id="sideManu" class="nav nav-tabs nav-stacked">
                        <?php foreach ($categories as $categoryItem): ?>
                            <li><a href="/category/<?php echo $categoryItem['id']; ?>"> <?php echo $categoryItem['name']; ?> </a> </li>
                        <?php endforeach; ?>
                    </ul>
                </div>