

<?php
function connection(){
return mysqli_connect("localhost","root","","project");
}





if(!(connection()==false)){
if(create_user()!=-1){
if($_SERVER['REQUEST_METHOD'] ==='POST'){



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