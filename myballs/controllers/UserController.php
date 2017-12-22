<?php

/**
 * Контроллер UserController
 */
class UserController
{
    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegister()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $captcha = $_POST['captcha'];    
            // Флаг ошибок
            $errors = false;
            if( $captcha == $_SESSION['captcha'] ){
                // Валидация полей
                if (!User::checkName($name)) {
                    $errors[] = 'Invalid name!';
                }
                if (!User::checkEmail($email)) {
                    $errors[] = 'Invalid email!';
                }
                if (!User::checkPassword($password)) {
                    $errors[] = 'Invalid password!';
                }
                if (User::checkEmailExists($email)) {
                    $errors[] = 'This email is already in use!';
                }

                if ($errors == false) {
                    // Если ошибок нет
                    // Регистрируем пользователя
	   
                    $result = User::register($name, $email, $password);
                }
            }
                else{
                        $errors[] = 'Incorrect code from captcha!';
                }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    
    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;

        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Invalid password';
            }
//            if(User::getAccess($email) ['black_list']){
//
//            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);


            if (User::getAccess($email) ['black_list'] || $userId == false){
                $errors[] = 'Неправильные данные для входа на сайт';
            }
                else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                if (isset($_POST['remember'])) {
                    setcookie('email', $email, time() + 60*60*24*366);
                    setcookie('password', $password, time() + 60*60*24*366);
                }
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet");
            }
        }
        elseif (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::getAccess($email)) {
                $errors[] = 'Аккаунт заблокирован';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                if (isset($_POST['remember'])) {
                    setcookie('email', $email, time() + 60*60*24*366);
                    setcookie('password', $password, time() + 60*60*24*366);
                    print_r($_COOKIE);
                }
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        // Стартуем сессию
        session_start();
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }

}
