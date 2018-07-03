<?php
  session_start();
  if (isset($_SESSION['user'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Compte Parent</title>
</head>
<body class="white">
  <nav class="white nav-extended">
    <div class="container nav-wrapper">
      <ul class="right hide-on-med-and-down">
          <li>  <a href="../Connexion/deconnexion.php" class="btn waves-effect waves-light  pink lighten-1">Déconnexion</a></li>
      </ul>
    </div>
    <div class="pink lighten-4 nav-content">
      <ul id="tabs" class="tabs tabs-transparent">
        <li class="tab"><a class="grey-text text-darken-1 active" href="#recherche">Recherche</a></li>
        <li class="tab"><a class="grey-text text-darken-1 " href="#listegardes">Mes demandes de gardes</a></li>
        <li class="tab"><a class="grey-text text-darken-1 " href="#gardeseval">Mes gardes à évaluer</a></li>
      </ul>
    </div>
  </nav>
  <div id="res" class="modal">
    <div class="modal-content center">
      <h4>Garde réservée</h4>
      <p>Votre réservation de nounou a bien été enregistrée</p>
      <p>Un e-mail récapitulatif va vous être envoyer</p>
      <a class="modal-close waves-effect waves-green btn">OK</a>
    </div>
  </div>
<?php
  echo '<div class="container" id="recherche">';
  require_once '../modules/recherches.php';
  echo '</div><div id="listegardes">';
  require_once '../modules/listegardes.php';
  echo '</div><div id="gardeseval">';
  require_once '../modules/listegardesEval.php';
  echo "</div>";
?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="../JS/initParent.js"></script>
</body>
</html>

<?php } else {
  echo "Accès refusé";
} ?>
