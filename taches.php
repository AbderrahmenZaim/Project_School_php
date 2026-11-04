<?php
session_start();
$creertache = false ;
$supptache=false;
$update_tache=false;
$username=$_SESSION["username"];
$conn=mysqli_connect("localhost","root","","project");
 
if(isset($_POST["ajouter_tache"])){

if(isset($_POST["ajouter_tache"])){
if(trim($_POST["tache_creer"]," ")==""){
    echo"Tache est vide , invalide !";
    $creertache=false;
}
else{
$username=$_SESSION["username"];
$tache_creer=$_POST["tache_creer"];
$query="insert into taches(tache,username)
values('$tache_creer','$username')";
$result=mysqli_query($conn,$query);

if($result==False)
echo "erreur de creation de tache";

}
}}

elseif(isset($_POST["supp_tache"])){

}

elseif(isset($_POST["action"])){
$action=$_POST["action"];
switch($action){
    case "creer":
        $creertache=true;
        break;
    case "supprimer":
        $supptache=true;
        break;
    case "mise_a_jour": 
        $update_tache=true;
        break; 
    case "afficher":    

    default :
    echo"Action invalide !";
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
        <input type="submit" name="action" value="supprimer" />
        <input type="submit" name="action" value="mise_a_jour" />
        <input type="submit" name="action" value="afficher"/>
</form>
<?php if($creertache){?>
<form action="taches.php" method="post">
Tache a ajouter :
        <br/><input type="text" name="tache_creer"/>
        <br/><input type="submit" name="ajouter_tache" value="ajouter"/>
        <br/><input type="reset" value="annuler"/>    
</form>
<?php }?>
<?php if($supptache){
     $query_supp="select tache from taches
     where username='$username'";
     $res=mysqli_query($conn,$query_supp);
     $indice = 1;
     while($row=mysqli_fetch_array($res)){
     echo $indice.".".$row["tache"]."<br/>";
     $indice++;
     }

    ?>
<form action="taches.php" method="post">
Ecrire le nombre de Tache a supprimer :
        <br/><input type="text" name="tache_supp"/>
        <br/><input type="submit" name="supp_tache" value="supprimer"/>
        <br/><input type="reset" value="annuler"/>    
</form>
<?php }?>
    </main>
  </body>
</html>

