<?php

/**
 * Контроллер CabinetController
 * Кабинет пользователя
 */
class CabinetController
{

    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $ordersList = Order::getOrderByUserId($userId);

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function actionEdit()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];

        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {


                $types = array('gif', 'png', 'jpg');
                $size = 2500000;
                $typeFile = explode('.', $_FILES['image']['name']);

                if (in_array($typeFile[1], $types) && count($typeFile)==2 && $_FILES['image']['size'] <= $size) {
                    $typeFile=$typeFile[1];
                    $path = "/upload/images/users/" . $userId . "." . $typeFile;
                    $db = Db::getConnection();

                    $sql = "UPDATE user SET image = :image WHERE id = :id";

                    $result = $db->prepare($sql);
                    $result->bindParam(':id', $userId, PDO::PARAM_INT);
                    $result->bindParam(':image', $path, PDO::PARAM_STR);

                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $result->execute();

                    move_uploaded_file($_FILES["image"]["tmp_name"], //
                        $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/" . $userId . "." . $typeFile);
                } else {
                    ($errors[] = 'Invalid image. Check extension and size.');
                }
            }
            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $name, $password);

                }


        }

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
    public function actionOrder($id)
    {

        $categories = Category::getCategoriesList();

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProdustsByIds($productsIds);

        // Подключаем вид
        require_once(ROOT . '/views/cabinet/order.php');
        return true;
    }
}
