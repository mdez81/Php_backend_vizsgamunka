<?php

if (isset($_GET['id'])) {
    $kategoria_id = (int)$_GET['id'];

    //$db = new DatabaseHandler('localhost', 'your_username', 'your_password', 'your_database');
    require '../classes/Kategoria.php';
    $kategoriak = new Kategoria();
    
    if ($kategoriak->kategoriaTorlese($kategoria_id)) {
        //echo "Author deleted successfully.";
        header("Location:../view/kategoria.php");
    } else {
        //echo "Error deleting author: " . $db->conn->error;
    }

    $szerzok->kapcsBontasa();
} else {
    echo "Invalid request.";
}

