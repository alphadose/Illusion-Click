<?php

	namespace Controllers ;
	use Models\SignUp ;

	class SignUpController
	{
		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function post()
		{
			if($_POST['username']=="" || $_POST['age']==0 || $_POST['password']=="" || $_POST['link']=="")
			{
				
				echo $this->twig->render("register.html",array(
							"title"=>"Register",
							"error"=>"Please fill in all the details..."
							)) ;
			}
			else
			{
				$username = $_POST['username'] ;
				$password = $_POST['password'] ;
				$age = $_POST['age'] ;
				$link = $_POST['link'] ;
				
				
					$result = SignUp::checkAndAddUser($username, $password, $age, $link) ;
					if($result == 0)
					{
						echo $this->twig->render("register.html",array(
							"title"=>"Register",
							"error"=>"Username already exists..."
							)) ;
					}
					else if($result == 2)
					{
						echo $this->twig->render("register.html",array(
							"title"=>"Register",
							"error"=>"Could not complete signup. Please try again later..."
							)) ;
					}
					else if($result == 1)
					{
						header('Location: /posts') ;
					}
				
			}
		}
	}
?>