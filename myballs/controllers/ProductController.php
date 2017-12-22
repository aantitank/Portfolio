<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($productId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

     	// Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);
    $productImages = Product::getProductImages($productId);
	$comments = Comment::getCommentsOfProduct($productId);
	$guest = User::isGuest();
	$countOfComments = false;
	if( count( $comments ) != 0 ){
		$countOfComments = true;
	}

	$message = '';
	
	$errors = false;
	if( isset( $_POST['submit'] )){
		$message = htmlspecialchars( $_POST['message'] );
		if( !$guest ){
			$captcha = $_POST['captcha'];
			if( $captcha == $_SESSION['captcha'] ){
				$userId = User::checkLogged();
				Comment::addComment( $productId, $userId, $message );
				header( "Location: /product/$productId" );
			}
			else{
				$errors[] = 'Код с картинки введен неверно!';
			}
		}
	}
        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

}
