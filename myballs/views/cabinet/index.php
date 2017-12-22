<?php include ROOT . '/views/layouts/header.php'; ?>

        <div class="span9">
            <div class="span6" style="width: 200px;">
                <h4>Private cabinet</h4><br/>
                <ul class="nav nav-tabs nav-stacked" >
                    <li class="active"><a href="http://myballs.ru/cabinet/">Profile</a></li>
<!--                    <li><a href="/cabinet/view">View profile</a></li>-->
                    <li><a href="/cabinet/edit">Edit data</a></li>
                </ul>
            </div>
            <div class="span9">
                <h4>Список заказов</h4>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>Дата оформления</th>
                        <th>Статус</th>
                        <th></th>
                    </tr>
                    <?php foreach ($ordersList as $order): ?>
                        <tr>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo Order::getStatusText($order['status']); ?></td>
                            <td><a href="/cabinet/order/<?php echo $order['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>