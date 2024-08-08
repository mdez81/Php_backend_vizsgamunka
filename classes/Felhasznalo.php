<?php

require '../config/Adatbazis.php';

class Felhasznalo {

    private $kapcs;

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function register( $fnev, $nev, $email, $telefonszam, $jelszo) {
        try {
            $fnev = filter_var($_POST['fnev'], FILTER_SANITIZE_SPECIAL_CHARS);
            $nev = filter_var($_POST['nev'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $telefonsz = $_POST['telefon'];
            $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
            $max_id = $this->utolsoId();
            $utolso_id = $max_id +=1;
// Sanitize input
//$uname = $this->kapcs->real_escape_string($uname);
//$new_password = $this->kapcs->real_escape_string($new_password);
            $sql = "INSERT INTO felhasznalok(felhasznalo_id, nev,felhasznalonev,email_cim, telefonszam, jelszo) VALUES('$utolso_id', '$fnev', '$nev', '$email', '$telefonsz', '$jelszo')";
            if ($this->kapcs->query($sql)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function login($uname, $upass) {
        try {

            $sql = "SELECT * FROM felhasznalok WHERE email_cim ='$uname' LIMIT 1";
            $eredm = $this->kapcs->query($sql);

            if ($eredm->num_rows > 0) {
                $sor = $eredm->fetch_assoc();
                if (password_verify($upass, $sor['jelszo'])) {
                    $_SESSION['f_id'] = $sor['id'];
                    $_SESSION['f_fnev'] = $sor['felhasznalonev'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function utolsoId() {
        $sql = "SELECT MAX(felhasznalo_id) AS max_id FROM felhasznalok";
        $eredm = $this->kapcs->query($sql);

        if ($eredm->num_rows > 0) {
            $sor = $eredm->fetch_assoc();
            return $utolso_id = $sor['max_id'];
        } else {
           return  $utolso_id = 100;
        }
    }

    public function abKapcsBezar() {
        return $this->kapcs->close();
    }

    /* public function kilepes() {
      session_start();
      unset($_SESSION['f_id']);
      unset($_SESSION['hiba']);
      header('Location:index.php');
      } */
}
