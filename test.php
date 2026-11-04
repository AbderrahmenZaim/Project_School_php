<?php
session_start();
$username=$_SESSION["username"];
$new="gyro";
$conn=mysqli_connect("localhost","root","","project");
$query="select * from taches " ;
$res=mysqli_query($conn,$query);
$ligne=mysqli_fetch_all($res,MYSQLI_ASSOC);
foreach($ligne as $li){
  echo $li["tache"]."-".$li["id"]."<br/>";}

?>