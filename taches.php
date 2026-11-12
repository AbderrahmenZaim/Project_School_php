<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <title>Gestionnaire de taches</title>
  </head>
  <body>
    <header>
      <h1>Gestionnaire de taches !</h1>
      <h3>
        Ce page vous permet de creer,mettre a jour et supprimer vos taches
      </h3>
    </header>
<?php
session_start();
$creertache = false ;
$supptache=false;
$modifier_taches=false;
$username=$_SESSION["username"];
require_once("DB_connection.php");


if(isset($_POST["creer_tache"])){

    if(trim($_POST["tache_creer"])==""){
          echo'<p class="erreur">Tache est vide , invalide !</p><br/>';
  }
    else{
          $tache_creer=htmlspecialchars($_POST["tache_creer"]);
          $query="insert into taches(tache,username)
          values('$tache_creer','$username')";
          $result=mysqli_query($conn,$query);
          if($result==False)
          echo "<p class='erreur'>erreur de creation de tache</p>";
  }
}

elseif(isset($_POST["supprimer_tache"])){
    $tache_id=(int)$_POST["id"];
    $query_supp="delete from taches
    where username='$username' and id=$tache_id";
    $res_supp=mysqli_query($conn,$query_supp);
    $supptache=true;
    if($res_supp==False)
      echo "<p class='erreur'>erreur de suppression de tache</p>";
}

elseif(isset($_POST["modifier_tache"])){
    $tache_pre= $_SESSION["tache_pre"]; 
    echo "this is $tache_pre<br/>";
    $_SESSION["id_mod"]=$_POST["id_mod"];
    $ido=$_SESSION["id_mod"];
    echo "$ido <br/>";
?>

    <form action="taches.php" method="post">
    Modifier :
      <br/><textarea maxlength="70" name="tache_modifier"><?= $tache_pre?></textarea>
      <br/><input type="submit" name="enregistrer_mod" value="enregistrer"/>
      <br/><input type="submit" name="quitter_tache" value="annuler"/>    
    </form>
<?php 
    if(isset($_POST["enregistrer_mod"]))
      $_SESSION["tache_modifier"]=htmlspecialchars($_POST["tache_modifier"]);
}
elseif(isset($_POST["enregistrer_mod"])){

    $id=$_SESSION["id_mod"];
    $nouv_tache=$_SESSION["tache_modifier"];
    if(trim($nouv_tache)==""){
        echo'<p class="erreur">Tache est vide , invalide !</p><br/>';
  }
    else{
        $query_modifier= "update taches
        set tache ='$nouv_tache'
        where username='$username' and id=$id;" ;  
        $Res=mysqli_query($conn,$query_modifier);
        if($Res==False)
          echo "<p class='erreur'>erreur de modification de tache</p>";
        else 
          echo "<p class='valide'>Tache modifie avec succes</p>";
}}
elseif(isset($_POST["action"])){
    $action=$_POST["action"];
    switch($action){
        case "creer":
          $creertache=true;
          break;

        case "supprimer":
          $supptache=true;
          break;

        case "modifier": 
          $modifier_taches=true;
          break; 

        case "afficher":    

        default :
          echo"Action invalide !";
    }
}
?>

<main>

<form action="taches.php" method="post">
        <input type="submit" name="action" value="creer" />
        <input type="submit" name="action" value="supprimer" />
        <input type="submit" name="action" value="modifier" />
        <input type="submit" name="action" value="afficher"/>
</form>

<?php if($creertache){?>
<form action="taches.php" method="post">
Tache a ajouter :
        <br/><textarea maxlength="70" name="tache_creer"></textarea>
        <br/><input type="submit" name="creer_tache" value="ajouter"/>
</form>
  <p><a href="taches.php"><button>Quitter</button></a></p>
<?php }?>

<?php
if($supptache){?>
Choisir les taches a supprimer :<br/><br/>
<?php
    $query="select tache,id from taches
    where username='$username'";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    foreach($row as $value){ 
  ?>
<form action="taches.php" method="post">
<?= htmlspecialchars($value["tache"])?> 
<input type="hidden" name="id" value=<?= $value["id"]?>/>
<button type="submit" name="supprimer_tache" value="Supprimer"/>supprimer</button><br/><br/>
</form> 
<?php }?>
<?php if (count($row) == 0): ?><p>Aucune tache.</p><?php endif; ?>
    <p><a href="taches.php"><button>Quitter</button></a></p>
<br/>   

<?php }?>

<?php if($modifier_taches){?>

Choisir les taches a modifier :<br/><br/>
<?php
    $query="select tache,id from taches
    where username='$username'";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_all($res,MYSQLI_ASSOC);
    foreach($row as $value){
      $_SESSION["tache_pre"]=htmlspecialchars($value["tache"]); ?>
<form action="taches.php" method="post">    
<?= htmlspecialchars($value["tache"])?> 
<input type="hidden" name="id_mod" value=<?= $value["id"]?>/>
<button type="submit" name="modifier_tache" value="modifier"/>Modifier</button><br/><br/>
</form> <?php }?>
<br/>  <p><a href="taches.php"><button>Quitter</button></a></p>

<?php }?>    
  </main>
  </body>
</html>