<?php



require_once('./../src/config.php');

session_start();


use Steampixel\Route;

Route::add('/', function(){
    //zapisywanie obrazków
    global $twig;
    $postArray = Post::getPage();
    $twigData = array("postArray" => $postArray,
                        "pageTitle" =>"strona główna",);
                        if(isset($_SESSION['user'])){
                            $twigData['user'] = $_SESSION['user'];
                        }
    $twig->display("index.html.twig",$twigData);
});
Route::add('/upload', function(){
    //strona do wgrywania
    global $twig;
    $twigData = array("pageTitle" => "Wgraj mema");
    $twig->display("upload.html.twig",$twigData);
});
Route::add('/upload',function(){
    global $twig;
    if(isset($_POST['submit']))  {
        Post::upload($_FILES['uploadedFile']['tmp_name'],$_POST["MemeTitle"] );
    };
    //TODO: zmienić na ścieżkę względną
    header("Location: http://localhost/ProjektJakisTam/pub");
},'post');


Route::add('/register', function(){
    //strona do wgrywania
    global $twig;
    $twigData = array("pageTitle" => "Regiter");
    $twig->display("register.html.twig",$twigData);
});

Route::add('/register',function(){

    global $twig;
    if(isset($_POST['submit'])){

        User::register($_POST['email'], $_POST['password']);
        header("Location: http://localhost/ProjektJakisTam/pub");
    }
},'post');

Route::add('/login',function(){


    global $twig;
    $twigData = array("pageTitle" => "Regiter");
    $twig->display("login.html.twig",$twigData);
});
Route::add('/login',function(){

    global $twig;
    if(isset($_POST['submit'])){

        User::register($_POST['email'], $_POST['password']);
        header("Location: http://localhost/ProjektJakisTam/pub");
    }
},'post');

Route::run('/ProjektJakisTam/pub')
?>