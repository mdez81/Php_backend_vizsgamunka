<?php

require '../config/Adatbazis.php';

class Kolcsonzes {

    private $kapcs;
    private $tablaNev = "kolcsonzes";

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function felHaszaloEllenorzes($fid) {
        $sql = "Select felhasznalo_id FROM felhasznalok WHERE felhasznalo_id = " . $fid;

        $result = $this->kapcs->query($sql);
        if ($result->num_rows === 1) {
            return true;
        }
        return false;
    }

    public function isbnEllenorzes($isbn_2) {
        $sql = "Select id FROM konyvek WHERE isbn = " . $isbn_2;

        $result = $this->kapcs->query($sql);
        if ($result->num_rows === 1) {
            return true;
        }
        return false;
    }

    /* public function getFelhasznaloId(){
      $sql ="SELECT id FROM felhasznalok WHERE felhasznalo_id =?";
      $stmt = $this->kapcs->prepare($sql);
      $stmt->bind_param("i", $f_id);
      $stmt->execute();
      $stmt->bind_result($felh_id);
      $stmt->fetch();
      $stmt->close();
      //return $felh_id_ab;


      if (!$felh_id_ab) {
      echo "Student not found.";
      return false;
      }
      }

      public function getKonyvId(){
      $sql ="SELECT id FROM konyvek WHERE isbn =?";
      $stmt = $this->kapcs->prepare($sql);
      $stmt->bind_param("i", $ko_id);
      $stmt->execute();
      $stmt->bind_result($konyv_id);
      $stmt->fetch();
      $stmt->close();
      //return $konyv_id_ab;
      if (!$konyv_id_ab) {
      echo "Student not found.";
      return false;
      }
      } */

    public function ujKolcsonzes($felh_id, $konyv_id) {

        $sql_felh = "SELECT id FROM felhasznalok WHERE felhasznalo_id =?";
        $stmt = $this->kapcs->prepare($sql_felh);
        $stmt->bind_param("i", $felh_id);
        $stmt->execute();
        $stmt->bind_result($felh_id_ab);
        $stmt->fetch();
        $stmt->close();

        if (!$felh_id_ab) {
            echo "Student not found.";
            return false;
        }


        $sql = "SELECT id FROM konyvek WHERE isbn =?";
        $stmt_2 = $this->kapcs->prepare($sql);
        $stmt_2->bind_param("i", $konyv_id);
        $stmt_2->execute();
        $stmt_2->bind_result($konyv_id_ab);
        $stmt_2->fetch();
        $stmt_2->close();
        //return $konyv_id_ab;
        if (!$konyv_id_ab) {
            echo "Student not found.";
            return false;
        }


        $query_kolcs = "INSERT INTO " . $this->tablaNev . "  (felhasznalo_id, konyv_id) VALUES(?,?)";

        $stmt = $this->kapcs->prepare($query_kolcs);
        $stmt->bind_param("ii", $felh_id_ab, $konyv_id_ab);
        //$this->kapcs->close();
        
        if ($stmt->execute()) {

            $query_kolcs_2 = "UPDATE konyvek SET kolcsonozve_vane = 1 WHERE id = ?";
            $stmt_2 = $this->kapcs->prepare($query_kolcs_2);
            $stmt_2->bind_param("i", $konyv_id_ab);

            if ($stmt_2->execute()) {
                $stmt_2->close();
                return true;
            } else {
               
                $stmt_2->close();
                 return false;
            }


            
            

            
            $stmt->close();
            return false;
            
        }

        /**/
    }
}
