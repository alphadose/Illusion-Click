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
			session_start();
			session_unset();
			session_destroy();
			session_start();
			echo $this->twig->render("Homepage.html", array(
					"title" => "Homepage")) ;
			
		}
		public function post()
		{
			session_start();
			session_unset();
			session_destroy();
			session_start();
			echo $this->twig->render("Homepage.html", array(
					"title" => "Homepage")) ;
			
		}
	}
?>