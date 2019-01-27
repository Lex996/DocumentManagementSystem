<html>
  <head>
    <title>DMS</title>
    <link rel="stylesheet" type="text/css" href="showlist.css" />
  </head>
  <body>
<?php
include "connection.php";
session_start();
//require_once"connection.php";
if (!isset($_SESSION['user'])) {
  header("location:index.php");
} else {
echo "<h1> $title <a href='index.php'><img src='img/favicon.ico'></a></h1>";
$sql='SELECT * FROM '.$table;

if (isset($_POST['condition'])) { 
  $sql=$sql.' WHERE '.$_POST['condition'].' ';
  if (!empty($_POST['value4comparison'])) { 
    $_POST['value4comparison']=trim($_POST['value4comparison']);
    $sql=$sql." LIKE '%".$_POST['value4comparison']."%'";
  }

  else { echo "Please set a value for search"; exit();} 
}

$result=mysqli_query($con, "$sql");
if (!$result) {echo "No results found  ".mysqli_error(); exit();} 
// ------------------import labels --------------------
/*$lbl='SELECT * FROM table1';

$labelz=mysqli_query($con, "$lbl");

$rowlbl = mysqli_fetch_array($labelz);*/

// ----------------------------------------------
echo "<center><table >";
echo "<thead>
<tr>
<td>ContractNo</td>
<td>Section</td>
<td>Subject</td>
<td>RefNo</td>
<td>Company</td>
<td>Employee</td>
<td>Date</td>
<td>Document</td>
<td>delete</td>
<td>edit</td>
</tr>
</thead>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";


if (!empty($row[1])) {
   echo "<td>$row[1]</td>";
  } 
  if (!empty($row[2])) { echo "</td><td>$row[2]</td>";} else { echo "<td>..</td>";}
  if (!empty($row[3])) { echo "<td>$row[3]</td>";} else { echo "<td></td>";}
  if (!empty($row[4])) { echo "<td>$row[4]</td>";} else { echo "<td></td>";}
  if (!empty($row[5])) { echo "<td>$row[5]</td>";} else { echo "<td></td>";}
  if (!empty($row[6])) { echo "<td>$row[6]</td>";} else { echo "<td></td>";}
  if (!empty($row[7])) { echo "<td>$row[7]</td>";} else { echo "<td></td>";}
  //if (!empty($row[8])) { echo "<td> $row[8]</td>";} else { echo "<td></td>";}
  $fileasm='upload/'.$row['ContractNo'].'/'.$row['Date'].'/'.$row['Document'];
  $ext = substr($fileasm, strrpos($fileasm, '.') + 1);
  echo "<td>
        <a href=$fileasm>
        <img src='img/".$ext .".png'></a>
        </td>";



if ($_SESSION['user']=="admin"){echo "<td><a href='dell.php?id=$row[id]&which=".$fileasm."'><img src='img/delete.png'></a></td>";

echo "<td><a href='edit.php?id=$row[id]'><img src='img/edit.png'></a></td></tr>";}

}

echo "</table>";
mysqli_close($con);

}
echo "<br><a href='index.php'>Go Back</a>";
?> 