<?php include ROOT . '/views/layouts/header.php'; ?>
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="http://myballs.ru">Home</a> <span class="divider">/</span></li>
                    <li class="active"> Shopping cart</li>
                </ul>
                <h3>  Shopping cart [ <span><?php echo Cart::countItems(); ?></span> ] Item(s)
                    <a href="http://myballs.ru" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
                <hr class="soft"/>
                <?php if ($productsInCart): ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <p><?php echo $product['code'];?></p>
                        </td>
                        <td> <a href="/product/<?php echo $product['id'];?>">
                                <?php echo $product['name'];?>
                            </a></td>
                        <td> <img width="60" src="<?php echo Product::getImage($product['id']);?>" alt=""/></td>
                        <td><?php echo $productsInCart[$product['id']];?></td>

                        <td>

                                <p><?php echo $product['price'];?></p>

                        </td>
                        <td><?php echo ($product['price']*$productsInCart[$product['id']]);?></td>
                        <td>
                            <a href="/cart/delete/<?php echo $product['id'];?>"><button class="btn btn-danger" type="button" >
                                    <i class="icon-remove icon-white"></i></button></a>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                    <tr>
                        <td colspan="6" style="text-align:right"><strong>TOTAL=</strong></td>
                        <td class="label label-important" style="display:block"> <strong> <?php echo $totalPrice." $"; ?> </strong></td>
                    </tr>
                    </tbody>
                </table>

                <a href="http://myballs.ru" class="btn btn-large" style="font-weight: bold;"><i class="icon-arrow-left"></i> Continue Shopping </a>
                <?php if (User::isGuest()): ?>
                    <a href="user/login/" class="btn btn-large pull-right" style="font-weight: bold;">Please log in <i class="icon-arrow-right"></i></a>
                <?php else: ?>
                       <a href="/cart/checkout" class="btn btn-large pull-right" style="font-weight: bold;">Next <i class="icon-arrow-right"></i></a>
                <?php endif; ?>
                <?php endif; ?>

            </div>
        </div></div>
</div>
<!-- MainBody End ============================= -->
<?php include ROOT . '/views/layouts/footer.php'; ?>