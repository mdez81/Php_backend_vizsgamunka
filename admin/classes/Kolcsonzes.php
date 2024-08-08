<?php

require  '../config/Adatbazis.php';
class Kolcsonzes {
    
    private $kapcs;
    private $tablaNev = "kolcsonzes";
    
     public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }
    
    public function felHaszaloEllenorzes($f_id){
        $sql = "Select felhasznalo_id FROM felhasznalok WHERE felhasznalo_id = ".$fid;

        $result = $this->kapcs->query($sql);
        if ($result->num_rows === 1) {
            return true;
        }
        return false;
    }
    
    public function isbnEllenorzes($isbn){
        $sql = "Select isbn FROM konyvek WHERE isbn = ".$isbn;

        $result = $this->kapcs->query($sql);
        if ($result->num_rows === 1) {
            return true;
        }
        return false;
    }
    
    public function ujKolcsonzes($felh_id, $isbn){
        $query = "INSERT INTO " . $this->tablaNev . "  (felhasznalo_id, konyv_id) VALUES(?,?)";
        $stmt = $this->kapcs->prepare($query);
        $stmt->bind_param("ii", $felh_id, $isbn);

        if ($stmt->execute()) {
            return true;
        }


        $stmt->close();
        $this->kapcs->close();

        return false;
    }
}
