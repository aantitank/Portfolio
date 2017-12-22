<?php
class Comment{
	public static function getCommentsOfProduct( $productID ){
		$db = Db::getConnection();
		
		$sql = 'SELECT * FROM comments WHERE products_id = :id ORDER BY date DESC';
		
		$result = $db -> prepare( $sql );
		$result -> bindParam( ':id', $productID, PDO::PARAM_INT );
		
		$result -> setFetchMode( PDO::FETCH_ASSOC );
		$result -> execute();
		
		$comments = array();
		
		$i = 0;
		while( $row = $result -> fetch() ){
			$comments[$i]['date'] = $row['date'];
			$user = User::getUserById( $row['user_id'] );
			$comments[$i]['user_name'] = $user['name'];
			$comments[$i]['comment'] = $row['comment'];
			$i++;
		}
		return $comments;
	}

	public static function addComment( $productID, $userID, $message ){
		$db = Db::getConnection();
		
		$sql = "INSERT INTO comments ( products_id, user_id, comment ) "
				."VALUES ( :productID, :userID, :message )";
		
		$result = $db -> prepare( $sql );
		$result -> bindParam( ':productID', $productID, PDO::PARAM_INT );
		$result -> bindParam( ':userID', $userID, PDO::PARAM_INT );
		$result -> bindParam( ':message', $message, PDO::PARAM_STR );
		
		return $result -> execute();
	}

    public static function getCommentsByUserId($user_id){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE user_id = :id ORDER BY date DESC';

        $result = $db -> prepare( $sql );
        $result -> bindParam( ':id', $user_id, PDO::PARAM_INT );

        $result -> setFetchMode( PDO::FETCH_ASSOC );
        $result -> execute();

        $comments = array();
        $i = 0;
        while( $row = $result -> fetch() ){
            $comments[$i]['id'] = $row['id'];
            $comments[$i]['date'] = $row['date'];
            $user = User::getUserById( $row['user_id'] );
            $comments[$i]['user_name'] = $user['name'];
            $comments[$i]['comment'] = $row['comment'];
            $comments[$i]['products_id'] = $row['products_id'];
            $comments[$i]['user_id'] = $row['user_id'];
            $i++;
        }

        return $comments;
    }


    public static function getCommentById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM comments WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }
    public static function getCommentsList($id)
    {
        $db = Db::getConnection();
        if ($id == 'id'){$sql = 'SELECT * FROM comments ORDER BY id ASC';}
        if ($id == 'date'){$sql = 'SELECT * FROM comments ORDER BY date DESC';}
        if ($id == 'products_id'){$sql = 'SELECT * FROM comments ORDER BY products_id ASC';}

        $result = $db -> prepare( $sql );

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        $commentList = array();
        $i = 0;

        while( $row = $result -> fetch() ){
            $commentList[$i]['id'] = $row['id'];
            $commentList[$i]['user_id'] = $row['user_id'];
            $commentList[$i]['products_id'] = $row['products_id'];
            $commentList[$i]['date'] = $row['date'];
            $commentList[$i]['comment'] = $row['comment'];
            $i++;
        }

        return $commentList;
    }

    public static function getCommentsListByUserId($user_id)
    {
        $db = Db::getConnection();
        print_r($user_id);

        $sql = 'SELECT * FROM comments WHERE user_id = :user_id';


        $result = $db -> prepare( $sql );

        $result -> bindParam( ':user_id', $user_id, PDO::PARAM_INT );

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);


        // Выполняем запрос
        $result->execute();

        $commentList = array();
        $i = 0;

        while( $row = $result -> fetch() ){
            $commentList[$i]['id'] = $row['id'];
            $commentList[$i]['user_id'] = $row['user_id'];
            $commentList[$i]['products_id'] = $row['products_id'];
            $commentList[$i]['date'] = $row['date'];
            $commentList[$i]['comment'] = $row['comment'];
            $i++;
        }

        return $commentList;
    }


    public static function deleteCommentById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM comments WHERE id = :id';


        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }



    public static function updateCommentById($id, $newdate, $comment, $products_id, $user_id)
    {
        // Соединение с БД
        $db = Db::getConnection();


        // Текст запроса к БД
        $sql = "UPDATE comments
            SET 
                date = :date, 
                comment = :comment, 
                products_id = :products_id, 
                user_id = :user_id 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':date', $newdate, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':products_id', $products_id, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $result->execute();
    }
}
