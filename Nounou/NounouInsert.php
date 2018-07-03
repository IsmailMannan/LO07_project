<?php

require_once '../Connexion/connexion.php';

//$regText = "/^([a-zA-Z]|\s|[àäéèêëëïîôöù])*$/";
//
//$filters = array(
//  "nom" => array("filter"=>FILTER_VALIDATE_REGEXP,
//                 "options"=>array("regexp"=> $regText)),
//  "prenom" => array("filter"=>FILTER_VALIDATE_REGEXP,
//                    "options"=>array("regexp"=> $regText)),
//  "ville" => array("filter"=>FILTER_VALIDATE_REGEXP,
//                   "options"=>array("regexp"=> $regText)),
//  "email" => FILTER_VALIDATE_EMAIL,
//  "portable" => array("filter"=>FILTER_VALIDATE_REGEXP,
//                      "options"=>array("regexp"=>"/^0\d{9}$/")),
//  "age" => array("filter"=>FILTER_VALIDATE_INT,
//                "options"=>array("min_range"=>16,"max_range"=>60)),
//  "experience" => array("filter"=>FILTER_VALIDATE_REGEXP,
//                    "options"=>array("regexp"=> $regText)),
//  "presentation" => array("filter"=>FILTER_VALIDATE_REGEXP,
//                   "options"=>array("regexp"=> $regText)),
//  "password" => FILTER_DEFAULT
//);
//
//$myinputs = filter_input_array(INPUT_POST, $filters);
//$values = array_values($myinputs);
//
//if(in_array(false, $values)) {
//  header('Location: ../Formulaire/nounou_form.html?error');
//} else {
//  $sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";
//
//  $test = $conn->query($sql0);
//
//  if ($test->num_rows == 0){
//    $sql = "INSERT INTO utilisateur
//    (nom, prenom, adresse, email, mdp, portable,photo, age, experience, phrase_presentation, type_user)
//    VALUES ('$values[0]','$values[1]','$values[2]','$values[3]','".password_hash($values[8], PASSWORD_DEFAULT)."', '$values[4]','".$_FILES['photo']['tmp_name']."','$values[5]','$values[6]','$values[7]', 1)";
//    if ($conn->query($sql)) {
//      $debutSql = "INSERT INTO langue (utilisateur_id, langue_id) VALUES ('".$_SESSION['user']."','";
//      foreach ($_POST['langues'] as $value) {
//        $sql3 = $debutSql . $value . "')";
//        if (!$conn->query($sql3)) {
//          echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>";
//        }
//      }
//      echo 'Insertion effectuée';
//  //  header('Location: ../?status=create');
//    } else {
//      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
//    }
//  } else {
//    echo 'email deja utilisé';
//  }
//}
//$sql = 'INSERT into utilisateur (nom,prenom,adresse,email,mdp,portable,photo,age,experience,phrase_presentation,type_user) values ("'.$_POST['nom'].'","'.$_POST['prenom'].'")';
$sql = 'INSERT into utilisateur (nom,prenom,adresse,email,mdp,portable,photo,age,experience,phrase_presentation,type_user,categorie) values ("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['ville'].'","'.$_POST['email'].'","'.$_POST['password'].'","'.$_POST['portable'].'","","'.$_POST['age'].'","'.$_POST['experience'].'","'.$_POST['presentation'].'",1,0)';
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo $conn->insert_id;
    session_start();
    $_SESSION['id'] = $conn->insert_id;
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

foreach ($_POST['langues'] as $value) {
        echo "$value";
        $langue = 'INSERT into langue (utilisateur_id, langue) values ("$conn->insert_id","$value")'; 
        if ($conn->query($langue)) {
            echo 'Language inserted';
            echo "$langue";
        }
        else {
             echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

$conn->close();
header('Location: ../Formulaire/dispo.html');
?>
