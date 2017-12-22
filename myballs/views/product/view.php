<?php include ROOT . '/views/layouts/header.php'; ?>
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="http://myballs.ru/">Home</a> <span class="divider">/</span></li>
                    <li><a href="category/<?php echo $product['category_id']; ?>"><?php echo (Category::getCategoryById( $product['category_id'])['name']); ?>
                        </a> <span class="divider">/</span></li>
                    <li class="active"><?php echo $product['name']; ?></li>
                </ul>
                <div class="row">
                    <div id="gallery" class="span3">
                        <a href="<?php echo Product::getImage($product['id']) ?>" title="<?php echo $product['name']; ?>">
                            <img src=<?php echo Product::getImage($product['id']) ?> style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
                        </a>
                        <div id="differentview" class="moreOptopm carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php $PATHGALLERY="/upload/images/gallery/".$product['id']."/"; foreach ($productImages as $productIm): ?>
                                    <a href="<?php echo ($PATHGALLERY.$productIm['image']); ?>"> <img style="width:80px;" src="<?php echo ($PATHGALLERY.$productIm['image']); ?>" alt=""/></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="span6">
                        <h3><?php echo $product['name']; ?> </h3>
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm">
                            <div class="control-group">
                                <div class="controls" style="margin-left: 0">
                                    <button type="submit" class="btn btn-large btn-primary add-to-cart" data-id="<?php echo $product['id']; ?>" style="position:relative; flow:left"> Add to cart <i class=" icon-shopping-cart" style="margin-top: 5px"></i></button>
                                    <p class="control-label" style=" margin: 1% -8% 0px 0px; text-align: left"><span ><?php echo "Price: ".$product['price']." $"; ?></span></p>
                                </div>
                            </div>
                        </form>
                        <hr class="soft clr"/>
                        <p>
                            <?php echo $product['description']; ?>

                        </p>
                        <br class="clr"/>
                        <hr class="soft"/>



                    </div>

                                    </div>
                <section>
                    <div class="container" style="width: 870px;">
                        <div class="content-box" id="Comment">
                            <div class="article-header text-center"><h3>Отзывы о товаре</h3></div>
                            <hr>
                            <?php  if( !$countOfComments ):?>
                                <div class="text-center"> <h5>Отзывы о данном товаре отсутсвуют.</h5> </div>
                            <?php else:?>
                                <?php foreach($comments as $comment): ?>
                                    <h5><?php print_r($comment['user_name']); ?></h5>
                                    <h5><?php print_r($comment['date']); ?></h5>
                                    <h5><?php print_r($comment['comment']); ?></h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <em><?php$comment['user_name']?></em>
                                            <span class="pull-right"><?php$comment['date']?></span>
                                            <p><?php$comment['comment']?></p>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach; ?>
                            <?php endif;?>
                            <div class="row" style="margin-left: 0;">
                                <form action="#" method="post" class="form-contact-alt">
                                    <input type="hidden" name="action" value="addComment">
                                    <input type="hidden" name="id" value="<?php$_GET['id']?>">
                                    <div class="form-group">
                                        <label>Оставить отзыв:</label>
                                        <?php if( isset( $errors ) && is_array( $errors ) ):?>
                                            <div class="col-md-12 errors">
                                                <ul>
                                                    <?php foreach( $errors as $error ):?>
                                                        <li>Ошибка: <?php echo $error;?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        <?php endif;?>
                                        <textarea cols="40" rows="5" class="form-control" name="message" style="resize: none; width: 300px;"><?php echo $message;?></textarea>
                                    </div>
                                    <?php if( $guest ):?>
                                        <h5 style="text-align: center;">Для написания отзывов
                                            <a href="/user/login">авторизируйтесь</a> или
                                            <a href="/user/register">зарегистрируйтесь</a> на сайте.
                                        </h5>
                                    <?php else:?>
                                        <div class="col-sm-4 captcha" id="comment_captcha">
                                            <span class="input-group-addon"><img src="/components/Captcha/Captcha.php"></span>
                                            <input type="text" name="captcha" placeholder="Код с картинки">
                                        </div>
                                        <div class="submit-container" id="oformit">
                                            <input type="submit" name="submit" class="btn-default" value="Отправить" />
                                        </div>
                                    <?php endif;?>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

<!-- MainBody End ============================= -->
<?php include ROOT . '/views/layouts/footer.php'; ?>
