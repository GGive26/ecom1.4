<?php 
$server='localhost';
$username="root";
$pwd="";
$db="ecom1";

$conn=mysqli_connect($server,$username,$pwd,$db);
if($conn){
    echo"connected to the $db database successfully";
    global $conn;
}else {
    echo"ERROR : Not connected to the $db database";
}



?>