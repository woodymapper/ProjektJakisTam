<?php

class Post{

static function upload(string $tempFileName){

    $targetDir = "img/";
    $imginfo = @getimagesize($tempFileName);

if(!is_array($imginfo)){

die(" not img");

}

$randomNumber = rand(10000, 99999).hrtime(true);
$hash = hash("sha256", $randomNumber );
$newFileName = $targetDir . $hash . ".webp"
;
}


}






?>