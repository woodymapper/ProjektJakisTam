<?php
class Post {

    private int $id;
    private string $filename;
    private string $timestamp;


    public function __construct(int $i, string $f, string $t) {

$this->id = $i;
$this->filename = $f;
$this->timestamp = $t;

    }
    static function getLast() : Post {

global $db;
$query = $db->prepare("SELECT * FROM post ORDER BY TimeStamp DESC LIMIT 1");

$query->execute();

$result = $query->get_result();
$row = $result->fetch_assoc();
$p = new Post($row['id'],$row['FileName'],$row["timestamp"]);
return $p;
    }


    static function upload(string $tempFileName) {
        //funkcja działa bez tworzenia instancji obiektu
        // uwaga wywołanie metodą Post::upload()
        $uploadDir = "img/";
        //sprawdź czy mamy do czynienia z obrazem
        $imgInfo = getimagesize($tempFileName);
        //jeśli plik nie jest poprawnym obrazem
        if(!is_array($imgInfo)) {
            die("BŁĄD: Przekazany plik nie jest obrazem!");
        }
        //wygeneruj _możliwie_ losowy ciąg liczbowy
        $randomSeed = rand(10000,99999) . hrtime(true);
        //wygeneruj hash, który będzie nową nazwą pliku
        $hash = hash("sha256", $randomSeed);
        //wygeneruj kompletną nazwę pliku
        $targetFileName = $uploadDir . $hash . ".webp";
        //sprawdź czy plik przypadkiem już nie istnieje
        if(file_exists($targetFileName)) {
            die("BŁĄD: Podany plik już istnieje!");
        }
        //zaczytujemy cały obraz z folderu tymczasowego do stringa
        $imageString = file_get_contents($tempFileName);
        //generujemy obraz jako obiekt klasy GDImage
        //@ przed nazwa funkcji powoduje zignorowanie ostrzeżeń
        $gdImage = @imagecreatefromstring($imageString);
        //zapisz plik do docelowej lokalizacji
        imagewebp($gdImage, $targetFileName);
                //użyj globalnego połączenia
                global $db;
                //stwórz kwerendę
                $query = $db->prepare("INSERT INTO post VALUES(NULL, ?, ?)");
                //przygotuj znacznik czasu dla bazy danych
                $dbTimestamp = date("Y-m-d H:i:s");
                //zapisz dane do bazy
                $query->bind_param("ss", $dbTimestamp, $newFileName);
                if(!$query->execute())
                    die("Błąd zapisu do bazy danych");
        
    }
}

?>