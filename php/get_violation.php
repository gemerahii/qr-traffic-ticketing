<?php
include_once('auth.php');
$date = "";
$violation = "";
$status = "";

//get ID
$id = $_SESSION['id'];
  
if ($id==null) {
    header('location: ../index.php?login=expired');
    exit();
  }

$query = "SELECT * FROM userinfo INNER JOIN violators on violators.enforcerID = userinfo.userID WHERE violators.userID='$id'";
$result = mysqli_query($conn, $query);
            
?>