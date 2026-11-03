<?php
session_start();
echo $_SESSION["username"];
if(empty($_SESSION["username"])){
    echo"username required";
    header("Location: login.php");   
    exit; 
}

$username=trim($_SESSION["username"]);
if($username!=""){
$conn=mysqli_connect("localhost","root","","project");
if(!($conn==False)){
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
}}


?>
