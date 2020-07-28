<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "NomeUtilizador or PasswordUtilizador invalidos";
}
else
{
// Define $username and $password
$nomeUtilizador=$_POST['username'];
$passwordUtilizador=$_POST['password'];
header("Content-Type: text/html; charset=iso-8859-1");
//DATABASE SETTINGS
 $link=mysql_connect("localhost", "bibbizzp_root", "root1962BBZ*") or die(mysql_error());
 mysql_select_db("bibbizzp_saidas",$link) or die(mysql_error());
//DATABASE SETTINGS

$nomeUtilizador = stripslashes($username);
$passwordUtilizador = stripslashes($password);
$nomeUtilizador = mysql_real_escape_string($nomeUtilizador);
$passwordUtilizador = mysql_real_escape_string($passwordUtilizador);

$query = mysql_query("select * from bgbztbl_user where 
        usertbl_passw='$passwordUtilizador' AND 
        usertbl_nome='$nomeUtilizador' AND 
        usertbl_act ='s'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$nomeUtilizador; // Initializing Session
header("location: inicio.php"); // Redirecting To Other Page
} else {
$error = "NomeUtilizador2 ou PasswordUtilizador2 invalidos";
}
mysql_close($link); // Closing Connection
}
}
?>