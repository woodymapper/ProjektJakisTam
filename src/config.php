<?php 
require_once('./../vendor/autoload.php');
$db = new mysqli("localhost","root","","bazacms");
require("post.class.php");

//loader to taki pomocnik do ładowania szablonów
$loader = new Twig\Loader\FilesystemLoader('./../src/templates');
//inicjujemy twiga
$twig = new Twig\Environment($loader);


?>