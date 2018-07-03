<?php

require_once '../Connexion/connexion.php';

$sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

$test = $conn->query($sql0);

if ($test->num_rows == 0){
  $sql = "INSERT INTO utilisateur
  (nom, prenom, adresse, email, mdp, portable, photo, phrase_presentation, type_user)
  VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['ville']."','".$_POST['email']."','".$_POST["password"]."','".$_POST['portable']."','".$_FILES['photo']['tmp_name']."','".$_POST['presentation']."',2)";
  if (!$conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
  }
} else {
  echo 'email deja utilisé';
}

$conn->close();
?>
