<?php
require_once __DIR__ . "/../vendor/autoload.php";

$dbopts = parse_url(getenv('postgres://sgezvcaczjgwzh:1d13c3a1e865659ae27350b037946b74ca617bc46dbfb75b2b0ae0c98830a89f@ec2-54-235-248-197.compute-1.amazonaws.com:5432/d5aouostsepgig'));
$app->register(new Herrera\Pdo\PdoServiceProvider(),
               array(
                   'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
                   'pdo.username' => $dbopts["user"],
                   'pdo.password' => $dbopts["pass"]
               )
);

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/login" => "Controllers\\LoginController",
	"/signup" =>"Controllers\\SignUpController",
	"/game_start" =>"Controllers\\GameStartController",
	"/rulebook"=>"Controllers\\RulebookController",
	"/leaderboard"=>"Controllers\\LeaderboardController"
	));
?>