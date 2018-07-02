<?php

require_once '../Connexion/connexion.php';

for ($i=0; $i < count($_POST['nom']); $i++) {
  $sql = "INSERT INTO enfant (idParent, nom, prenom, age, information_general) VALUES
  ('".$_POST['id_parent']."','".$_POST['nom'][$i]."','".$_POST['prenom'][$i]."','".$_POST['age'][$i]."','".$_POST['info'][$i]."')";
  if (!$conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
  }
}
$conn->close();
header('Location: ../index.html');
 ?>
