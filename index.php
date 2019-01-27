<?php
session_start();

require_once"connection.php";
include "connection.php";
//include "login.php";

?>
<html>

    <head>
        <meta charset="UTF-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
   <title>DMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/login.css" />
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
  <script type="text/javascript" src="validate.js" ></script> 
    </head>

<script language='JavaScript'>
    <!--
    function ValidateForm() {
        var Check = 0;
if (document.goo.uploaded_file.value == '') { Check = 1; }
if (document.goo.field1.value == '') { Check = 1; }
if (document.goo.field2.value == '') { Check = 1; }
if (document.goo.field3.value == '') { Check = 1; }
if (document.goo.field4.value == '') { Check = 1; }
if (document.goo.field5.value == '') { Check = 1; }
if (document.goo.field6.value == '') { Check = 1; }
if (document.goo.field7.value == '') { Check = 1; }
if (document.goo.field8.value == '') { Check = 1; }



        if (Check == 1) {
            alert(" All fields are required ");
            return false;
        } else {
            document.goo.submit.disabled = true;
            return true;
        }
    }
    //-->
    </script>
  <SCRIPT language=Javascript>
      <!--
      function dont(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
<body bgcolor=teal><b>
<center>

<?php
echo "<h1>$title</h1>";


if (isset($_SESSION['user'])) {
// ------------------import labels --------------------
/*$lbl='SELECT * FROM datas';

$labelz=mysqli_query($con, "$lbl");

$rowlbl = mysqli_fetch_array($labelz);*/
// ----------------------------------------------
?>  
<table  bgcolor=#C7C5E9 cellpadding=3 ><tr>
<form method="POST" action="showlist.php">
<td>
<select name=condition>
<option value="ContractNo">ContractNo</option>
<option value="Section">Section</option>
<option value="Subject">Subject</option>
<option value="RefNo">RefNo</option>
<option value="Company">Company</option>
<option value="Employee">Employee</option>
<option value="Date">Date</option>
<option value="Document">Document</option>
</select>
</td>


 <td><input type=text name="value4comparison">
<input type="submit" value="Search" name="B1">
	
</td></tr></table></form></center>
<?php


/*echo "<br><center><div><h3>Data Entry:<br>
<form  method=post name=goo action='insert.php' enctype='multipart/form-data'
 onSubmit='return ValidateForm()'>";*/
// --------------------------------------

$sqlcont='SELECT DISTINCT ContractNo FROM datas';


$result=mysqli_query($con, "$sqlcont");
if (!$result) {echo "No results found ".mysqli_error(); exit();} 

echo "<br> Contract <select name=ContractNo>";
while($row = mysqli_fetch_array($result))
  { echo "<option>".$row['ContractNo']."</option>";}
echo "</select >";
echo "  or new <input type=text name=anothercont  size=20 onkeypress='return dont(event)' >  ";
echo "   Year <input type=text name=yr  size=6 maxlength=4 onkeypress='return dont(event)' >  ";
// -------------------------------

echo "Section <select name=Section>
<option>external <option>
<option>local <option>
<option>bond<option>
<option>msci<option>
</select>
<br><br> Subject<input type=text name=Subject  size=76> <br><br>
 Document File <input type='file' name='uploaded_file'>
<br><br> Description <input type=text name=Description  size=80>
<br><br> RefNo <input type=text name=RefNo  size=30>";
// --------------------------------------

$sqlco='SELECT DISTINCT Company FROM datas';

$result=mysqli_query($con, "$sqlco");
if (!$result) {echo "No results found ".mysqli_error(); exit();} 

echo "<br><br> Company <select name=field6>";
while($row = mysqli_fetch_array($result))
  { echo "<option>".$row['Company']."</option>";}
echo "</select >";
echo "   or new <input type=text name=newco  size=44>";


// --------------------------------------
$sqlemp='SELECT DISTINCT Employee FROM datas';

$result=mysqli_query($con, "$sqlemp");
if (!$result) {echo "No results found ".mysqli_error(); exit();} 

echo "<br><br>Employee<select name=Employee>";
while($row = mysqli_fetch_array($result))
  { echo "<option>".$row['Employee']."</option>";}
echo "</select >";
echo "  or new<input type=text name=anotheremp  size=24>    ";
echo " Date <input type=text name=Date  size=12 value='".date('Y-m-d')."' readonly>
<p align=center><input type=submit value='SUBMIT' ></p></form>";
echo "</div></div>";
echo $_SESSION['user'];
echo " | <a href='out'>Logout</a><b> | ";
if ($_SESSION['user']==$admin) {
echo " <a href='reg'>Users</a> | ";
// echo $_SESSION['level'];
echo " <a href='labels'>Labels translation</a><br><br>"; } } else {include "login.html";}

?>

