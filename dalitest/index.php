<?php
include("data/class.PDOdalitest.php");
include("vues/v_entete.php") ;
session_start();
$pdo = PdoDalitest::getPdoDalitest();


include("controleur/c_inscription.php");

include("vues/v_pied.php") ;
?>