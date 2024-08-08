<?php

require '../classes/Szerzo.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $szerzo_uj = new Szerzo();

    if (empty($_POST['uszerzo'])) {
        //header('Location:../view/ujSzerzo.php');
        $hibaUzenetUSzerzo = " szerzo neve nem lehet üres!";
    } else {

        $szerzo_nev = filter_var($_POST['uszerzo'], FILTER_SANITIZE_SPECIAL_CHARS);
        $hozzad = $szerzo_uj->ujSzerzoHozzaadasa($szerzo_nev);
        if ($hozzad) {
            header('Location:../view/szerzok.php');
        } else {
            $_SESSION['hiba'] = "adatbázis beírási hiba!";
        }
    }
}

