<?php
require_once __DIR__ . "/../vendor/autoload.php";
Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/login" => "Controllers\\LoginController",
	"/signup" =>"Controllers\\SignUpController",
	"/posts" =>"Controllers\\PostDisplayController",
	"/logout"=>"Controllers\\LogoutController",
	"/switch"=>"Controllers\\SwitchController"
	));
?>