<?php

require_once '../Connexion/connexion.php';
 
if (empty($_POST['debut']) | empty($_POST['fin'])) 
 {
       header('Location: ..');
}
else {
    session_start();
  $id=$_SESSION['user'];
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
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
     foreach ($jours as $value) {
        $sql = "INSERT INTO disponibilite(jour, date_debut, date_fin, idNounou) VALUES ('$value','$debut','$fin','$id')";
        $conn->query($sql);
 }

}