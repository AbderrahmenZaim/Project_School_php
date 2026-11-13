<?php
session_start();
if(isset($_POST["login"])){
if(!empty($_POST["username"])){
$_SESSION["username"]=$_POST["username"];
header("Location: create_user.php");
exit();}
else 
    $error = "Username est invalide!";
}
?>

<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Gestionnaire des taches</title>
  </head>
  <body>
    <header>
      <h1><b>Gestionnaire des taches</b></h1>
    </header>
    <main>
      <form action="login.php" method="post">
        Entrer votre nom d'utilisateur : <br />
        <input type="text" name="username" maxlength="20" required /><br/><br/>
        <input type="submit" name="login"  value="Entrer" />
        <p class="warning">Le nom d’utilisateur doit comporter au moins 2 caractères et ne contenir que des caractères alphanumériques.</p>
      </form>
    </main>
  </body>
</html>
<?php
if(isset($error))
echo $error; 
?>