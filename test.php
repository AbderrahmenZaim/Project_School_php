<?php
session_start();
$username=$_SESSION["username"];
$new="gyro";
require_once("DB_connection.php");
$query="select * from taches " ;
$res=mysqli_query($conn,$query);
$ligne=mysqli_fetch_all($res,MYSQLI_ASSOC);

if (isset($_POST["submit"])){
  foreach($ligne as $li){
  echo $li["tache"]."-".$li["id"]."<br/>";}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body><form method="post" action="test.php">
  <textarea>value here </textarea>
  <input type="submit" value="submit" name="submit">
  <input type="button" value="annuler" onclick="location.reload()"/></form>
</body>
</html>