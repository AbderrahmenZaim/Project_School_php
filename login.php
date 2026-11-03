<?php
session_start();
?>
<html lang="fr">
  <head>
    <meta charset="utf_8" />
    <link rel="stylesheet" href="style.css" />
    <title>Gestionnaire des taches</title>
  </head>
  <body>
    <header>
      <h1><b>Gestioannaire des taches !</b></h1>
    </header>
    <main>
      <form action="traitement.php" method="post">
        Enter your username : <br />
        <input type="text" name="username" required />
        <input type="submit" name="login"  value="login" />
      </form>
    </main>
  </body>
</html>
<?php
if(isset($_POST["login"])){
if(!empty($_SESSION["username"]))
$_SESSION["username"]=$_POST["username"];
header("Location: ");
}
else 
    echo"username required";
?>