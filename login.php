
<?php
session_start();
if(isset($_POST["login"])){
if(!empty($_POST["username"])){
$_SESSION["username"]=$_POST["username"];
header("Location: create_user.php");
exit();}
else 
    $error = "Username is required!";
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
      <h1><b>Gestioannaire des taches !</b></h1>
    </header>
    <main>
      <form action="login.php" method="post">
        Enter your username : <br />
        <input type="text" name="username" maxlength="20" required />
        <input type="submit" name="login"  value="login" />
      </form>
    </main>
  </body>
</html>
<?php
if(isset($error))
echo $error; 
?>
