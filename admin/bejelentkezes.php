<?php

if (isset($_POST['email']) && isset($_POST['password'])) {


    require ('./classes/Rendszerfelhasznalo.php');
    $renszerf = new Rendszerfelhasznalo();
    $felhasznaloNev = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';
    $jelszo = $_POST['password'];

    $belepve = $renszerf->login($felhasznaloNev, $jelszo);
    $_SESSION['uid'] = $belepve;
    header('Location:dashboard.php');
}
?>

