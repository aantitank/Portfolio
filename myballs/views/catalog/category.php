<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="span9" style="height: auto;">
                <ul class="breadcrumb">
                    <li><a href="http://myballs.ru">Home</a> <span class="divider">/</span></li>
                    <li class="active"><?php echo Category::getCategoryById($categoryId)['name']; ?></li>
                </ul>
                <h3> <?php echo Category::getCategoryById($categoryId)['name']; ?></h3>
                <hr class="soft"/>
                <br class="clr"/>
                    <div class="tab-pane  active" id="blockView">
                        <ul class="thumbnails">
                            <?php foreach ($categoryProducts as $product): ?>
                                <li class="span3" >
                                    <div class="thumbnail" style=" height:240px; width:180px;">
                                        <a href="product/<?php echo $product['id']; ?>"><img src="<?php echo Product::getImage($product['id']); ?>" style="height: 120px;" alt=""></a>
                                        <div class="caption" style="width:100%;">
                                            <div>
<span>
                                                            <a href="product/<?php echo $product['id']; ?>">
                                                                <p style="font-size: 14px;  margin: 10px 15px 0 0 ;font-family: inherit;font-weight: bold;line-height: 20px;color: inherit;text-rendering: optimizelegibility;">
                                                                    <?php echo $product['name']; ?></p>
                                                            </a>
                                                        </span>                            </div>
                                            <div style="position: absolute; bottom: 0;" >
                                                <h4><a class="btn add-to-cart"  data-id="<?php echo $product['id']; ?>" >В корзину</a> <?php echo(" $".$product['price']); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <hr class="soft"/>
                    </div>
                    <div class="pagination" style="text-align: center">
                        <ul>
                            <?php echo $pagination->get(); ?>
                        </ul>
                    </div>
                </div>

                <br class="clr"/>
            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
<?php include ROOT . '/views/layouts/footer.php'; ?>
