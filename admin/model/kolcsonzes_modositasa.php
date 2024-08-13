<?php

if (isset($_POST['visszavetel'])) {

    $birsag = filter_var($_POST['birsag'], FILTER_VALIDATE_INT);
    $konyv_id = $_POST['konyv_id'];

    require '../classes/Kolcsonzes.php';
    $kolcsonzes = new Kolcsonzes();
    $id = (int) $_GET['id'];

    $result = $kolcsonzes->kolcsonzesModositasa($id, $birsag, $konyv_id);

    if ($result) {
        header("Location:../view/kolcsonzesek.php");
    } else {

        //echo "Error updating record: " . $db->conn->error;
    }
    //$konyvek->kapcsolatBont();
    //$szerzo->kapcsBontasa();
}


