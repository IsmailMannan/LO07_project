<?php

require_once '../Connexion/connexion.php';


//insertion des données du formulaire dans la base en attente de validation par l'admin
$sql = 'INSERT into utilisateur (nom,prenom,adresse,email,mdp,portable,photo,age,experience,phrase_presentation,type_user) values ("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['ville'].'","'.$_POST['email'].'","'.$_POST['password'].'","'.$_POST['portable'].'","","'.$_POST['age'].'","'.$_POST['experience'].'","'.$_POST['presentation'].'",1)';
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
        $langue = "INSERT into langue (utilisateur_id, langue) values ('".$_SESSION['id']."','$value')"; 
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
