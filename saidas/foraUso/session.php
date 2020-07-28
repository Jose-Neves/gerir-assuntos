<?php
header("Content-Type: text/html; charset=iso-8859-1");
//DATABASE SETTINGS
//$conn= mysqli_connect("localhost", "bigbizzp_root", "bgbz#$1962","bigbizzp_saidas") or die(mysqli_error());
$conn= mysqli_connect("localhost", "root", "","bigbizz_saidas") or die(mysqli_error());
//DATABASE SETTINGS
session_start();
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn,"select usertbl_nome,usertbl_acesso from bgbztbl_user where usertbl_nome='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
echo $login_session =$row['usertbl_nome'];
$_SESSION['login_acesso']=$row['usertbl_acesso'];

if(!isset($login_session)){
        mysqli_close($conn); // Closing link
        header('Location: ./index.php'); // Redirecting To Home Page
    }
?>