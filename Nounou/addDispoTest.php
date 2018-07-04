<?php

require_once '../Connexion/connexion.php';

session_start();
if (empty($_POST['debut']) | empty($_POST['fin'])) 
 {
       header('Location: ../index.html');
}
else {
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
    $debut = $_POST['debut'][0];
    $fin = $_POST['fin'][0];
     foreach ($jours as $value) {
        $sql = "INSERT INTO disponibilite(jour, date_debut, date_fin, idNounou) VALUES ('$value','$debut','$fin','".$_SESSION['id']."')";
        if($conn->query($sql) === TRUE) {
             echo '<script type="text/javascript">alert("Creation de l\'utilisateur et ajout des dispos");document.location.href = "../index.html";</script>';
             //header('Location: ../index.html');
        }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
 }

}