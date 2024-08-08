<?php
require '../config/Adatbazis.php';

/* ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); */

class Konyv {

    private $kapcs;
    private $tablaNev = "konyvek";

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function ujKonyvHozzaadasa($cim, $katalogus_id, $szerzo_id, $isbn, $fenykep) {
        $query = "INSERT INTO " . $this->tablaNev . " (cim, katalogus_id, szerzo_id, isbn, fenykep) VALUES(?,?,?,?,?)";
        $stmt = $this->kapcs->prepare($query);

        /* $this->title = htmlspecialchars(strip_tags($this->title));
          $this->author_id = htmlspecialchars(strip_tags($this->author_id));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
          $this->isbn = htmlspecialchars(strip_tags($this->isbn));
          $this->total_copies = htmlspecialchars(strip_tags($this->total_copies));
          $this->available_copies = htmlspecialchars(strip_tags($this->available_copies)); */

        $stmt->bind_param("siiss", $cim, $katalogus_id, $szerzo_id, $isbn, $fenykep);

        if ($stmt->execute()) {
            return true;
        }

        $stmt->close();
        $this->kapcs->close();
        return false;
    }

    public function osszeskonyv_kategoriaval() {
        $sql = "Select konyvek.id, konyvek.cim, kategoria.kategoria_neve, szerzok.szerzo_neve, konyvek.isbn, konyvek.fenykep, konyvek.kolcsonozve_vane from konyvek join kategoria on kategoria.id= konyvek.katalogus_id join szerzok on szerzok.id = konyvek.szerzo_id";
        $result = $this->kapcs->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?> 
                <tbody>
                    <tr>
                        <td>
                            <a href="konyv_modositasa.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"  title="módosítás"><i class="fa fa-pencil"></i></a>
                            <a href="../model/konyv_torlese.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"  title="Törlés" onclick="return confirm('Biztosan törli ezt a könyvet?');"><i class="fa fa-trash-o"></i></a>  
                        </td>
                        <td><img src="../konyvek/<?php print($row['fenykep']); ?>" width="100"></td>
                        <td><?php echo $row['cim']; ?></td>
                        <td><?php echo $row['szerzo_neve']; ?></td>
                        <td><?php echo $row['kategoria_neve']; ?></td>
                        <td> <?php echo $row['isbn']; ?></td>
                    </tr>
                </tbody>
                <?php
            }
        }
        $this->kapcs->close();
    }

    public function osszesKonyvId($id) {
        $stmt = $this->kapcs->prepare("SELECT cim, katalogus_id, szerzo_id, isbn, fenykep FROM konyvek WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function konyvModositasa($id, $cim, $katalogus_id, $szerzo_id, $isbn) {
        $stmt = $this->kapcs->prepare("UPDATE ".$this->tablaNev." SET cim = ?, katalogus_id = ?, szerzo_id=?, isbn = ?  WHERE id = ?");
        $stmt->bind_param("siisi", $cim, $katalogus_id, $szerzo_id, $isbn, $id);
        return $stmt->execute();
        /*$sql ="UPDATE ".$this->tablaNev." SET cim = '$cim', katalogus_id = '$katalogus_id', szerzo_id= '$katalogus_id', isbn = '$isbn'  WHERE id = $id";
        
          if ($this->kapcs->query($sql) === TRUE) {
            return true;  // Update successful
        } else {
            echo "Error updating record: " . $this->kapcs->error;
            return false;
        }*/
    }

    public function konyvKepModositasa($id, $fenykep) {
        $stmt = $this->kapcs->prepare("UPDATE konyvek SET  fenykep=?  WHERE id=?");
        $stmt->bind_param("si", $fenykep, $id);
        return $stmt->execute();
    }

    public function konyvKepFeltoltes() {
        if (isset($_FILES['kep_m']['name']) && $_FILES['kep_m']['error'] === 0) {
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
    }

    public function konyvTorlese($id) {
        $stmt = $this->kapcs->prepare("DELETE FROM konyvek WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function kapcsolatBont() {
        return $this->kapcs->close();
    }
}
?>