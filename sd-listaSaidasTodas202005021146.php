<?php
/**
 * Tutorial: PHP Login Registration system
 * Page : Profile
 */
 
// Start Session
session_start();
 
// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}
 
// Database connection
require_once 'database.php';
//$db = DB();
// Application library ( with DemoLib class )
require_once 'library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$nome=$user->nome;

?>

<!doctype html>
<html lang="pt">

<head>
	<link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">	
	<meta charset="UTF-8">
	<title>Ver Sa&iacute;das</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 

<body>

<div>
    <img src="./bigbizz_newLogo.png" alt="Bigbizz" height="160" width="300">
    </br>
    <?php
        //echo $_SESSION['user_id']; echo "</br>";
        echo date("Y/m/d H:i")." - ";
        echo $nome; echo "</br>";
    ?>
	<h1>Lista Sa&iacute;das</h1>

<?php
//header("Content-Type: text/html; charset=iso-8859-1");
$dataHoje='000000000000';
$saidasListar = $app->saidasDetailsListarTodas($dataHoje); // get saidas details
$dataDia='00';

//LOOP TABLE ROWS
foreach ($saidasListar as $row){
	if ($dataDia<>substr ( $row['datahora_sd'] , 6, 2 )) {
		echo '--------------------------------------------------</br>';
		}
		echo "Data de inser&ccedil;&atilde;o: ". $row['dataHoraIns_sd'] . "</br>";
		echo "<b>Data:</b> ";
		$dataAno = substr ( $row['datahora_sd'] , 0, 4 );
		$dataMes = substr ( $row['datahora_sd'] , 4, 2 );
		$dataDia = substr ( $row['datahora_sd'] , 6, 2 );
		echo $dataAno,'/'.$dataMes.'/'.$dataDia.' <b>Hora:</b>';
		$dataHora = substr ( $row['datahora_sd'] , 8, 2 );
		$dataMin = substr ( $row['datahora_sd'] , 10, 2 );
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
		echo $row['morada_sd'];
		echo "</br>";
		echo "Observ.: ";
		echo $row['observ_sd'];
		echo "</br>";
		echo "&Uacute;ltimo: ";
		echo $row['marcadoPor_sd'];
		if ($row['apagada_sd'] == '1'){
			echo "</br><b> -----> Apagada </b>";
		}
	echo '</br></br>';
	}
	echo '--------------------------------------------------</br>';
?>
    <div id="botaoLogout">
        <a href="sd-saidas.php">Sair</a>
    </div>
</div>
</body>
</html>