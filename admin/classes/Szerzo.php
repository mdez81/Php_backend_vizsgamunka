<?php
require_once '../config/Adatbazis.php';

class Szerzo {

    private $kapcs;
    private $tablaNev = "szerzok";
    public $szerzo_nev;

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function ujSzerzoHozzaadasa($szerzo_nev) {
        $query = "INSERT INTO " . $this->tablaNev . "  (szerzo_neve) VALUES(?)";
        $stmt = $this->kapcs->prepare($query);
        $stmt->bind_param("s", $szerzo_nev);

        if ($stmt->execute()) {
            return true;
        }


        $stmt->close();
        $this->kapcs->close();

        return false;
    }

    public function osszesSzerzo() {
        $sql = "Select id, szerzo_neve FROM szerzok";

        $result = $this->kapcs->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>  
                <tbody>
                    <tr>
                        <td>
                            <a href="szerzo_modositasa.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="../model/szerzo_torlese.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this author?');" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i></a>
                        </td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['szerzo_neve']; ?></td>
                    </tr>
                </tbody>
                <?php
            }
        }
    }

    public function osszesSzerzoLista() {
        $sql_2 = "SELECT id, szerzo_neve FROM szerzok";

        $result_2 = $this->kapcs->query($sql_2);
        if ($result_2->num_rows > 0) {
            while ($row = $result_2->fetch_assoc()) {
                echo '<option value="' . $row['id'] . '">' . $row['szerzo_neve'] . '</option>';
            }
            $this->kapcs->close();
        }
    }

    public function osszesSzerzoId($id) {
        $stmt = $this->kapcs->prepare("SELECT szerzo_neve FROM szerzok WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateData($id, $name) {
        $stmt = $this->kapcs->prepare("UPDATE szerzok SET szerzo_neve = ? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }

    public function deleteAuthor($id) {
        $stmt = $this->kapcs->prepare("DELETE FROM szerzok WHERE id = ?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function kapcsBontasa() {
        return $this->kapcs->close();
    }
}
?>
