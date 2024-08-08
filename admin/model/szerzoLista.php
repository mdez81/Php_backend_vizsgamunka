<?php
//require '../config/Adatbazis.php';
$sql = "Select id, szerzo_neve FROM szerzok";

$result = $this->kapcs->query($sql);
if ($result->num_rows > 0) {
    echo '<select>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . $row['szerzo_neve'] . '</option>';
    }
     echo '</select>';
}
?>
