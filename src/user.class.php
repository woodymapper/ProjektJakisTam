<?php
class User {

 private $email;
private $id;

public function __construct($email, $id){

    $this->emial=$email;
    $this->id = $id;
}

//getek


public function getId( ): int{

    return $this->id;
}

public function getName( ): string{

    return $this->email;
}

public static function register(string $email, string $password) : bool{

global $db;
$query = $db->prepare("INSERT INTO user VALUES(NULL,?,?)");
// 420 kocham hash
$passwordHash = password_hash($password, PASSWORD_ARGON2I);
$query->bind_param('ss',$email,$passwordHash);
return $query->execute();
}

public static function login(string $email, string $password){

    global $db;

    $query = $db->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");
    $query -> bind_param('s',$email);
    $query -> execute();
    $result = $query-> get_result();
    $row = $result->fetch_assoc();
    $passwordHash = $row['password'];
    if(password_verify($password, $passwordHash)){
                        //hasłą git gud
            $u = new User($row["id"],$email);
            $_SESSION['user'] = $u;

    }

} 






}


?>