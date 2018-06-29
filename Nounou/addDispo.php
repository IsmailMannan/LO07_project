<?php
ob_start();
require_once '../Connexion/connexion.php';
session_start();
$id = $_SESSION['user'];
var_dump($_POST['jours']);

if (compare($_POST['debut'],$_POST['fin'])) {
  if (isset($_POST['type']) && $_POST['type'] == 'same') {
    $debut = $_POST['debut'][0];
    $fin = $_POST['fin'][0];
    switch ($_POST['dispo']) {
      case 'work':
        $jours = [1,2,3,4,5];
        break;
      case 'all':
        $jours = [1,2,3,4,5,6,0];
        break;
      case 'ponct':
        $jours = $_POST['jours'];
        break;
    }
    insertFix($jours,$debut,$fin,$email);
  } else {
    insert($_POST['jours'],$_POST['debut'],$_POST['fin'],$email);
  }
} 


function compare($debut,$fin) {
  for ($i=0; $i < count($debut); $i++) {
    if ($debut[$i] >= $fin[$i]) {
      return FALSE;
    }
  }
  return TRUE;
}

function insert($jours,$debut,$fin,$id)
{
  global $conn;
  $error = FALSE;
  for ($i=0; $i < count($jours); $i++) {
    $sql = "INSERT INTO disponibilité (jour, date_debut, date_fin, idNounou) VALUES ('$jours[$i]','$debut[$i]','$fin[$i]','$id')";
    if (!$conn->query($sql)) {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
      $error = TRUE;
    }
  }
  $conn->close();
  if (!$error) {
    header('Location: nounou.php');
  }
}

function insertFix($jours,$debut,$fin,$id)
{
  global $conn;
  $error = FALSE;
  foreach ($jours as $value) {
    $sql = "INSERT INTO disponibilite(jour, date_debut, date_fin, idNounou) VALUES ('$value','$debut','$fin','$id')";
    if (!$conn->query($sql)) {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
      $error = TRUE;
    }
  }
  $conn->close();
  if (!$error) {
    header('Location: nounou.php');
  }
}
ob_end_flush();
?>
