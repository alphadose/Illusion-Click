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
			return new \PDO("pgsql:dbname=".$db_connect['db_name'].";host=".$db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}

		public static function checkUser($username , $score)
		{
			
			$db = self::getDB() ;
			
			$checkUser = $db->prepare("SELECT name FROM data WHERE name = :username") ;
			$checkUser->execute(array(
				"username"=>$username
				)) ;
			$row = $checkUser->fetch(\PDO::FETCH_ASSOC);
			if($row)
			{
				return 0 ;
			}
			else
				return 1;
        }
		public static function addUser($username,$score)
		{
			
				$db = self::getDB() ;
				$addUser = $db->prepare("INSERT INTO data (name , score) VALUES (:username , :score )") ;
				$row = $addUser->execute(array(
					":username"=>$username,
					":score"=>$score
					));

				
					session_start() ;
					$_SESSION['status']=1;
					$_SESSION['username'] = $username ;
					$_SESSION['score']=$score;
					return 1 ;
				
				
			
		}
		public static function updateUser($username,$score)
		{
			    
				$db = self::getDB() ;

				$prev_score = $db->prepare("SELECT * FROM data WHERE name = :username") ;
                $prev_score->execute() ;
                $prev_score->setFetchMode(\PDO::FETCH_ASSOC);
                $score2=0;
                $row=0;
                while($row=$prev_score->fetch())
                {
                	$score2=$row['score'];
             }

               if($score>$score2)
                {
				$updateUser = $db->prepare("UPDATE data SET score=:score WHERE name=:username") ;
				$row = $updateUser->execute(array(
					":username"=>$username,
					":score"=>$score
					));

				if($row)
				{
					session_start() ;
					$_SESSION['status']=1;
					$_SESSION['username'] = $username ;
					$_SESSION['score']=$score;
					
				}
				}
			return 1 ;
		}
		
	}
?>