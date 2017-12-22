<?php

/**
 * Контроллер AdminCategoryController
 * Управление категориями товаров в админпанели
 */
class AdminUserController extends AdminBase
{

    /**
     * Action для страницы "Управление категориями"
     */
    public function actionIndex()
    {

        // Получаем список категорий
        $userList =User::getUserListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }


    public function actionUpdate($id)
    {
        // Проверка доступа
     //   self::checkAdmin();

        // Получаем данные о конкретной категории
        $user = User::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $black_list = $_POST['black_list'];

            // Сохраняем изменения
            $result = User::updateUserById($id, $name, $email, $password, $role, $black_list);
			if ($result) {
					
                    // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
					$path =  "/upload/images/users/".$id.".jpg";
					$db = Db::getConnection();

					$sql = "UPDATE user SET image = :image WHERE id = :id";

					$result = $db -> prepare( $sql );
					$result -> bindParam( ':id', $id, PDO::PARAM_INT );
					$result -> bindParam( ':image', $path, PDO::PARAM_STR );

					$result -> setFetchMode( PDO::FETCH_ASSOC );
					$result -> execute();
		            // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/$id.jpg");
                    }
				};
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить категорию"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
      //  self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            User::deleteUserById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/delete.php');
        return true;
    }
    public function actionCreateAdmin()
    {
        // Проверка доступа
      //  self::checkAdmin();



        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $black_list = $_POST['black_list'];

            // Сохраняем изменения
            $result = User::createUserAdmin($name, $email, $password, $role, $black_list);
			if ($result) {
					
                    // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        			$id = User::getUsersIdByEmail($email);

					$path =  "/upload/images/users/".$id.".jpg";
					$db = Db::getConnection();

					$sql = "UPDATE user SET image = :image WHERE id = :id";

					$result = $db -> prepare( $sql );
					$result -> bindParam( ':id', $id, PDO::PARAM_INT );
					$result -> bindParam( ':image', $path, PDO::PARAM_STR );

					$result -> setFetchMode( PDO::FETCH_ASSOC );
					$result -> execute();
		            // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/$id.jpg");
                    }
				};
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/create.php');
        return true;
    }

}
