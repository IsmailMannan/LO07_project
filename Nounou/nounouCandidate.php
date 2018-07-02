<?php

require_once '../Connexion/connexion.php';

$sql = "SELECT nom,prenom,adresse,email,portable,age,experience,phrase_presentation FROM utilisateur WHERE type_user = '1'";

$nounous = $conn->query($sql);

?>

