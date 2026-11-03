<?php
session_start();
$creertache = false ;
$username=$_SESSION["username"];
$conn=mysqli_connect("localhost","root","","project");
$_SESSION["connection"]=$conn;

function creerTache(){

if(isset($_POST["ajouter"]) and trim($_POST["tache_creer"]," ")!=""){
$connection=$_SESSION["conncection"];
$username=$_SESSION["username"];
$tache_creer=$_POST["tache_creer"];
$query="insert into taches(tache,username)
values('$tache_creer','$username')";
$result=mysqli_query($connection,$query);

if(!($result==False))
echo"Tache creer !";
else
echo "erreur de creation de tache";
}
}

if(isset($_POST["action"])){
$action=$_POST["action"];
switch($action){
    case "creer":
        creerTache();
        echo"i am here ";
        break;
    default :
    echo"pas cree !";
}
}
?>

<html lang="fr">
  <head>
    <meta charset="utf-8" />
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
<form action="taches.php" method="post">
        <input type="submit" name="action" value="creer" />
        <input type="submit" name="action" value="supp" />
        <input type="submit" name="action" value="jour" />
        <input type="submit" name="action" value="afficher"/>
</form>
<?php ?>
<form action="taches.php" method="post">
Tache a ajouter :
        <br/><input type="text" name="tache_creer"/>
        <br/><input type="submit" name="ajouter" value="ajouter"/>
        <br/><input type="reset" name="reset" value="annuler"/>    
</form>

    </main>
  </body>
</html>

