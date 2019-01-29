<?php
include "connection.php";
if (isset($_GET['id'])) {
    $id1 = $_GET['id'];
    $sql = "DELETE FROM datas WHERE id = $id1" ;
    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
        echo "<script language='javascript'>
        alert('Deleted');
        window.location = 'index.php';
        </script>";
    } else {
    echo "Error deleting record: " . $con->error;
    }
} else {
    echo "no such file in the attachemnts"; exit();}
    mysqli_close($con);
?> 

