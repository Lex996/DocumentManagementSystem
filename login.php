<?php
include "connection.php";
include "login.html";
session_start();
$U="";
$P="";
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ----------------security-----------------
    
    
    function clean($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $U=clean($_POST['username']);
    $P=clean($_POST['password']);
    //$encp=md5($P);
    if  (empty($U))  { echo "The USER field is required"; exit;}
    if  (empty($P))  { echo "The PASS field is required"; exit;}
    
    $upit = "SELECT * FROM users WHERE username='$U' and password='$P'";
    $result = $con -> query($upit);
    if (!$result) { echo "'Could not run query: ' . mysql_error()";   exit; }
    $row =(mysqli_fetch_array($result));
     if ($row ) {    

    $_SESSION['user']=$U;
    
    header("location:index.php"); }
     }
    else { echo($result);
     mysqli_close($con);} 
    ?>





