<?php

	namespace Controllers ;
	use Models\Posts ;

	class GameStartController
	{
		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem( __DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function get()
		{
			session_start() ;

			if(isset($_SESSION['status']))
			{
				$username = $_SESSION['username'] ;
				
				echo $this->twig->render("icgame.php", array("title"=>"Game Start !!","name"=>$username
						)) ;
			}
				
			
			else
			{
				echo $this->twig->render("Homepage.html" , array(
					"error" => "Please login to Continue" ,
					"title" => "Homepage"
					)) ;
			}
		}
	}

?>
