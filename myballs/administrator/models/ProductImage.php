<?php
/**
 * Created by PhpStorm.
 * User: akva
 * Date: 21.12.17
 * Time: 8:55
 */

class ProductImage
{
    public static  function getImageListAdmin(){
        $db = Db::getConnection();
    
        // Запрос к БД
        $result = $db->query('SELECT id, products_id, image FROM product_images ORDER BY id ASC');
    
        // Получение и возврат результатов
        $usersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['products_id'] = $row['products_id'];
            $usersList[$i]['image'] = $row['image'];

            $i++;
        }
        return $usersList;
    }
    public static function deleteImageById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product_images WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}