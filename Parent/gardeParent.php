<?php

require_once '../Connexion/connexion.php';
session_start();
//liste des nounou associés à la prestation des parents connectés
$date =date('Y-m-d H:i:s');
$sql = "SELECT date_debut, date_fin, tarif FROM prestation WHERE idParent='".$_SESSION['id']."'"." AND date_fin >'$date'" ;
$gardesParent = $conn->query($sql);

/**

$sql2 = "SELECT date_debut, date_fin, date_tarif FROM garde WHERE email_parent='".$_SESSION['user']['email']."'"." AND fin <'$date' AND status='reservee'" ;
$gardesTerminee = $conn->query($sql2);
*/
?>
