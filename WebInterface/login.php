<?php
session_start();
if(isset($_POST['username'])){ 
  $dberror="Failure";


  $db=mysql_connect("localhost","websiteData","ronjonjo") or die ($dberror);
  mysql_select_db("sensor_data",$db)or die($dberror);

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);
  $sql="SELECT * FROM Members WHERE People='$username' and SecuredAccess='$password'";
  $result=mysql_query($sql);

  $count=mysql_num_rows($result);

  if($count == 1){
	$_SESSION["logged"] = "true";
	header("location: index.php");}

  else{
    $_SESSION["logged"] = "false";
    header("location: loginpage.html");

    echo "Wrong Username or Password";
}


}


else{
    $_SESSION["logged"] = "false";
    header("location: loginpage.html");

    echo "Wrong Username or Password";
}
?>
