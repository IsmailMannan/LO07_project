<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>
</head>
<body class="administration">
  <nav class="white">
    <div class="container nav-wrapper">
      <a class="brand-logo center  grey-text text-darken-1">Dossier Nounou</a>
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../Connexion/deconnexion.php" class="btn waves-effect waves-light teal lighten-1">Déconnexion</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <br>
<?php require_once '../Connexion/connexion.php';
session_start();
$id = $_SESSION['id'];

$sql = "SELECT nom,prenom,adresse,email,portable,age,experience,phrase_presentation FROM utilisateur WHERE idUtilisateur='$id'";

$nounou = $conn->query($sql);
$row = $nounou->fetch_row();
$sql2 = "SELECT idPrestation, date_debut, date_fin, idNounou, idParent, tarif FROM prestation WHERE  idNounou='$id'";
$garde = $conn->query($sql2);
echo("<h5> Prénom : $row[1]</h5>");
echo("<h5> Nom : $row[0]</h5>");
echo("<h5> E-mail : ".$row[3]."</h5>");
echo("<h5> Nombre de gardes : ".$garde->num_rows ."</h5><br/>");
?>


<table id='table'>
  <thead>

  <tr>
      <th>Garde</th>
      <th>Parent</th>
      <th>Evaluation du parent</th>
      <th>Revenu</th>
  </tr>
</thead>
<tbody>

  <?php
      while ($row2 = $garde->fetch_row()) {


        $sql3 = "SELECT note, appreciation FROM evaluation WHERE prestation_id='$row2[0]'";

        $evaluation= $conn->query($sql3);
        $row3 = $evaluation->fetch_row();
          echo "<tr>";
              echo "<td>"."<b>Du </b> $row2[1]<b> au </b> $row2[2]" ."</td>";


              echo "<td>$row2[3]</td>";
              echo "<td>Description : $row3[0]<br/> Note : $row3[1] </td>";
              echo "<td>$row2[4]</td>";
              echo "</tr>";

}







   ?>
