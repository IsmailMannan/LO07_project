<?php require_once '../Connexion/connexion.php';
//Permet de vérifier si l'utilisateur est autorisé à accéder à la page
session_start();
//$sqlDispo = "SELECT * FROM disponibilite WHERE idNounou = '".$_SESSION['user']."'";
//$res = $conn->query($sqlDispo);
//Si la nounou n'a pas de disponibilité enregistrée, alors elle est redirigé vers la page dispo
//if($res->num_rows == 0) {
//  header('Location: ..\forms\dispo.html');
//} else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
  <link rel="stylesheet" media="print" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css">
  <link rel="stylesheet" href="../style/style.css">
  <title>Nounou Planning</title>
</head>
<body class="administration">
  <nav class="white">
    <div class="container nav-wrapper">
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../modules/dossier.php?id=<?php echo $_SESSION['id'] ?>" class="btn waves-effect waves-light  pink lighten-1">Mon profil</a></li>
        <li>  <a href="../Connexion/deconnexion.php" class="btn waves-effect waves-light  pink lighten-1">Déconnexion</a></li>
      </ul>
    </div>
  </nav>
  <div class='container'>
    <h1 class='center'>Ton agenda</h1>
    <br><br><hr><br>
    <div id='calendar'></div>
  </div>
  <!--- Importer les librairies javacript nécessaires-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/fr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/fr.js"></script>
  <script src="../JS/initNounou.js"></script>

</body>