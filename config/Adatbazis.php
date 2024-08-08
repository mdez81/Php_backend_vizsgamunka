<?php

class Adatbazis {

    private $hoszt = "localhost";
    
    private $felhasznalo = "root";
    private $jelszo = "";
    private $ab = "konyvtar_app";
    public $kapcs;

    public function ABKapcsoat() {
        $this->kapcs = new mysqli($this->hoszt, $this->felhasznalo, $this->jelszo, $this->ab);
        if ($this->kapcs->connect_error) {
            die("Adatbázis csatlakozási hiba: " . $this->conn->connect_error);
        }
        return $this->kapcs;
    }
}
