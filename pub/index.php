<?php


require_once("./../src/config.php");
use Steampixel\Route;

Route::add("/",function(){
//wyswietlanie
global $twig;
$twig->display("index.html.twig");

});
Route::add("/upload",function(){
//strona z formularzem

global $twig;
$twig->display("upload.html.twig");

});

Route::run('ProjektJakisTam/pub/');
?>
