<?php
$toto = 4;
function showData($title,$data){
    echo"<br>";
    echo"<h2>".$title."</h2>";
    
    var_dump($data);
    }

function selectUserByIndex($id){
    //recuperer une ligne dans user
    global $conn;
    $result=mysqli_query($conn,"SELECT * FROM user WHERE id=".$id);

    //avecfetch rows : un tableau indexer
$data=mysqli_fetch_row($result);

return $data;
}
function selectUserByAssoc($id){
   //recuperer une ligne dans user
    global $conn;
    $result=mysqli_query($conn,"SELECT * FROM user WHERE id=".$id);
    
    //avec fetch rows : un tableau associatif
 $data=mysqli_fetch_assoc($result);

 return $data;
}
// function selectUserByAssocOrder($id){
//     //recuperer une ligne dans user
//     global $conn;
//     $result2=mysqli_query($conn,"SELECT user_name,email,id  FROM user WHERE id=".$id);

//     //avec fetch rows assoc dans l'ordre user_name,email,id
// $data2=mysqli_fetch_assoc($result2);

// return $data2;
// }
function getAllUserAssoc(){
    global $conn;
    $result=mysqli_query($conn,"SELECT * FROM user");
    $data=[];
     $i=0;
    while($rangeData = mysqli_fetch_assoc($result)){
    $data[$i] = $rangeData;
    $i++;  

};
        return $data;
}
function getAllUserIndex(){
    global $conn;
    $result=mysqli_query($conn,"SELECT * FROM user");
    $data=[];
     $i=0;
    while($rangeData = mysqli_fetch_row($result)){
    $data[$i] = $rangeData;
    $i++;  
    };
    return $data;
    }

    function createUser($data) {
        global $conn;
        $query="INSERT INTO 'user' ('id', 'user_name', 'email', 'password') VALUES (NULL,?,?,?);";
        $result=mysqli_query($conn, $query);


        if ($stmt = mysqli_prepare($conn,$query)) {

            /* Lecture des marqueurs */
            mysqli_stmt_bind_param($stmt,"s",$data['user_name']);
            mysqli_stmt_bind_param($stmt,"s",$data['email']);
            mysqli_stmt_bind_param($stmt,"s",$data['pwd']);
        
            /* Exécution de la requête */
            $result=mysqli_stmt_execute($stmt);

            var_dump($result);
        
            /* Récupération des valeurs */
            //mysqli_stmt_fetch($stmt);
        
            /* Fermeture du traitement */
            //mysqli_stmt_close($stmt);
        }

    }
?>