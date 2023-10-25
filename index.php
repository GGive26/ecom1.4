<?php 
require_once ("functions.php");
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
// $result1=mysqli_query($conn,"SELECT * FROM user WHERE id=2");
// //avec un tableau indexer
// $data1=mysqli_fetch_row($result1);

$data1 = selectUserByIndex(2);

// echo"<br>";
// echo"Premier fetch";
// echo"<br>";
// echo"<br>";
// //var_dump($result1);
// echo"<br>";
// echo"<br>";
//showData("premier fetch",$data1);


// //recuperer une ligne dans user 
// $result2=mysqli_query($conn,"SELECT * FROM user WHERE id=1");
// //avec fetch tableau associatif
 $data2= selectUserByAssoc(1);

// echo"<br>";
// echo"second fetch";
// echo"<br>";
// echo"<br>";
// echo"<br>";
// //var_dump($result2);
// echo"<br>";
// echo"<br>";
// var_dump($data2);
//showData("second fetch",$data2);


// recuperer toutes les lignes de la table user

//avec fetch assoc
// $result4=mysqli_query($conn,"SELECT user_name,email,id FROM user");

// $data4=[];
// $i=0;
// while($rangeData = mysqli_fetch_assoc($result4)){
//     $data4[$i] = $rangeData;
//     $i++;  

//     echo"<br>";
//     echo"<br>";
//     echo "Nom de l'usager :".$rangeData["user_name"]."<br>";
//     echo"Courriel: ".$rangeData["email"]."<br>";
// };
 $data4=getAllUserAssoc();

 //showData("quatrieme fetch",$data4);
echo"<ul>";
 foreach($data4 as $key =>$value){
?>
<li>L'utulisateur se nomme : <?php echo $value['user_name']; ?>.son Id est :<?php echo $value['id'] ; ?>.
 son email est : <?php echo $value['email'] ; ?>.</li>
 <?php

 }
echo"</ul>";
//     echo"<br><br>";
//     echo"Quatrieme fetch";
//     echo"<br><br>";
//     //echo"Mon array aura : ".mysqli_num_rows($result4)."lignes.";
//     echo"<br><br>";
//    // var_dump($result4);
//     echo"<br><br>";
//     var_dump($data4);

    //avec fetch row
    $data6=getAllUserIndex();

    //showData("sixieme fetch",$data6);
    echo"<ul>";
 foreach($data6 as $key =>$value){
?>
<li>L'utulisateur se nomme : <?php echo $value[1]; ?>.son Id est :<?php echo $value[0] ; ?>.
 son email est : <?php echo $value[2] ; ?>.</li>
 <?php

 }
echo"</ul>";

//     $data6 = [];
//     $i=0;
//     while ($rangeData = mysqli_fetch_row($result6)){
//         $data6[$id] = $rangeData;    
//         $i++;

//         echo"<br>";
//         echo"<br>";
//         echo "Nom de l'usager :".$rangeData[1]."<br>";
//         echo"Courriel: ".$rangeData[2]."<br>";

//     };

//     echo"<br><br>";
//     echo"Cinquieme fetch";
//     echo"<br><br>";
//     echo"Mon array aura : ".mysqli_num_rows($result6)."lignes.";
//     echo"<br><br>";
//     var_dump($result6);
//     echo"<br><br>";
//     var_dump($data6);
// les donnees pourrais venir de $_POST['email']
$data7=[
    "user_name"=> "michel",
    "email"=> "michel@michel.ca",
    "pwd"=> ""
];

$newUser=createUser($data7);

 ?>