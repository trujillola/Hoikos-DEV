<?php

$user=$_SESSION['userID'];
$_SESSION['userFav']=array();
$sql = "SELECT idAnnonce FROM Choisir WHERE idUtilisateur=$user;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=0;
    while($row = $result->fetch_assoc()) {
        $_SESSION['userFav'][$i]=$row['idAnnonce'];
        $i=$i+1;
    }
  } else {
    echo '<script language="Javascript"> alert ("0 results") </script>';

  }
$conn->close();
?>
