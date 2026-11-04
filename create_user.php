<?php
session_start();
if(empty($_SESSION["username"])){
    echo"username required";
    header("Location: login.php");   
    exit; 
}

$username=trim($_SESSION["username"]);
if($username!=""){
require_once("DB_connection.php");
$query="insert into utilisateur
value('$username')";
$Res=mysqli_query($conn,$query); 
if($Res!=false){
echo "user created successefuly<br/>";  
header("Location: taches.php");
exit;
}
else {
echo"user not created<br/>";    
header("Location: login.php");
exit;  }  
}
else{
echo"user not created due to invalid username<br/>";    
header("Location: login.php");
exit; 
}
?>
