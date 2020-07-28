<?php
echo 'Ol&aacute; ';
include('session.php');
echo $_SESSION['login_acesso'];
?>

<html>
<head> 
<title>Ver Sa&iacute;das</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 

<body>
<h1>Sa&iacute;das</h1>

<?php
header("Content-Type: text/html; charset=iso-8859-1");
//DATABASE SETTINGS
//$conn= mysqli_connect("localhost", "bigbizzp_root", "bgbz#$1962","bigbizzp_saidas") or die(mysqli_error());
$conn= mysqli_connect("localhost", "root", "","bigbizz_saidas") or die(mysqli_error());
//DATABASE SETTINGS
$dataDia='00';
//echo '</br>';
//GET DATA
$sql = "SELECT * FROM `bgbztbl_saidas` WHERE `saidatbl_apagada` = 'n' ORDER BY `bgbztbl_saidas`.`saidatbl_dataHora` ASC";
$result = mysqli_query($conn,$sql) or die(mysqli_error());

//LOOP TABLE ROWS
	while($row = mysqli_fetch_array($result)){
		if ($dataDia<>substr ( $row['saidatbl_dataHora'] , 6, 2 )) echo '----------------------------------------</br>';
		echo "<b>Data:</b> ";
		//echo $row['saidatbl_dataHora'];
		$dataAno = substr ( $row['saidatbl_dataHora'] , 0, 4 );
		$dataMes = substr ( $row['saidatbl_dataHora'] , 4, 2 );
		$dataDia = substr ( $row['saidatbl_dataHora'] , 6, 2 );
		echo $dataAno,'/'.$dataMes.'/'.$dataDia.' <b>Hora:</b>';
		$dataHora = substr ( $row['saidatbl_dataHora'] , 8, 2 );
		$dataMin = substr ( $row['saidatbl_dataHora'] , 10, 2 );
		echo $dataHora.':'.$dataMin.' ';
		$diaSemana = date("D", mktime(0, 0, 0, $dataMes, $dataDia, $dataAno));
		if ($diaSemana == 'Mon') echo "Seg";
		if ($diaSemana == 'Tue') echo "Ter";
		if ($diaSemana == 'Wed') echo "Qua";
		if ($diaSemana == 'Thu') echo "Qui";
		if ($diaSemana == 'Fri') echo "Sex";
		if ($diaSemana == 'Sat') echo "Sab";
		if ($diaSemana == 'Sun') echo "Dom";
		echo "</br>";
		echo "Morada: ";
		echo $row['saidatbl_morada'];
		echo "</br>";
		echo "Observ.: ";
		echo $row['saidatbl_observ'];
		echo "</br>";
		echo "Marcado Por: ";
		echo $row['saidatbl_marcadoPor'];
		echo "</br>";
		echo "</br>";
	}

?>

    <p>
        <h2><a href="inicio.php">Sair</a></h2>
    </p>

</body>
</html>