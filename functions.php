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

        //var_dump("Je rentre dans ma fonction");
        global $conn;
        $query="INSERT INTO user VALUES (NULL,?,?,?);";
        // $result=mysqli_query($conn, $query);

        //var_dump($query);
        //var_dump($conn);
        $stmt = mysqli_prepare($conn,$query);
        //var_dump($stmt);
        if ($stmt = mysqli_prepare($conn,$query)) {
            var_dump("je suis dans mon if");
            /* Lecture des marqueurs */
            mysqli_stmt_bind_param($stmt,"sss",$data['user_name'],$data['email'],$data['pwd']);
        
            /* Exécution de la requête */
            $result=mysqli_stmt_execute($stmt);
            var_dump($result);
        };
        return $data;
  }
  function updateUser($data){
    global $conn;
    $query="UPDATE user SET user_name=?,email=?,password=? where id=?";
    if($stmt=mysqli_prepare($conn,$query)){

        //lecture des marqueurs
        mysqli_stmt_bind_param($stmt,"sssi", $data["user_name"], $data["email"], $data["password"],$data["id"]);
        
        //EXECUTION DE LA REQUETE
        $result=mysqli_stmt_execute($stmt); 
        echo"<br><br>";
        echo"coucou je suis change ";
        echo"<br><br>";
        var_dump($result);
        return $result;
    }};
    function deleteUser($id){
        global $conn;
        $query= "DELETE from  user where id=?";
        if($stmt=mysqli_prepare($conn,$query)){

            //lecture des marqueurs
            mysqli_stmt_bind_param($stmt,"i",$id);
            
            //EXECUTION DE LA REQUETE
            $result=mysqli_stmt_execute($stmt); 
            echo"<br><br>";
            echo"coucou je suis supprime ";
            echo"<br><br>";
            var_dump($result);
            return $result;
        }};
?>