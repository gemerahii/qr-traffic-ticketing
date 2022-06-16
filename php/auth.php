<?php
if(session_status() !== PHP_SESSION_ACTIVE){
session_start();

}

include "connect.php";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	
		$password = sha1($password);
		$query = "SELECT * FROM user WHERE username ='$username' AND password='$password'";
		$results = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($results);
    
        if(mysqli_num_rows($results) != 1){
            header('location: index.php?login=incorrect');
            exit();
        }
        else{

        $type = $row['usertype'];
        $_SESSION['id'] = $row['userID'];
        
        if($type == "admin"){
            header('location: Admin/home.php');
        }
        else if($type == "client"){
            header('location: Profile/home.php');
        }
        else if($type == "enforcer"){
            header('location: Enforcer/home.php');
        }

        
    }
}

  // USER LOGOUT  
if (isset($_POST['logout'])){
   session_destroy();
   header('location: ../index.php');
   exit();
 }


 if (isset($_POST['save'])){
    $violation = $_POST['violation'];
	$clientID = $_POST['clientID'];
    
    
    if ($violation==null || $clientID==null) {
        header('location: ../Enforcer/home.php?submit=none');
        exit();
    }
    else{
        $query = "SELECT * FROM user WHERE username='$clientID'";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($results);
           
        if(mysqli_num_rows($results) != 1){
            header('location: ../Enforcer/home.php?submit=not');
            exit();
        }
        else{
            $user = $row['userID'];
            $ses = $_SESSION['id'];
            $s = "INSERT INTO violators (userID, enforcerID, violation) VALUES ('$user','$ses','$violation')";
            mysqli_query($conn, $s);
            header('location: ../Enforcer/home.php?submit=success');
            exit();
        }
    }
 }

?>