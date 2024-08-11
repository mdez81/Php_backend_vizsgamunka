<?php

require '../classes/Kolcsonzes.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kolcsonzes = new Kolcsonzes();

    if (empty($_POST['felh_id'])) {
        //header('Location:../view/ujSzerzo.php');
        $hibaUzenetFId = " a felhasználó azonosító neve nem lehet üres!";
    }
    if (empty($_POST['isbn_be'])) {
        //header('Location:../view/ujSzerzo.php');
        $hibaUzenetIsbnBe = " az Isbn nem lehet üres!";
    } else {
        $felh_id = filter_var((int) $_POST['felh_id'], FILTER_SANITIZE_SPECIAL_CHARS);
        $isbn = filter_var($_POST['isbn_be'], FILTER_SANITIZE_SPECIAL_CHARS);

        if ($kolcsonzes->felHaszaloEllenorzes($felh_id) === true && $kolcsonzes->isbnEllenorzes($isbn) === true) {
            
            
            //$f_id = $kolcsonzes->getFelhasznaloId();
            //$konyv_id = $kolcsonzes->getKonyvId();
            
            $kolcsonzes->ujKolcsonzes($felh_id, $isbn);
            header('Location:../view/kolcsonzesek.php');
        } else {
            $_SESSION['hiba'] = "Nem létező felhasználó azonosító és vagy id!";
        }
    }
}

