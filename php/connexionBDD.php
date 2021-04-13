<?php
  $username='verdierame';
  $password='Im4uema3cohb!';
  $servername='localhost';
  $dbname='Hoikos';
  // Create connections
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>