<?php

require_once '../Nounou/nounouInscrite.php';
require_once '../Connexion/connexion.php';

//0 en attente, 1 ounou, 2 bloquée
if (isset($_GET['categorie'])) {
  if ($_GET['categorie'] == '1') {
    $sql = "UPDATE utilisateur SET type_user='1' WHERE email='".$_GET['email']."'";
    $conn->query($sql);
    header('Location: ../Admin/listes.php?nounous');
  }
} ?>

<div class='divider'></div>
<div class='section'>
<h3>Liste des nounous inscrites</h3>
<p><?php echo $nounousInscrites->num_rows; ?> Nounou(s) incrite(s) </p>

<?php if ($nounousInscrites->num_rows > 0){ ?>

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
        <th>Bloquer</th>
        <th>Dossier complet</th>

    </tr>
  </thead>
  <tbody>

  <?php while ($row = $nounousInscrites->fetch_row()) {
    echo "<tr>";
      foreach ($row as $value) {
        echo "<td>".$value."</td>";
      }
    echo "<td class='center'>" ?>
    <a style='cursor:pointer;' href='listes.php?type=block&email=<?php echo $row[3] ?>'><i class='small material-icons red-text'>block</i></a>
    </td>
  <td class='center'>
    <a style='cursor:pointer;' href='../modules/dossier.php?email=<?php echo $row[3] ?>'><i class='small material-icons blue-text'>link</i></a>
  </td>

  <?php
    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
