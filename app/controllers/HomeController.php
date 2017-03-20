<?php

	namespace Controllers;

	class HomeController
	{

		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function get()
		{
			session_start() ;
			if(isset($_SESSION['status']) && $_SESSION['status']==1)
			{
				header('Location: /posts') ;
			}
			else
			{
				echo $this->twig->render("login.html", array(
					"title" => "Login")) ;
			}
		}
	}
?>