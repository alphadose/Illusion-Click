<?php

	namespace Models ;

	class Posts
	{

		public function __construct()
		{

		}

		public static function getDB()
		{
			include __DIR__."/../../configs/credentials.php" ;
			return new \PDO("pgsql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}

		public static function displayAllPosts()
		{
			$db = self::getDB() ;
			$get_all_posts = $db->prepare("SELECT * FROM data ORDER BY score DESC") ;
			$get_all_posts->execute() ;
			$all_posts = array() ;
			while($row=$get_all_posts->fetch(\PDO::FETCH_ASSOC))
			{
				$all_posts[] = $row;
			}
			return $all_posts ;
		}
	}
?>
