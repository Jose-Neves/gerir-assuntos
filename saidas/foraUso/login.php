<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "NomeUtilizadorVz ou PasswordUtilizadorVz invalidos";
	}
	else
		{
		// Define $username and $password
		$nomeUtilizador=$_POST['username'];
		$passwordUtilizador=$_POST['password'];
		//$sistOp=$_POST['sist_op'];
		header("Content-Type: text/html; charset=iso-8859-1");
		//DATABASE SETTINGS
		//$conn= mysqli_connect("localhost", "bigbizzp_root", "root1962BBZ*","bigbizzp_saidas") or die(mysqli_error());
		//$conn= mysqli_connect("localhost", "bigbizzp_root", "bgbz#$1962","bigbizzp_saidas") or die(mysqli_error());
		$conn= mysqli_connect("localhost", "root", "","bigbizz_saidas") or die(mysqli_error());
		//mysqli_select_db($conn,) or die(mysql_error());
		//DATABASE SETTINGS

		$nomeUtilizador = stripslashes($nomeUtilizador);
		$passwordUtilizador = stripslashes($passwordUtilizador);
		$nomeUtilizador = mysqli_real_escape_string($conn,$nomeUtilizador);
		$passwordUtilizador = mysqli_real_escape_string($conn,$passwordUtilizador);
	
		$query = "select * from bgbztbl_user where usertbl_passw='$passwordUtilizador' AND usertbl_nome='$nomeUtilizador' AND usertbl_act ='s'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_num_rows($result);

		if ($row > 0) {
			$_SESSION['login_user']=$nomeUtilizador; // Initializing Session
			$_SESSION['login_passw']=$passwordUtilizador;
			$_SESSION['login_ecran']=$sistOp;
			header("location: inicio.php"); // Redirecting To Other Page
		} else {
			$error = "NomeUtilizador2 ou PasswordUtilizador2 invalidos";
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>