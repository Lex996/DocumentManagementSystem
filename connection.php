<?php
//session_regenerate_id(TRUE);



$con = new mysqli("localhost","root","", "dms");
if (!$con)
  {
  die('Could not connect: '.mysql_error());
  }

$table='data';

//-----------------user level in members table not in use this is why I set admin here--
$admin="admin";
//-------------------------------------------------
$title="Document Management System";

?>