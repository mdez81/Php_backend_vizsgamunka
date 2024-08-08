<?php

require '../classes/Kategoria.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategoria_uj = new Kategoria();

    if (empty($_POST['kategoria'])) {
        //header('Location:../view/ujSzerzo.php');
        $hibaUzenetKateg = " kategória neve nem lehet üres!";
    }
    else {
    $kategoria_nev = filter_var($_POST['kategoria'], FILTER_SANITIZE_SPECIAL_CHARS);
    $hozzad = $kategoria_uj->ujKategoriaHozzaadasa($kategoria_nev);
    if ($hozzad) {
        header('Location:../view/kategoria.php');
    }
    }
}

