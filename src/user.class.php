<?php
class User {

 private $email;
 private $password;

public static function register(string $email, string $password) : bool{

global $db;
$query = $db->prepare("INSERT INTO user VALUES(NULL,?,?)");
// 420 kocham hash
$passwordHash = password_hash($password, PASSWORD_ARGON2I);
$query->bind_param('ss',$email,$passwordHash);
return $query->execute();
}

}


?>