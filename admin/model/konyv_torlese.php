<?php

if (isset($_GET['id'])) {
    $konyv_id = (int)$_GET['id'];

    require '../classes/Konyv.php';
    $konyvek = new Konyv();
    
    if ($konyvek->konyvTorlese($konyv_id)) {
        //echo "Author deleted successfully.";
        header("Location:../view/konyvek.php");
    } else {
        //echo "Error deleting author: " . $db->conn->error;
    }

    $szerzok->kapcsBontasa();
} else {
    echo "Invalid request.";
}

