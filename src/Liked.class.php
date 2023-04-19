<?php
class Liked {

    static function likeAdd($userID, $postID) {
        global $db;
        
        $query1 = $db->prepare("SELECT * FROM liked WHERE post_id = ? AND user_id = ?");
        $query1->bind_param('ii', $postID, $userID);
        $query1->execute();
        $result = $query1->get_result();
            // Ma się równać 0, gdyż jak się równa 1 to oznacza, że już użytkownik polubił to zdjęcie.
        if (mysqli_num_rows($result) == 0) { 
            // Dodaje polubienie do bazy danych
            $query2 = $db->prepare("UPDATE post SET likes = likes + 1 WHERE id = ?");
            $query2->bind_param('i', $postID);
            $query2->execute();
            
            // Dodaje fakt, że użytkownik dodał polubienie do bazy danych
            $query3 = $db->prepare("INSERT INTO liked (post_id, user_id) VALUES (?, ?)");
            $query3->bind_param('ii', $postID, $userID);
            $query3->execute();
        }
    }
    static function likeDelete($userID, $postID) {
        global $db;

        $query1 = $db->prepare("SELECT * FROM liked WHERE post_id = ? AND user_id = ?");
        $query1->bind_param('ii', $postID, $userID);
        $query1->execute();
        $result = $query1->get_result();
        if (mysqli_num_rows($result) == 1) { 
            $query2 = $db->prepare("UPDATE post SET likes = likes - 1 WHERE id = ?");
            $query2->bind_param('i', $postID);
            $query2->execute();

            $query3 = $db->prepare("DELETE FROM liked WHERE user_id = ? AND post_id = ?");
            $query3->bind_param('ii',$userID, $postID);
            $query3->execute();
        }

    }



    
   
    



}
?>