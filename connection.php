<?php
$con = new mysqli("localhost","root","", "dms");
if (!$con)
  {
  die('Could not connect: '.mysqli_error());
  }
$table='datas';
$title="Document Management System";
?>