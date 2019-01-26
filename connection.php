<?php
session_regenerate_id(TRUE);



$con = new mysqli("localhost","root","", "mydb9eng");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }

$table='table2';

//-----------------user level in members table not in use this is why I set admin here--
$admin="admin";
//-------------------------------------------------
$title="Document Management System";

?>