<?php
echo 'Ol&aacute; ';
include('session.php');
/* echo '</br>';
echo $_SESSION['login_user'];
echo '</br>'; */
$indiceAlterado=$_REQUEST['indiceSaida'];
?>
<HTML>

<script language="javascript">
function testardados() 
{
	if ((Registo.DataAno.value == "" || Registo.DataAno.value == " ") ||
	   (Registo.DataMes.value == "" || Registo.DataMes.value == " ") ||
	   (Registo.DataDia.value == "" || Registo.DataDia.value == " ") ||
	   (Registo.DataHora.value == "" || Registo.DataHora.value == " ") ||
	   (Registo.DataMin.value == "" || Registo.DataMin.value == " ") ||
	   (Registo.morada.value =="") ||(Registo.morada.value ==""))
	   alert ("Os campos: Data, Hora e Morada N&Atilde;O PODEM ESTAR VAZIOS")
	else
		Registo.submit();
}	
</script>

<HEAD>
      <META http-equiv=Content-Type content="text/html; charset=unicode">
      <TITLE>:.: Sa&iacute;das :.:</TITLE>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</HEAD>
<BODY>
<h1>Alterar Sa&iacute;da</h1>
<?php

//DATABASE SETTINGS
//$conn= mysqli_connect("localhost", "bigbizzp_root", "bgbz#$1962","bigbizzp_saidas") or die(mysqli_error());
$conn= mysqli_connect("localhost", "root", "","bigbizz_saidas") or die(mysqli_error());
//DATABASE SETTINGS

$sql = "SELECT * FROM `bgbztbl_saidas` WHERE `saidatbl_id`= ".$indiceAlterado;
$result = mysqli_query($conn,$sql) or die(mysqli_error());
$row = mysqli_fetch_array($result);
$morada=$row['saidatbl_morada'];
$observ=$row['saidatbl_observ'];
$marcadaPor=$row['saidatbl_marcadoPor'];

?>

<form name="Registo" method="POST" action="alteraSaida02.php">
<input type="hidden" name="indiceAlterado" value="<?php echo $indiceAlterado; ?>">

<table>
	<tr>
		<td>
			Data:<?php echo substr ( $row['saidatbl_dataHora'] , 0, 4 );?>
			/<?php echo substr ( $row['saidatbl_dataHora'] , 4, 2 );?>
			/<?php echo substr ( $row['saidatbl_dataHora'] , 6, 2 );?>
			&nbsp; Hora:<?php echo substr ( $row['saidatbl_dataHora'] , 8, 2 );?>
			:<?php echo substr ( $row['saidatbl_dataHora'] , 10, 2 );?>
		</td>
		<td>
			Data:<input type="text" size="2" maxlength="4" name="DataAno" value="<?php echo substr ( $row['saidatbl_dataHora'] , 0, 4 ); ?>" autofocus>
			/<input type="text" size="1" maxlength="2" name="DataMes" value="<?php echo substr ( $row['saidatbl_dataHora'] , 4, 2 ); ?>">
			/<input type="text" size="1" maxlength="2" name="DataDia" value="<?php echo substr ( $row['saidatbl_dataHora'] , 6, 2 ); ?>">
			Hora:<input type="text" size="1" maxlength="2" name="DataHora" value="<?php echo substr ( $row['saidatbl_dataHora'] , 8, 2 ); ?>">
			:<input type="text" size="1" maxlength="2" name="DataMin" value="<?php echo substr ( $row['saidatbl_dataHora'] , 10, 2 ); ?>">
		</td>
	</tr>
	<tr>
		<td>
			Morada:<textarea cols="30" rows="2" readonly> <?php echo $morada; ?></textarea>
		</td>
		<td>
			<textarea name="morada" cols="40" rows="2"> <?php echo $morada; ?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Observ:<textarea cols="30" rows="2" readonly> <?php echo $observ; ?></textarea>
		</td>
		<td>
			<textarea name="observ" cols="40" rows="2"> <?php echo $observ; ?></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Marcada Por: <?php echo $marcadaPor;?>
		</td>
		<td>
			Alterada por : <input type="text" size="10" name="marcadaPor" value="<?php echo $_SESSION['login_user']; ?>" readonly>
		</td>
	</tr>

</table>

<INPUT type="button" value="Gravar" onclick="testardados()">
</form>

	<p>
		<h2><a href="index.php">Sair</a></h2>
	</p>
</BODY>
</HTML>
