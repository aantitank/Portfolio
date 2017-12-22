<?php //include ROOT . '/views/layouts/header_admin.php'; ?>

<!--<section>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!---->
<!--            <br/>-->
<!---->
<!--            <h4>Добрый день, администратор!</h4>-->
<!---->
<!--            <br/>-->
<!---->
<!--            <p>Вам доступны такие возможности:</p>-->
<!---->
<!--            <br/>-->
<!---->
<!--            <ul>-->
<!--                <li><a href="/admin/product">Управление товарами</a></li>-->
<!--                <li><a href="/admin/category">Управление категориями</a></li>-->
<!--                <li><a href="/admin/order">Управление заказами</a></li>-->
<!--                <li><a href="/admin/user">Управление пользователями</a></li>-->
<!--                <li><a href="/admin/comment/id">Управление коментариями</a></li>-->
<!--            </ul>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!---->
<?php //include ROOT . '/views/layouts/footer_admin.php'; ?>
<!---->
<?php
//echo $_SERVER['REQUEST_URI'];
//ini_set('display_errors',1);
//error_reporting(E_ALL);

//session_start();
//
// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');


// Вызов Router
$router = new Router();
$router->run();