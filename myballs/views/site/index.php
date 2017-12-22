<?php include ROOT . '/views/layouts/header.php'; ?>
            <div class="span9">
                <div class="well well-small">
                    <h4>Top 8 featured products. You will find us all!</h4>
                    <div class="row-fluid">
                        <div id="featured" class="carousel slide" style="width:100%;">
                            <div class="carousel-inner">

                                <?php $i=0; $j=0;?>
                                <?php foreach ($sliderProducts as $sliderItem): ?>
                                    <?php if ($j>=0 and $j<4):?>

                                        <?php if($j==0): ?>
                                            <div class="item active">
                                            <ul class="thumbnails">
                                        <?php endif; ?>
                                        <li class="span3" >
                                            <div class="thumbnail" style=" height:240px; width:180px;">
                                                <a href="product/<?php echo $sliderItem['id']; ?>"><img src="<?php echo Product::getImage($sliderItem['id']); ?>" style="height: 120px;" alt=""></a>
                                                <div class="caption" style="width:100%;">
                                                    <div>
                                                        <span>
                                                            <a href="product/<?php echo $sliderItem['id']; ?>">
                                                                <p style="font-size: 14px;  margin: 10px 15px 0 0 ;font-family: inherit;font-weight: bold;line-height: 20px;color: inherit;text-rendering: optimizelegibility;">
                                                                    <?php echo $sliderItem['name']; ?></p>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div style="position: absolute; bottom: 0;" >
                                                        <h4><a class="btn add-to-cart"  data-id="<?php echo $sliderItem['id']; ?>" >В корзину</a> <?php echo(" $".$sliderItem['price']); ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php if($j==3): ?>
                                            </ul>
                                            </div>
                                        <?php endif; ?>
                                    <?php elseif ($j>=4 and $j<7):?>

                                        <?php if($j==4): ?>
                                            <div class="item">
                                            <ul class="thumbnails">
                                        <?php endif; ?>
                                        <li class="span3" >
                                            <div class="thumbnail" style=" height:240px; width:180px;">
                                                <a href="product/<?php echo $sliderItem['id']; ?>"><img src="<?php echo Product::getImage($sliderItem['id']); ?>" style="height: 120px;" alt=""></a>
                                                <div class="caption" style="width:100%;">
                                                    <div>
                                                        <span>
                                                            <a href="product/<?php echo $sliderItem['id']; ?>">
                                                                <p style="font-size: 14px;  margin: 10px 15px 0 0 ;font-family: inherit;font-weight: bold;line-height: 20px;color: inherit;text-rendering: optimizelegibility;">
                                                                    <?php echo $sliderItem['name']; ?></p>
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div style="position: absolute; bottom: 0;" >
                                                        <h4><a class="btn add-to-cart"  data-id="<?php echo $sliderItem['id']; ?>" >В корзину</a> <?php echo(" $".$sliderItem['price']); ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php if($j==7): ?>
                                            </ul>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php
                                    ++$j;
                                    if($j>=8) break;
                                endforeach;
                                ?>
                                <?php if($j!=3 or $j!=7): ?>
                                </ul>
                            </div>
                            <?php endif; ?>

                        </div>
                        <a class="left carousel-control" href="#featured" data-slide="prev" style="left: 0 %; font-size: 30px;">&#9664;</a>
                        <a class="right carousel-control" href="#featured" data-slide="next" style="left: 94%; font-size: 30px;">&#9654;</a>
                    </div>
                </div>
            </div>
<div >
            <h4>Latest Products </h4>
            <ul class="thumbnails">
                <?php $j=0; ?>
                <?php foreach ($latestProducts as $product): ?>
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
                                <h4><a class="btn add-to-cart"  data-id="<?php echo $product['id']; ?>" >В корзину</a>
                                    <?php echo(" $".$product['price']); ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </li>
                <?php if($j!=5): ++$j;
                else: break;
                endif;?>

                <?php endforeach; ?>
            </ul>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>



