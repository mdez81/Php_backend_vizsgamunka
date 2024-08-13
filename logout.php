<?php
session_start();
unset($_SESSION['f_id']);
unset($_SESSION['hiba']);
header('Location:./index.php');
