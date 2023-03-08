<?php


require_once("./../src/config.php");
use Steampixel\Route;

Route::add('/',function(){
//wyswietlanie
global $twig;
$twig->display('index.html.twig');

});
Route::add('/upload',function(){
//strona z formularzem

global $twig;
$twig->display("upload.html.twig");

});
Route::add('/upload', function(){
    require('./../src/config.php');
    if(isset($_POST['submit'])) 
        Post::upload($_FILES['uploadedFile']['tmp_name']);

        $twig->display("index.html.twig");


}, 'post');

Route::run('ProjektJakisTam/pub/');
?>
