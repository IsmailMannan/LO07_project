<?php

require_once '../Connexion/connexion.php';
//require_once '../Connexion/verification.php';

session_start();
//$id = $_SESSION['user']['idUtilisateur'];
$sql = "SELECT jour, date_debut, date_fin FROM disponibilite WHERE idNounou = '".$_SESSION['user']['idUtilisateur']."'";
$res = $conn->query($sql);
$events = array();

if ($res) {
  while ($row = $res->fetch_assoc()) {
    $e = array();
    if (strlen($row['jour']) == 1) {
      $e['dow'] = [$row['jour']];
      $e['start'] = $row['date_debut'];
      $e['end'] = $row['date_fin'];
    } else {
      $date = DateTime::createFromFormat('d/m/Y', $row['jour']);
      $e['start'] = $date->format('Y-m-d').' '.$row['debut'];
      $e['end'] = $date->format('Y-m-d').' '.$row['fin'];
    }
    $e['rendering'] = 'background';
    array_push($events,$e);
  }
}

$sql2 = "SELECT * FROM disponibilite WHERE idNounou = '".$_SESSION['user']['idUtilisateur']."'";
$res2 = $conn->query($sql2);
if ($res2) {
  while ($row = $res2->fetch_assoc()) {
    $e = array();
    $e['id'] = $row['idPlanning'];
   // $e['title'] = 'Garde de ' . $row['email_parent'];
    $e['start'] = $row['date_debut'];
    $e['end'] = $row['date_fin'];
    $e['backgroundColor'] = 'green';
    array_push($events,$e);
  }
}
echo json_encode($events);
 ?>
