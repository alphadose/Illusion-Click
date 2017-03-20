<?php

	namespace Controllers ;
	use Models\Login ;

	class LoginController
	{
		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		

		public function post()
		{
			session_start() ;

			if(isset($_SESSION['status']) && $_SESSION['status']==1)
			{
				header('Location: /posts') ;
			}
			else
			{
				if(!isset($_POST['username']) || !isset($_POST['password']))
				{
					$this->twig->render("login.html", array(
						"title"=>"Login",
						"error" => "Please fill up all fields"
						)) ;
				}
				else
				{
					$username=$_POST['username'] ;
					$_SESSION['username']=$username;
					$password=$_POST['password'] ;
					$error="" ;
					$result=Login::authenticate($username,$password) ;
					if($result==0)
					{
						header('Location: /posts') ;
					}
					else if($result==1)
					{
						$error = "Invalid username.." ;
					}
					else if($result==2)
					{
						$error = "Incorrect password.." ;
					}
					if($error!="")
					{
						echo $this->twig->render("login.html" , array(
							"title"=>"Login",
							"error"=>$error
							)) ;
					}
				}
			}
		}
	}
?>