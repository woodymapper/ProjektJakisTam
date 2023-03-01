<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="uploadedFileInput">
<input type="file" name="uploadedFile" id="uploadedFileInput"><br/>
<input type="submit" value="Wyślij Plik" name="submit">
</form>
<?php
if(isset($_POST['submit'])){


    //echo"<pre>";
    //var_dump($_FILES);

$targetDir = "img/";
$sourceFileName =  $_FILES['uploadedFile']['name'];

$sourceFileExtension = pathinfo($sourceFileName, PATHINFO_EXTENSION);

$sourceFileExtension = strtolower($sourceFileExtension);

//hasz komora 420

//$newFileName = hash("sha256",$sourceFileName). hrtime(true) . "." . $sourceFileExtension;
$hash = hash("sha256", $sourceFileName . hrtime(true) );
$newFileName = $hash . ".webp";

$targetURL = $targetDir . $newFileName;


$tempURL = $_FILES['uploadedFile']['tmp_name'];


$imginfo = getimagesize($tempURL);

if(!is_array($imginfo)){

die(" not img");

}





<<<<<<< HEAD
$db = new mysqli('localhost', 'root', '', 'bazacms');
=======
$db = new mysqli('localhost', 'root', '', 'BazaCMS');
>>>>>>> c4d1263fd12b8c3f011e5a6615c391137a8eabf3
$query = $db->prepare("INSERT INTO post VALUES(NULL, ?, ?)");
$dbTimestamp = date("Y-m-d H:i:s");
$query->bind_param("ss", $dbTimestamp, $hash);
if(!$query->execute())
    die("Błąd zapisu do bazy danych");


if(file_exists($targetURL)){


    die(" jest plik");



}

move_uploaded_file($tempURL , $targetURL);
}

?>


</body>
</html>
