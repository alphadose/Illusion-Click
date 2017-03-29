<?php
require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/login" => "Controllers\\LoginController",
	"/signup" =>"Controllers\\SignUpController",
	"/game_start" =>"Controllers\\GameStartController",
	"/rulebook"=>"Controllers\\RulebookController",
	"/leaderboard"=>"Controllers\\LeaderboardController"
	));
?>