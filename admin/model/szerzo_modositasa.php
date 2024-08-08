<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $szNev = filter_var($_POST['szNev'], FILTER_SANITIZE_SPECIAL_CHARS) ;

    require '../classes/Szerzo.php';
    $szerzo = new Szerzo();
    $id = (int)$_GET['id'];
    $result = $szerzo->updateData($id, $szNev);

    if ($result) {
        header("Location:../view/szerzok.php");
    } else {
        //echo "Error updating record: " . $db->conn->error;
    }
    $szerzo->kapcsBontasa();
}
