<?php

	namespace Controllers ;

	class LogoutController
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
			session_unset();
			session_destroy();
			header('Location: /');
		}

	}
?>