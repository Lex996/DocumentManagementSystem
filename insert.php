<?php
include "connection.php";
$date="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// ----------------security-----------------


function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// ----------prepare for new contract name with year or without---------


$a1=clean($_POST["ContractNo"]); 


If(!file_exists("upload/".$_POST["ContractNo"])) {mkdir("upload/".$a1); } 

// ---------------------------------

/*If(!file_exists("upload")){mkdir("upload"); } 
If(!file_exists("upload/$a1")){mkdir("upload/$a1"); } 
*/

// ------------------------------------
$a2= clean($_POST["Section"]);
$a3= clean($_POST["Subject"]);
$a4= $_POST["RefNo"];
$a5= $_POST["Date"];
echo $a5;
if (!empty($_POST["newco"])) { $a6= $_POST["newco"]; } else {$a6= $_POST["Company"];}
if (!empty($_POST["anotheremp"])) { $a7= $_POST["anotheremp"]; } else {$a7= $_POST["Employee"];}

If(!file_exists("upload/$a1/$a5")){
    mkdir("upload/$a1/$a5"); } 

// /////////////////////////////////////////////////////////////
//Сheck that we have a file
if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {

 //Check if the file is rar folder 
  $filename = basename($_FILES['uploaded_file']['name']);


    //Determine the path to which we want to save this file
    $newname = dirname(__FILE__).'/upload/'.$a1.'/'.$a5.'/'.$filename;
 //Check if the file with the same name is already exists on the server
      if (!file_exists($newname)) {
$a8=$filename;
//--------------------------
$filename = basename($_FILES['uploaded_file']['name']);
 $newname = dirname(__FILE__).'/upload/'.$a1.'/'.$a5.'/'.$filename;
         
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname);

$result=mysqli_query($con, "INSERT INTO datas (ContractNo,Section,Subject,RefNo,Date,Company,Employee,Document) VALUES ('$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8')"); 
if (!$result) {echo mysqli_error($aa); exit;}

echo "<script language='javascript'>
	alert('A new document is added successfully');
	window.location = 'index.php';
	</script>";
 } else {
         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
      }


} else {
 echo "Error: No file uploaded";
}


mysql_close($con);

}

?> 
</body> 
</html> 
