<?php
session_start();

$id=$_POST['id'];
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

$sql = "DELETE FROM Choisir WHERE idAnnonce=$id AND idUtilisateur=$user;";
$result = $conn->query($sql);
include './recupereFavoris.php';

$conn->close();
?>