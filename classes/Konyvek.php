<?php
require ('./config/Adatbazis.php');

class Konyvek {

    private $kapcs;

    public function __construct() {
        $adatbazis = new Adatbazis();
        $db = $adatbazis->ABKapcsoat();
        $this->kapcs = $db;
    }

    public function osszeskonyv_kategoriaval() {
        $sql = "Select konyvek.cim, kategoria.kategoria_neve, szerzok.szerzo_neve, konyvek.isbn, konyvek.fenykep, konyvek.kolcsonozve_vane from konyvek join kategoria on kategoria.id= konyvek.katalogus_id join szerzok on szerzok.id = konyvek.szerzo_id;
";
        $result = $this->kapcs->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>  
                <div class="col-md-4" style="float:left; height:300px;">   
                    <img src="admin/konyvek/<?php print($row['fenykep']); ?>" width="100">
                    <br /><b><?php echo $row['cim']; ?></b><br />
                    <?php echo $row['kategoria_neve']; ?><br />
                    <?php echo $row['szerzo_neve']; ?><br />
                    <?php echo $row['isbn']; ?><br />
                    <?php if ($row['kolcsonozve_vane'] == '1'): ?>
                        <p style="color:red;">Issued</p>
                    <?php endif; ?>
                </div>
                <?php
            }
        }
    }
}
?>  








