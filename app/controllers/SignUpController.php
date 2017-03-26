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
        	session_start();
        	$_SESSION['score']=$_POST['score'];
        }
		public function get()
		{ 
			session_start();
			$score=$_SESSION['score'];
			$username = $_SESSION['username'] ;
			$result2=SignUp::checkUser($username,$score);
			if($result2 == 0)
             {
             	$result2=SignUp::updateUser($username,$score);
             }
			else
			 $result = SignUp::addUser($username, $score);
				
						header('Location: /leaderboard');
					
				
			
		}
	}
?>