<?php

require_once '../Nounou/nounouCandidate.php';
require_once '../Connexion/connexion.php';

if (isset($_GET['categorie'])) {
  switch ($_GET['categorie']) {
    case 'add':
      $sql = "UPDATE utilisateur SET categorie='1' WHERE email='".$_GET['email']."'";
      $conn->query($sql);
      header('Location: ../Admin/listes.php?candidats');
      break;
    case 'remove':
   //   $sql = "DELETE FROM utilisateur WHERE utilisateur_email='".$_GET['email']."';";
      $sql .= "DELETE FROM utilisateur WHERE email='".$_GET['email']."'";
      $conn->multi_query($sql);
      header('Location: ../Admin/listes.php?candidats');
      break;
  }
} ?>

<div class='divider'></div>
<div class='section'>
<h3>Nouveau(x) Candidat(s)</h3>
<p><?php echo $nounous->num_rows; ?> Nounou(s) à valider </p>

<?php if ($nounous->num_rows > 0){ ?>

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
        <th>Valider</th>
    </tr>
  </thead>
  <tbody>

  <?php while ($row = $nounous->fetch_row()) {
    echo "<tr>";
      foreach ($row as $value) {
        echo "<td>".$value."</td>";
      }
    echo "<td>" ?>
  <a style='cursor:pointer;' href='../modules/candidats.php?categorie=add&email=<?php echo $row[3] ?>'><i class='small material-icons green-text'>check</i></a>
  <a style='cursor:pointer;' href='../modules/candidats.php?categorie=remove&email=<?php echo $row[3] ?>'><i class='small material-icons red-text'>close</i></a>
    </td>
  <?php
    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
