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
    
    public function osszesSzerzoLista() {
        $sql = "SELECT id, szerzo_neve FROM szerzok";

        $result = $this->kapcs->query($sql);
        if ($result->num_rows > 0) {
             echo '<select id = "kategoriaLista" name = "kategoriaLista" class = "form-control">
            <option>Válasszon kategóriát</option>';
            while ($row2 = $result->fetch_assoc()) {
                echo '<option value="' . $row2['id'] . '">' . $row2['szerzo_neve'] . '</option>';               
            }
             print('</select>');  
           
        $this->kapcs->close();
    }
    }
    
       public function osszesKategoriaLista() {
        $sql = "Select id, kategoria_neve FROM kategoria";

        $result = $this->kapcs->query($sql);
        if ($result->num_rows > 0) {
           
            print('<select id = "kategoriaLista" name = "kategoriaLista" class = "form-control">
            <option>Válasszon kategóriát</option>');
           
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['kategoria_neve'] . '</option>';
            }
            print('</select>');  
        }
        $this->kapcs->close();
    }
    
    
    
}
