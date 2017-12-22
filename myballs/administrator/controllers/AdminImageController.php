<?php
/**
 * Created by PhpStorm.
 * User: akva
 * Date: 21.12.17
 * Time: 8:54
 */

class AdminImageController extends AdminBase
{
    public function actionIndex()
    {

        // Получаем список категорий
        $imageList = ProductImage::getImageListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_image/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        // Проверка доступа
        //  self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            ProductImage::deleteImageById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/image");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_image/delete.php');
        return true;
    }
}