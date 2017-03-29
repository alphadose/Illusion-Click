<?php

	namespace Models ;

	class Login
	{
		public function __construct()
		{

		}

		public static function getDB()
		{
			include __DIR__."/../../configs/credentials.php" ;
			return new \PDO("pgsql:dbname=".$db_connect['db_name'].";host=".$db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}


		public static function authenticate($username , $password)
		{
			$db = self::getDB() ;

			$checkUser = $db->prepare("SELECT * FROM link2 WHERE name=:username") ;
			$checkUser->execute(array(
				"username"=>$username
				)) ;
			$row=$checkUser->fetch(\PDO::FETCH_ASSOC) ;
			if($row)
			{
				$password_hash = sha1($password) ;
				if($row['password'] == $password_hash)
				{
					$_SESSION['status'] = "1";
					$_SESSION['username'] = $row['name'] ;
					$_SESSION['age'] = $row['age'] ;
					$_SESSION['link'] = $row['link'] ;
					return 0 ;
				}
				else
				{
					return 2 ;
				}
			}
			else
			{
				return 1 ;
			}
		}
	} ;
?>