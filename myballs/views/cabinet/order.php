<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="span9">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/cabinet/">Cabinet /</a></li>
            <li class="active">Order /</li>
        </ol>
    </div>


    <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>
    <br/>




    <h5>Информация о заказе</h5>
    <table class="table-admin-small table-bordered table-striped table">
        <tr>
            <td>Номер заказа</td>
            <td><?php echo $order['id']; ?></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><?php echo $order['user_phone']; ?></td>
        </tr>
        <tr>
            <td>Комментарий</td>
            <td><?php echo $order['user_comment']; ?></td>
        </tr>
        <tr>
            <td><b>Статус заказа</b></td>
            <td><?php echo Order::getStatusText($order['status']); ?></td>
        </tr>
        <tr>
            <td><b>Дата заказа</b></td>
            <td><?php echo $order['date']; ?></td>
        </tr>
    </table>

    <h5>Товары в заказе</h5>

    <table class="table-admin-medium table-bordered table-striped table ">
        <tr>
            <th>ID товара</th>
            <th>Артикул товара</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['code']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $productsQuantity[$product['id']]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
