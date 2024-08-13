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
    }
    
    public function osszesKolcsonzesId($id) {
        $stmt = $this->kapcs->prepare("SELECT id, konyv_id, felhasznalo_id, kolcsonzes_datuma, visszavetel_datuma, visszahozva_vane, birsag FROM kolcsonzes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function osszeskolcsonzes_felhasznaloval() {
        $sql = "SELECT felhasznalok.nev, konyvek.cim, konyvek.isbn, kolcsonzes.kolcsonzes_datuma, kolcsonzes.visszavetel_datuma, kolcsonzes.id AS kol_id from kolcsonzes JOIN felhasznalok ON felhasznalok.id = kolcsonzes.felhasznalo_id JOIN konyvek ON konyvek.id = kolcsonzes.konyv_id ORDER BY kolcsonzes.id DESC";
        $result = $this->kapcs->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?> 
                <tbody>
                    <tr>
                        <td>
                            <a href="kolcsonzes_reszletei.php?id=<?php echo $row['kol_id']; ?>" class="btn btn-primary btn-sm"  title="módosítás"><i class="fa fa-pencil"></i></a>

                        </td>
                        <td><?php echo $row['nev']; ?></td>
                        <td><?php echo $row['cim']; ?></td>
                        <td><?php echo $row['isbn']; ?></td>
                        <td><?php echo $row['kolcsonzes_datuma']; ?></td>
                        <td> <?php if ($row['visszavetel_datuma'] === NULL) {
                            echo "not returned yet";
                            } else {
                                echo $row['visszavetel_datuma'];
                            }
                            ?></td>
                    </tr>
                </tbody>
                <?php
            }
        }
        $this->kapcs->close();
    }
    
    
    public function osszeskolcsonzes_felhasznalo_osszes_adat($kolcs_id) {
        $sql = "SELECT felhasznalok.felhasznalo_id, felhasznalok.nev, felhasznalok.email_cim, felhasznalok.telefonszam, konyvek.cim, konyvek.isbn, kolcsonzes.kolcsonzes_datuma, kolcsonzes.visszavetel_datuma, kolcsonzes.id AS kol_id,
                kolcsonzes.birsag, kolcsonzes.visszahozva_vane, konyvek.id AS k_id, konyvek.fenykep
                from kolcsonzes JOIN felhasznalok ON felhasznalok.id = kolcsonzes.felhasznalo_id JOIN konyvek ON konyvek.id = kolcsonzes.konyv_id WHERE kolcsonzes.id =".$kolcs_id;
            $results = $this->kapcs->query($sql);

        if ($results->num_rows > 0) {
            /*while ($row = $result->fetch_assoc()) {
                ?> 
                <tbody>
                    <tr>
                         <td><?php echo $row['felhasznalo_id']; ?></td>
                        <td><?php echo $row['nev']; ?></td>
                    </tr>
                    
                    
                </tbody>
                <?php
            }*/
            
         foreach ($results as $result) {
             //echo $result['email_cim'];
         }
        }
        $this->kapcs->close();
    }
    
    public function kolcsonzesModositasa($id, $birsag,$ko_id) {
        $stmt = $this->kapcs->prepare("UPDATE ".$this->tablaNev." SET birsag = ?, visszahozva_vane = 1 WHERE id = ?");
        $stmt->bind_param("ii", $birsag,  $id);
        //return $stmt->execute();
            if ($stmt->execute()) {

            $query_kolcs_2 = "UPDATE konyvek SET kolcsonozve_vane = 0 WHERE id = ?";
            $stmt_2 = $this->kapcs->prepare($query_kolcs_2);
            $stmt_2->bind_param("i", $ko_id);

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
    }
}
