<?php
$servername='localhost';
  $dbname='Hoikos';
  // Create connections
  $conn = new mysqli($servername, $_SESSION['username'], $_SESSION['password'], $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>