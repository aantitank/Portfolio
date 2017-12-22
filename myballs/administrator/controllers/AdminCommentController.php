<?php

/**
 * Контроллер AdminOrderController
 * Управление заказами в админпанели
 */
class AdminCommentController extends AdminBase
{

    /**
     * Action для страницы "Управление заказами"
     */
    public function actionIndex($id)
    {
        // Проверка доступа
       // self::checkAdmin();

        // Получаем список заказов
        $commentList = Comment::getCommentsList($id);

        if (isset($_POST['submit'])) {
			$user_id = User::getUsersIdByEmail($_POST['email']); 
			$commentList=Comment::getCommentsByUserId($user_id);
		} elseif(isset($_POST['submitProd'])) {			
			$product_id = Product::getProductByName($_POST['product_name']); 
			$commentList=Comment::getCommentsOfProduct($product_id);			
		}
        // Подключаем вид
        require_once(ROOT . '/views/admin_comment/index.php');
        return true;
    }

    public function actionUser($user_id)
    {
        // Проверка доступа
       // self::checkAdmin();
        // Получаем список заказов
        $commentList = Comment::getCommentsListByUserId($user_id);

        if (isset($_POST['submit'])) {
			$user_id = User::getUsersIdByEmail($_POST['email']);
            header("Location: /admin/comment/".$user_id);
		}

        // Подключаем вид
        require_once(ROOT . '/views/admin_comment/index.php');
        return true;
    }


    /**
     * Action для страницы "Редактирование заказа"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        //self::checkAdmin();

        // Получаем данные о конкретном заказе
        $comment = Comment::getCommentById($id);


        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $newdate = $_POST['newdate'];
            $comment = $_POST['comment'];
            $products_id = $_POST['products_id'];
            $user_id = $_POST['user_id'];

            // Сохраняем изменения
            Comment::updateCommentById($id, $newdate, $comment, $products_id, $user_id);

            // Перенаправляем пользователя на страницу управлениями заказами
            header("Location: /admin/comment/id");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_comment/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить заказ"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
       // self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            Comment::deleteCommentById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/comment/id");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_comment/delete.php');
        return true;
    }

}
