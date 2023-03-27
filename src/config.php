<?php 
require_once('./../vendor/autoload.php');
$db = new mysqli("localhost","root","","bazacms");
require("post.class.php");
require("user.class.php");

//loader to taki pomocnik do ładowania szablonów
$loader = new Twig\Loader\FilesystemLoader('./../src/templates');
//inicjujemy twiga
$twig = new Twig\Environment($loader);

/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * I wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return woodymapper
 * ----------------------------------------------------------------------------
 */
?>
