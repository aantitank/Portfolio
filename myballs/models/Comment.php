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
}
