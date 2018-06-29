<?php

require_once '../Connexion/connexion.php';
 
if (empty($_POST['email']) | empty($_POST['mdp'])) 
 {
       echo 'login et password ne sont pas inscrits du tout';
}
else {
   $sql = "SELECT * FROM utilisateur WHERE email = '".$_POST['email']."'";
       $result = $conn->query($sql);
if ($result->num_rows == 1) {
  $rows = $result->fetch_assoc();
  session_start();
  $_SESSION['user'] = $rows;
    switch ($rows['type_user']) {
      case '0':
        header('Location: ../Admin/admin.php');
        break;
      case '1':
        header('Location: ../Nounou/nounou.php');
        break;
      case '2':
        header('Location: ../Parent/parent.php');
        break;
      default:
        echo "";
        break;
    }
} else {
 echo "erreur";
}

$conn->close();

}