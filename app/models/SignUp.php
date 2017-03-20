<?php

	namespace Models ;

	class SignUp
	{
		public function __construct()
		{

		}

		public static function getDB()
		{
			include __DIR__."/../../configs/credentials.php" ;
			return new \PDO("mysql:dbname=".$db_connect['db_name'].";host=".$db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}

		public static function checkAndAddUser($username , $password , $age , $link)
		{
			$db = self::getDB() ;
			
			$checkUser = $db->prepare("SELECT * FROM link2 WHERE name = :username") ;
			$checkUser->execute(array(
				"username"=>$username
				)) ;
			$row = $checkUser->fetch(\PDO::FETCH_ASSOC);
			if($row)
			{
				return 0 ;
			}
			else
			{
				$password_hash = sha1($password) ;
				$addUser = $db->prepare("INSERT INTO link2 (name , age , password , link) VALUES (:username , :age , :password_hash , :link )") ;
				$row = $addUser->execute(array(
					":username"=>$username,
					":age"=>$age,
					":password_hash"=>$password_hash,
					":link"=>$link
					));

				if($row)
				{
					session_start() ;
					$_SESSION['status']=1;
					$_SESSION['username'] = $username ;
					$_SESSION['age'] = $age ;
					$_SESSION['link'] = $link;
					return 1 ;
				}
				else
				{
					return 2 ;
				}
			}
		}
	}
?>