<?php

require_once '../Connexion/connexion.php';

$resblock = "SELECT nom,prenom,adresse,email,portable,age,experience,phrase_presentation FROM utilisateur WHERE type_user = 'block'";

$nounousBlock = $conn->query($resblock);

if (isset($_GET['type'])) {
  if ($_GET['type'] == 'unlock') {
    $sql = "UPDATE utilisateur SET type_user='1' WHERE email='".$_GET['email']."'";
    $conn->query($sql);
    header('Location: ../Admin/listes.php?bloques');
  }
} ?>

<div class='divider'></div>
<div class='section'>
<h3>Liste des nounous bloquées</h3>
<p><?php echo $nounousBlock->num_rows; ?> Nounou(s) bloquée(s) </p>

<?php if ($nounousBlock->num_rows > 0){ ?>

  <table>
  <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Ville</th>
        <th>Email</th>
        <th>Portable</th>
        <th>Age</th>
        <th>Experience</th>
        <th>Presentation</th>
        <th>Débloquer</th>
        <th>Dossier complet</th>


    </tr>
  </thead>
  <tbody>

  <?php while ($row = $nounousBlock->fetch_row()) {
    echo "<tr>";
      foreach ($row as $value) {
        echo "<td>".$value."</td>";
      }
    echo "<td class='center'>" ?>
    <a style='cursor:pointer;' href='listes.php?type=unlock&email=<?php echo $row[3] ?>'><i class='small material-icons green-text'>lock_open</i></a>
    </td>
    <td class='center'>
      <a style='cursor:pointer;' href='../modules/dossier.php?email=<?php echo $row[3] ?>'><i class='small material-icons'>link</i></a>
    </td>
  <?php
    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
