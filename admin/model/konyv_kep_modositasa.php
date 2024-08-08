<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    //header("Location:../view/konyvek.php");
    //$fenykep = filter_var($_FILES['kep_m']['name'], FILTER_SANITIZE_SPECIAL_CHARS);


    if (isset($_FILES['kep_m']['name']) && $_FILES['kep_m']['error'] === 0) {
        
        $fenykep = filter_var($_FILES['kep_m']['name'], FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (!file_exists('../konyvek')) {
            mkdir('konyvek');
        }
        if (exif_imagetype($_FILES['kep_m']['tmp_name']) !== false) {
            copy($_FILES['kep_m']['tmp_name'], '.' . DIRECTORY_SEPARATOR . '../konyvek' . DIRECTORY_SEPARATOR . $_FILES['kep_m']['name']);
            /* if (!$sikeres) {
              $_SESSION['hiba'] = "Érvénytelen kép formátumú fájl!!";
              } */
        }
    }


    $fenykep = filter_var($_FILES['kep_m']['name'], FILTER_SANITIZE_SPECIAL_CHARS);

    require '../classes/Konyv.php';
    $konyvek = new Konyv();
    $id = (int) $_GET['id'];

    $result = $konyvek->konyvKepModositasa($id, $fenykep);

    if ($result) {
        header("Location:../view/konyvek.php");
    }
}
