<?php
session_start();

$classe=$_POST["classe"];
$id=$_POST["identifiant"];
$user=$_SESSION['userID'];

require 'connexionBDD.php' ;

if ($classe=="fa-heart-o") { //On ajoute une ligne à la table Choisir

    $sql = "INSERT INTO Choisir VALUES ('$id','$user');";
    $result = $conn->query($sql);

} else if ($classe=="fa-heart") { //On retire la ligne de la table 
    $sql = "DELETE FROM Choisir WHERE idAnnonce=$id AND idUtilisateur=$user;";
    $result = $conn->query($sql);
}

include './recupereFavoris.php';
$conn->close();

?>
