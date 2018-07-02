<?php

require_once '../Connexion/connexion.php';

$sql52 = "SELECT nom,prenom,adresse,email,portable,age,experience,phrase_presentation FROM utilisateur WHERE type_user = '1' and categorie='1'";
$sql32 = "SELECT nom,prenom,adresse,email,portable,age,experience,phrase_presentation FROM utilisateur WHERE type_user = '1' and categorie='2'";

$nounousInscrites = $conn->query($sql52);
$nounousBloquées = $conn->query($sql32);


 ?>

<div class='divider'></div>
<div class='section'>
<h3>Liste des revenus par nounou</h3>
<p><?php echo $nounousInscrites->num_rows; ?> Nounou(s) incrite(s) </p>
<p><?php echo $nounousBlock->num_rows; ?> Nounou(s) bloquée(s) </p>


<?php if ($nounousInscrites->num_rows > 0 ||  $nounousBlock->num_rows>0 ){ ?>

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
        <th>Type de nounou</th>
        <th>Revenu (€)</th>

    </tr>
  </thead>
  <tbody>

  <?php

 //liste des nounous avec leur revenu respectif  
  $sqlNounouRevenu= "SELECT u.nom, u.prenom,u.adresse, p.idNounou, u.portable,u.age,u.experience,u.type_user, SUM(p.tarif) revenu
FROM prestation p
INNER JOIN utilisateur u ON p.idNounou = u.idUtilisateur
GROUP BY p.idNounou
ORDER BY revenu DESC";



  $nounouRevenu= $conn->query($sqlNounouRevenu);
  while ( $rowNounouRevenu = $nounouRevenu->fetch_row())
 {
    echo "<tr>";
    for ($i=0; $i <7 ; $i++) {
      echo "<td>".$rowNounouRevenu[$i]."</td>";
    }
    if($rowNounouRevenu[7]=='2'){
      echo "<td> Bloquée</td>";

    }else {
      echo "<td> Non bloquée</td>";
    }
      echo "<td>".$rowNounouRevenu[8]."</td>";

    echo "</tr>";
    }





  // nounous dont les revenus sont nuls
  $sqlNounou= "SELECT nom, prenom,adresse, email, portable,age,experience, type_user FROM utilisateur WHERE type_user='1' and categorie='2' OR categorie='0'";
  $nounou=$conn->query($sqlNounou);
  $nounouRevenu= $conn->query($sqlNounouRevenu);
  while ( $rowNounou = $nounou->fetch_row())
 {    $sqlNounouRevenu= "SELECT u.nom, u.prenom,u.adresse, p.idNounou, u.portable,u.age,u.experience, u.type_user, SUM(p.tarif) revenu
   FROM prestation p
   INNER JOIN utilisateur u ON p.idNounou = u.idUtilisateur
   GROUP BY p.idNounou
   ORDER BY revenu DESC";
   $nounouRevenu= $conn->query($sqlNounouRevenu);
  $revenu=false;
   while ( $rowNounouRevenu = $nounouRevenu->fetch_row())
  {

         if($rowNounou[3]==$rowNounouRevenu[3]){
           $revenu=true;
         }
       }

     if(!$revenu){

       echo "<tr>";
       for ($i=0; $i <7 ; $i++) {
         echo "<td>".$rowNounou[$i]."</td>";
       }
       if($rowNounou[7]=='2'){
         echo "<td> Bloquée</td>";

       }else {
         echo "<td> Non bloquée</td>";
       }
         echo "<td>0</td>";

    echo "</tr>";
    }



}

  echo "</tbody></table>";
}
echo "</div>";
?>
