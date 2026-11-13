<?php
session_start();
$_SESSION["invalid"]=False;
if(empty($_SESSION["username"]) || !preg_match("/^[[:alpha:]][[:alnum:]]{2,70}/",$_SESSION["username"])){
    header("Location: login.php");   
    exit; 
}

$username=trim($_SESSION["username"]);
if($username!=""){
require_once("DB_connection.php");
$query="insert ignore into utilisateur
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
?>
