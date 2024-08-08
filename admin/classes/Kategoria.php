<?php
require  '../config/Adatbazis.php';

class Kategoria {

    private $kapcs;
    private $tablaNev = "kategoria";
    public $kategoria_nev;

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function ujKategoriaHozzaadasa($kategoria_nev) {
        $query = "INSERT INTO " . $this->tablaNev . "  (kategoria_neve) VALUES(?)";
        $stmt = $this->kapcs->prepare($query);
        $stmt->bind_param("s", $kategoria_nev);

        if ($stmt->execute()) {
            return true;
        }


        $stmt->close();
        $this->kapcs->close();

        return false;
    }

    public function osszesKategoria() {
        $sql = "Select id, kategoria_neve FROM kategoria;
";
        $result = $this->kapcs->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>  
                <tbody>
                    <tr>
                        <td>
                            <a href="kategoria_modositasa.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="../model/kategoria_torlese.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this author?');" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i></a>
                        </td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['kategoria_neve'];?></td>
                    </tr>
                </tbody>
                <?php
            }
        }
        $this->kapcs->close();
    }

    public function osszesKategoriaLista() {
        $sql = "Select id, kategoria_neve FROM kategoria";

        $result = $this->kapcs->query($sql);
        if ($result->num_rows > 0) {
           
           
           
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['kategoria_neve'] . '</option>';
            }
            print('</select>');  
        }
        $this->kapcs->close();
    }
    
          public function osszesKategoriaId($id) {
        $stmt = $this->kapcs->prepare("SELECT kategoria_neve FROM kategoria WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
            return $result->fetch_assoc();
    }
    
        public function kategoriaModositasa( $id, $name) {
        $stmt = $this->kapcs->prepare("UPDATE kategoria SET kategoria_neve = ? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }
    
    
    public function kategoriaTorlese($id) {
        $stmt = $this->kapcs->prepare("DELETE FROM kategoria WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
    public function kapcsBontasa(){
        return $this->kapcs->close();
    }
}
?>
