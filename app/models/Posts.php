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
			return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}

		public static function displayAllPosts($username)
		{
			$db = self::getDB() ;

			$get_all_posts = $db->prepare("SELECT link FROM link2 where name='{$username}'") ;
			$get_all_posts->execute() ;
			$all_posts="";
			while($row=$get_all_posts->fetch(\PDO::FETCH_ASSOC))
			{
				$all_posts = $row['link'];
			}
			return $all_posts;
		}
	}
?>
