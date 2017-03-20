<?php

	namespace Controllers ;
	use Models\Posts ;

	class PostDisplayController
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
			if(isset($_SESSION['status']) && $_SESSION['status']=="1")
			{
				$username = $_SESSION['username'] ;
				$all_posts = "";
				$all_posts = Posts::displayAllPosts($username) ;
				
				echo $this->twig->render("links.html", array(
					"user" => $username,
					"title" => "Your link",
					"link"=>$all_posts)) ;
			}
			else
			{
				echo $this->twig->render("login.html" , array(
					"error" => "Please login to Continue" ,
					"title" => "Login"
					)) ;
			}
		}
	}

?>
