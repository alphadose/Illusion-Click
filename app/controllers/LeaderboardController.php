<?php

	namespace Controllers;
    use Models\Login;
    use Models\Posts;
	class LeaderboardController
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
			
				
				$all_posts = array() ;
				$all_posts = Posts::displayAllPosts() ;
				echo $this->twig->render("leaderboard.html" , array(
					"all_posts" => $all_posts,
			        "title" => "Leaderboard"
					)) ;
			
			
		}
	}
?>