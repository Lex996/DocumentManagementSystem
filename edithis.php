<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include "connection.php";
$wch=$_POST["id"];
$a1= clean($_POST["ContractNo"]);
$a2= clean($_POST["Section"]);
$a3= clean($_POST["Subject"]);
$a4= clean($_POST["RefNo"]);
$a5= clean($_POST["Company"]);
$a6= clean($_POST["Employee"]);
$a7= clean($_POST["Date"]);
$a8= clean($_POST["Document"]);



$query="Update datas set ContractNo='$a1' Where id=$wch"; 
 $result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set Section='$a2' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set Subject='$a3' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set RefNo='$a4' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set Company='$a5' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set Employee='$a6' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set Date='$a7' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------
$query="Update datas set Document='$a8' Where id=$wch"; 
$result=mysqli_query($con, $query);
 if (!$result) {echo "somsing rong<br><br>".mysqli_error(); exit;}
// -----------------------------




// -----------------------------
//  //////////////////
echo "<script language='javascript'>
	alert('Updated successfully');
	window.location = 'index.php';
	</script>";



mysqli_close($con);
} else {header("location:index.php");}
?> 
</body> 
</html> 