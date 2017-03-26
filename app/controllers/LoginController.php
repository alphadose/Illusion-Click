<?php

	namespace Controllers;
    use Models\SignUp ;
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
            $_SESSION['status']=1;
            $username=$_POST['username'];
            $score=0;
            $result = SignUp::checkUser($username, $score) ;
				if($_POST['username']=="" )
				{
					echo $this->twig->render("Homepage.html", array(
						"title"=>"Homepage",
						"error" => "Please fill your name"
						)) ;
				}
		             else
			         {
					$username=$_POST['username'] ;
					$_SESSION['username']=$username;
					header('Location: /game_start') ;
				}
		}
	}
?>