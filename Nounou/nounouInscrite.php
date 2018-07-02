<?php

require_once '../Connexion/connexion.php';

$sql = "SELECT nom,prenom,adresse,email,portable,age,experience,phrase_presentation FROM utilisateur WHERE type_user = '1'";
$sql2 = "SELECT nom,prenom,adresse,email,portable,age,experience,phrae_presentation FROM utilisateur WHERE type_user = '1' and categorie='2'";

$nounousInscrites = $conn->query($sql);
$nounousBloquées = $conn->query($sql2);
?>
