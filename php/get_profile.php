<?php 
  include_once('auth.php');
  $username = "";
  $fname = "";
  $lname = "";
  $nationality = "";
  $civilstatus = "";
  $dob = "";
  $pob = "";
  $educ = "";
  $tin = "";


//get ID
$id = $_SESSION['id'];
  
if ($id==null) {
    header('location: ../index.php?login=expired');
    exit();
  }

  $query = "SELECT * FROM `user` INNER JOIN `userinfo` ON user.userID = userinfo.userID WHERE user.userID ='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 1) {
    $username = $row['username'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $nationality = $row['nationality'];
    $civilstatus = $row['civilstatus'];
    $dob = $row['dob'];
    $pob = $row['pob'];
    $educ = $row['educ'];
    $tin = $row['tin'];
  }


?>