<html >
<head>
<title>Edit document</title>
<link rel="stylesheet" type="text/css" href="edit.css" />
</head>
<body bgcolor=c0c078><center>
<?php
session_start();
require_once"connection.php";
$attachmentname="";
if (isset($_SESSION['user'])) {
if (isset($_GET['id'])) {
   $wch=$_GET['id'];
  } else { 
   Exit();
  }
$sql='SELECT * FROM datas where id='.$wch;
$result=mysqli_query($con, "$sql");
if (!$result) {
  echo "Result is empty ".mysqli_error(); 
  exit();
} 
echo "<h2>$title<br>Update</h2><form  method=post name=gooedit action='edithis.php' >";
while($row = mysqli_fetch_array($result))
  {
echo "<table width='60%'><tr><td><h3>";
echo "<input type=hidden value=$wch name=id >";
if (!empty($row[1])) { echo "ContractNo <input type=text value='$row[1]' name=ContractNo readonly size=20 > | ";} 
if (!empty($row[2])) { echo " Section
<select name=Section>
<option>$row[2]</option>
<option>external<option>
<option>local<option>
<option>general</option>
</select>
<br><br>";} 
if (!empty($row[3])) { echo "Subject <input type=text value='$row[3]' name=Subject size=65 ><br><br> ";}
if (!empty($row[4])) { echo "RefNo <input type=text value='$row[4]' name=RefNo size=70 ><br><br>";} 
if (!empty($row[5])) { echo "Company <input type=text value='$row[5]' name=Company size=20 ><br><br>";} 
if (!empty($row[6])) { echo "Employee <input type=text value='$row[6]' name=Employee size=45 ><br><br>";} 
if (!empty($row[7])) { echo "Date <input type=text value='$row[7]' name=Date size=20 ><br><br>";} 
if (!empty($row[8])) { echo "Document : <input type=text value='$row[8]' name=Document size=20 readonly ><br><br>";} 
echo "<input type=submit value='Update'> </form>";
echo " <a href='index.php'>Cancel</a>";
echo "</td></tr></table>";
}
mysqli_close($con);
}
else {echo "go way!";}
?> 
