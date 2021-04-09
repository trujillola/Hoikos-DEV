<?php
session_start();

$id=$_POST['id'];
$user=$_SESSION['userID'];

require 'connexionBDD.php' ;

$sql = "DELETE FROM Choisir WHERE idAnnonce=$id AND idUtilisateur=$user;";
$result = $conn->query($sql);
include './recupereFavoris.php';

$conn->close();
?>
