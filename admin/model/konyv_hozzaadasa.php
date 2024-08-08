<?php

require ('../classes/Konyv.php');

/* if (isset($_FILES['kep']['name']) && $_FILES['kep']['error'] === 0) {
  if (!file_exists('../konyvek')) {
  mkdir('konyvek');
  }
  if (exif_imagetype($_FILES['kep']['tmp_name']) !== false) {
  $sikeres = copy($_FILES['kep']['tmp_name'], '.' . DIRECTORY_SEPARATOR . '../konyvek' . DIRECTORY_SEPARATOR . $_FILES['kep']['name']);
  if ($sikeres) {
  header("Location:../view/ujKonyv.php");
  }
  }
  } */


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*if (empty($_POST['cim'])) {
        $hibaUzenetKcim = "könyv cím  nem lehet üres!";
    }
    if (empty($_POST['kategoriaLista'])) {
        $hibaUzenetKategoria = "Válasszon kategóriát!";
    }
    if (empty($_POST['szerzoLista'])) {
        $hibaUzenetSzerzo = "Válasszon szerzőt!";
    }
    if (empty($_POST['isbn'])) {
        $hibaUzenetIsbn = "isbn nem lehet üres!";
    }
    if (empty($_FILES['kep']['name'])) {
        $hibaUzenetKep = "Válasszon ki képet!";*/
    //} else {

        $cim = filter_var($_POST['cim'], FILTER_SANITIZE_SPECIAL_CHARS);
        $katalogus_id = $_POST['kategoriaLista'];
        $szerzo_id = $_POST['szerzoLista'];
        $isbn = filter_var($_POST['isbn'], FILTER_SANITIZE_SPECIAL_CHARS);
        $fenykep = filter_var($_FILES['kep']['name'], FILTER_SANITIZE_SPECIAL_CHARS);

        $konyvek = new Konyv();
        $ujkonyvFelvitel = $konyvek->ujKonyvHozzaadasa($cim, $katalogus_id, $szerzo_id, $isbn, $fenykep);
        $konyvek->kapcsolatBont();

        if ($ujkonyvFelvitel) {
            header("Location: ../view/konyvek.php");
        }


        if (isset($_FILES['kep']['name']) && $_FILES['kep']['error'] === 0) {
            if (!file_exists('../konyvek')) {
                mkdir('konyvek');
            }
            if (exif_imagetype($_FILES['kep']['tmp_name']) !== false) {
                copy($_FILES['kep']['tmp_name'], '.' . DIRECTORY_SEPARATOR . '../konyvek' . DIRECTORY_SEPARATOR . $_FILES['kep']['name']);
                 if (!$sikeres) {
                  $_SESSION['hiba'] = "Érvénytelen kép formátumú fájl!!";
                  } 
            }
        }
    //}
} else {
    $_SESSION['hiba'] = "köny felviteli adatbázis hiba!";
}
    
    
    




   