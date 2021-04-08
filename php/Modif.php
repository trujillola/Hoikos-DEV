<?php
session_start();

$classe=$_POST["classe"];
$id=$_POST["identifiant"];
$user=$_SESSION['userID'];

$servername='localhost';
$username='laura';
$password='laura';
$dbname='Hoikos';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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