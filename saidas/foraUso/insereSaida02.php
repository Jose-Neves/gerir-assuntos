<?php 
echo 'Ol&aacute; ';
include('session.php');
echo '</br>';echo '</br>';
?>

<html>
<script>
	function carregar()
	{
		window.location="inicio.php";
	}
</SCRIPT>

<HEAD>
      <META http-equiv=Content-Type content="text/html; charset=unicode">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <TITLE>:.: Sa&iacute;das :.:</TITLE>
</HEAD>
<BODY>
<h1>Marcar Sa&iacute;da</h1>

<?php
	echo $DataHora=date("YmdHi");
	echo '</br>';
	echo $DataHoraGravar=$_POST['DataAno'].$_POST['DataMes'].$_POST['DataDia'].$_POST['DataHora'].$_POST['DataMin'];
	echo '</br>';
	if ($_POST['DataMes'] > '12') $_POST['DataMes']='12';
	if ($_POST['DataMes'] == '0') $_POST['DataMes']='01';
	if ($_POST['DataMes'] == '1') $_POST['DataMes']='01';
	if ($_POST['DataMes'] == '2') $_POST['DataMes']='02';
	if ($_POST['DataMes'] == '3') $_POST['DataMes']='03';
	if ($_POST['DataMes'] == '4') $_POST['DataMes']='04';
	if ($_POST['DataMes'] == '5') $_POST['DataMes']='05';
	if ($_POST['DataMes'] == '6') $_POST['DataMes']='06';
	if ($_POST['DataMes'] == '7') $_POST['DataMes']='07';
	if ($_POST['DataMes'] == '8') $_POST['DataMes']='08';
	if ($_POST['DataMes'] == '9') $_POST['DataMes']='09';
	if ($_POST['DataDia'] > '31') $_POST['DataDia']='31';
	if ($_POST['DataDia'] == '0') $_POST['DataDia']='01';
	if ($_POST['DataDia'] == '1') $_POST['DataDia']='01';
	if ($_POST['DataDia'] == '2') $_POST['DataDia']='02';
	if ($_POST['DataDia'] == '3') $_POST['DataDia']='03';
	if ($_POST['DataDia'] == '4') $_POST['DataDia']='04';
	if ($_POST['DataDia'] == '5') $_POST['DataDia']='05';
	if ($_POST['DataDia'] == '6') $_POST['DataDia']='06';
	if ($_POST['DataDia'] == '7') $_POST['DataDia']='07';
	if ($_POST['DataDia'] == '8') $_POST['DataDia']='08';
	if ($_POST['DataDia'] == '9') $_POST['DataDia']='09';
	if ($_POST['DataHora'] > '24') $_POST['DataHora']='24';
	if ($_POST['DataHora'] == '0') $_POST['DataHora']='01';
	if ($_POST['DataHora'] == '1') $_POST['DataHora']='01';
	if ($_POST['DataHora'] == '3') $_POST['DataHora']='03';
	if ($_POST['DataHora'] == '4') $_POST['DataHora']='04';
	if ($_POST['DataHora'] == '5') $_POST['DataHora']='05';
	if ($_POST['DataHora'] == '6') $_POST['DataHora']='06';
	if ($_POST['DataHora'] == '7') $_POST['DataHora']='07';
	if ($_POST['DataHora'] == '8') $_POST['DataHora']='08';
	if ($_POST['DataHora'] == '9') $_POST['DataHora']='09';
	if ($_POST['DataMin'] > '60') $_POST['DataMin']='60';
	if ($_POST['DataMin'] == '0') $_POST['DataMin']='00';
	if ($_POST['DataMin'] == '1') $_POST['DataMin']='01';
	if ($_POST['DataMin'] == '2') $_POST['DataMin']='02';
	if ($_POST['DataMin'] == '3') $_POST['DataMin']='03';
	if ($_POST['DataMin'] == '4') $_POST['DataMin']='04';
	if ($_POST['DataMin'] == '5') $_POST['DataMin']='05';
	if ($_POST['DataMin'] == '6') $_POST['DataMin']='06';
	if ($_POST['DataMin'] == '7') $_POST['DataMin']='07';
	if ($_POST['DataMin'] == '8') $_POST['DataMin']='08';
	if ($_POST['DataMin'] == '9') $_POST['DataMin']='09';
	echo $DataHoraGravar=$_POST['DataAno'].$_POST['DataMes'].$_POST['DataDia'].$_POST['DataHora'].$_POST['DataMin'];
	$Morada = $_POST['Morada'];
	$Observ = $_POST['Observ'];
	$MarcadoPor = $_POST['MarcadoPor'];
	echo '</br>';echo '</br>';
	if ($DataHoraGravar<$DataHora){
		print "<h2>N�o se pode marcar sa&iacute;das para dias anteriores</h2>";
		//echo '<script>setTimeout("carregar()",5000)</script>';
	}
	else {
		//DATABASE SETTINGS
		//$conn= mysqli_connect("localhost", "bigbizzp_root", "bgbz#$1962","bigbizzp_saidas") or die(mysqli_error());
		$conn= mysqli_connect("localhost", "root", "","bigbizz_saidas") or die(mysqli_error());
		//DATABASE SETTINGS
		$queryRegSaidas = "insert into bgbztbl_saidas(saidatbl_id,saidatbl_dataHora,saidatbl_morada,saidatbl_observ,saidatbl_marcadoPor,saidatbl_apagada)
			values('','".$DataHoraGravar."','".$Morada."','".$Observ."','".$MarcadoPor."','n')";
		//echo $queryRegSaidas;
		$grava = mysqli_query($conn,$queryRegSaidas);
		echo ("Registo de Sa&iacute;da gravado com sucesso");
	}
?>
<p>
	<h2><a href="inicio.php">Sair</a></h2>
</p>

</html>