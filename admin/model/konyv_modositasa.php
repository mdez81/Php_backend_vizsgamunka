<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cim = filter_var($_POST['cim'], FILTER_SANITIZE_SPECIAL_CHARS);
    $katalogus_id = $_POST['kategoriaLista'];
    $szerzo_id =  $_POST['szerzoLista'];
    $isbn = filter_var($_POST['isbn'], FILTER_SANITIZE_SPECIAL_CHARS);
    //$fenykep = filter_var($_FILES['kep']['name'], FILTER_SANITIZE_SPECIAL_CHARS);

    require '../classes/Konyv.php';
    $konyvek = new Konyv();
    $id =  (int)$_GET['id'];
    
    
     
    
    //$fenykep = filter_var($_FILES['kep']['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    $result = $konyvek->konyvModositasa($id, $cim, $katalogus_id, $szerzo_id, $isbn);
    
    if ($result) {
        
        header("Location:../view/konyvek.php");
        
    } else {
        error_log($mysqli->error, 3, './error.log');
        //echo "Error updating record: " . $db->conn->error;
    }
    //$konyvek->kapcsolatBont();
    //$szerzo->kapcsBontasa();
}