<html lang="fr">
  <head>
    <meta charset="utf_8" />
    <link rel="stylesheet" href="style.css" />
    <title>Gestionnaire de taches</title>
  </head>
  <body>
    <header>
      <h1><b>Gestioannaire de taches !</b></h1>
      <h3>
        Ce page vous permet de creer,mettre a jour et supprimer vos taches
      </h3>
    </header>
    <main>
      <form action="traitement.php" method="post">
        <input type="submit" name="action" value="creer" />
        <input type="submit" name="action" value="supp" />
        <input type="submit" name="action" value="jour" />
        <input type="submit" name="action" value="afficher"/>
      </form>
    </main>
  </body>
</html>


<?php
function connection(){
return mysqli_connect("localhost","root","","project");
}

function create_user(){
  $username=$_POST["username"];
  if($username!=""){
  $conn=connection();
  if(!($conn==False)){
     $query="insert into utilisateur
              value('$username')";
     $Res=mysqli_query($conn,$query); 
     if($Res!=false)
      echo "user created successefuly";  
    else 
    echo"connection invalid<br/>";      
  }}
  else 
    return -1;
  

}

function creerTache(){
?> 
<form action="traitement.php" method="post">
Tache a ajouter :<br/><input type="text" name="tache_creer"></input>
<br/><input type="submit" value="ajouter"/>    
</form>

<?php 
$username=$_POST["username"];
$tache_creer=$_POST["tache_creer"];
$query="insert into taches(tache,username)
values($tache_creer,$username)";
$result=mysqli_query(connection(),$query);

if(!($result==False))
  echo"Tache creer !";
else
  echo "erreur";
}
if(!(connection()==false)){

if($_SERVER['REQUEST_METHOD'] ==='POST'){
if(create_user()!=-1){


if(isset($_POST["action"])){
$action=$_POST["action"];
switch($action){
  case 'creer':
    creerTache();
    break ;
    default: echo"invalid";
}

}
}
else 
  echo "user not created";
}
}
else 
  echo "connection invalid";
?>