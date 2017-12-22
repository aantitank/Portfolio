<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
							<div class="recommended_items"><!--recommended_items-->
										<div class="cycle-slideshow" 
											 data-cycle-fx=carousel
											 data-cycle-timeout=5000
											 data-cycle-carousel-visible=1
											 data-cycle-carousel-fluid=true
											 data-cycle-slides="div.item"
											 data-cycle-prev="#prev"
											 data-cycle-next="#next"
											 >                        
												 <?php foreach ($productImages as $productIm): ?>
												<div class="item">
													<div class="product-image-wrapper">
														<div class="single-products" >
<!--
															<div class="productinfo text-center">
														
-->
		<br/><br/>					
																<img src="<?php echo ($productIm['image']); ?>" alt="" width="237" height="220"/>
<!--
																<img src="<?php $productIm['image']; ?>" alt="" />
-->


<!--
																<br/><br/>
-->

<!--
															</div>
-->
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>

										<a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
											<i class="fa fa-angle-left"></i>
										</a>
										<a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
											<i class="fa fa-angle-right"></i>
										</a>

									</div>
								</div><!--/recommended_items-->
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

                                <?php if ($product['is_new']): ?>
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>

                                <h2><?php echo $product['name']; ?></h2>
                                <p>Код товара: <?php echo $product['code']; ?></p>
                                <span>
                                    <span>US $<?php echo $product['price']; ?></span>
                                    <a href="#" data-id="<?php echo $product['id']; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                                <p><b>Наличие:</b> <?php echo Product::getAvailabilityText($product['availability']); ?></p>
                                <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <br/>
                            <h5>Описание товара</h5>
                            <?php echo $product['description']; ?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<section>
	<div class="container">
		<div class="content-box" id="Comment">
			<div class="article-header text-center"><h1>Отзывы о товаре</h1></div>
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
			<div class="row">
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
						<textarea cols="40" rows="5" class="form-control" name="message"><?php echo $message;?></textarea>
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

<?php include ROOT . '/views/layouts/footer.php'; ?>
