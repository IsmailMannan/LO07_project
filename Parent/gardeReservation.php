<?php
require_once '../Connexion/connexion.php';
session_start();
$debut = $_SESSION['resa']['debut'] . ':00';
$fin = $_SESSION['resa']['fin'] . ':00';
$idNounou = $_SESSION['id']['idNounou'];
$idParent = $_SESSION['resa']['idParent'];
$jour = $_SESSION['resa']['jour'];
$duree = $fin - $debut;
if (strlen($_SESSION['resa']['jour'])>1){ //resa occa
    $tarif = $duree * (7 + 4*(count($_SESSION['resa']['enfants'])-1));
    $date = DateTime::createFromFormat('d/m/Y', $jour);
    $jdebut = $date->format('Y-m-d') . ' ' . $debut;
    $jfin = $date->format('Y-m-d') . ' ' . $fin;
    $sql = "INSERT INTO prestation (date_debut,date_fin,idNounou,idParent,tarif) VALUES ('$jdebut','$jfin','$idNounou','$idParent','$tarif')";
} else {
    $tarif = $duree * (10 + 5*(count($_SESSION['resa']['enfants'])-1));
    $jdebut = $jour . ' ' . $debut;
    $jfin = $jour . ' ' . $fin;
    $sql = "INSERT INTO prestation (date_debut,date_fin,idNounou,idParent,tarif) VALUES ('$jdebut','$jfin','$nounou_email','$email_parent','$tarif')";
}
if($conn->query($sql)) {
    $sql2 = "SELECT MAX(idPrestation) FROM prestation";
    $res = $conn->query($sql2);
    $id = $res->fetch_row();
    header('Location: ../accueil/parent.php?res');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}
?>