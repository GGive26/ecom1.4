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

//recuperer une ligne dans user 
$result1=mysqli_query($conn,"SELECT * FROM user WHERE id=2");
//avec un tableau indexer
$data1=mysqli_fetch_row($result1);

echo"<br>";
echo"Premier fetch";
echo"<br>";
echo"<br>";
var_dump($result1);
echo"<br>";
echo"<br>";
var_dump($data1);

//recuperer une ligne dans user 
$result2=mysqli_query($conn,"SELECT * FROM user WHERE id=1");
//avec fetch tableau associatif
$data2=mysqli_fetch_assoc($result2);

echo"<br>";
echo"second fetch";
echo"<br>";
echo"<br>";
echo"<br>";
var_dump($result2);
echo"<br>";
echo"<br>";
var_dump($data2);

//recuperer une seule ligne mais en choisissant l'ordre des colonnes 
$result3=mysqli_query($conn,"SELECT user_name,email,id  FROM user WHERE id=1");

$data3=mysqli_fetch_assoc($result3);

echo"<br>";
echo"troisieme fetch";
echo"<br>";
echo"<br>";
echo"<br>";
var_dump($result3);
echo"<br>";
echo"<br>";
var_dump($data3);


?>