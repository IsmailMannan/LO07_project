<?php

require 'connexion.php';

global $conn;
$sql = "SELECT type_user from utilisateur";
$type_user = $conn->query($sql);
session_start();

if ($type_user == 1) {
    header('Location: ../Nounou/nounou.php');
}
elseif ($type_user == 2) {
    header('Location: ../Parent/parent.php');
}
else {
     header('Location: ../Admin/admin.php');
    
}

