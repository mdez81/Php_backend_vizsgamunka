<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kaNev = filter_var($_POST['uszerzo'], FILTER_SANITIZE_SPECIAL_CHARS) ;

    require '../classes/Kategoria.php';
    $kategoriak = new Kategoria();
    $id = (int)$_GET['id'];
    $result = $kategoriak->kategoriaModositasa($id, $kaNev);

    if ($result) {
        header("Location:../view/kategoria.php");
    } else {
        //echo "Error updating record: " . $db->conn->error;
    }
    $kategoriak->kapcsBontasa();
}