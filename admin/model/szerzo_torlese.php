<?php

if (isset($_GET['id'])) {
    $author_id = (int)$_GET['id'];

    //$db = new DatabaseHandler('localhost', 'your_username', 'your_password', 'your_database');
    require '../classes/Szerzo.php';
    $szerzok = new Szerzo();
    
    if ($szerzok->deleteAuthor($author_id)) {
        //echo "Author deleted successfully.";
        header("Location:../view/szerzok.php");
    } else {
        //echo "Error deleting author: " . $db->conn->error;
    }

    $szerzok->kapcsBontasa();
} else {
    echo "Invalid request.";
}

