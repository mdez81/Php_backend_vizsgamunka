<?php
require '../../config/Adatbazis.php';
class Rendszerfelhasznalo {

    private $kapcs;

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function register($uname, $upass) {
        try {
            $uname = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            // Sanitize input
            //$uname = $this->kapcs->real_escape_string($uname);
            //$new_password = $this->kapcs->real_escape_string($new_password);
            $sql = "INSERT INTO rendszer_felhasznalok(email_cim, password) VALUES('$uname', '$new_password')";
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
           
            $sql = "SELECT * FROM rendszer_felhasznalok WHERE email_cim ='$uname' LIMIT 1";
            $eredm = $this->kapcs->query($sql);

            if ($eredm->num_rows > 0) {
                $sor = $eredm->fetch_assoc();
                if (password_verify($upass, $sor['jelszo'])) {
                    $_SESSION['user_session'] = $sor['id'];
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

    public function is_loggedin() {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
        return false;
    }

    /*public function redirect($url) {
        header("Location: $url");
    }*/

    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}
