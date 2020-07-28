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
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

	<!-- <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json"></script> -->
	<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		$('#listar-saidas').dataTable( {
			"pagingType": "full_numbers",
			"lengthMenu": [ 5, 10, 15 ],
			"language": {
            	"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json"
			},
			responsive: true
		} );
	} );
	</script>

</head> 

<body>
	<a href="https://www.bigbizz.pt">
		<img src="./bigbizz_newLogo.png" alt="Bigbizz" height="160" width="300">
	</a>
    </br>
    <?php
        //echo $_SESSION['user_id']; echo "</br>";
        echo date("Y/m/d H:i")." - ";
        echo $nome; echo "</br>";
    ?>

<div class="container">

	<h1>Lista Sa&iacute;das (todas)</h1>

<?php
//header("Content-Type: text/html; charset=iso-8859-1");
$dataHoje='000000000000';
$saidasListar = $app->saidasDetailsListarTodas($dataHoje); // get saidas details
$dataDia='00';
if (!$saidasListar) {
	header('Location: sd-saidas.php');
	exit;
}
?>
	<table id="listar-saidas" class="display" style="width:100%">
		<thead>
			<tr>
				<th>Data Sai</th>
				<th>Dia Sem</th>
				<th>Hora Sai</th>
				<th>Morada</th>
				<th>Observ</th>
				<th>&Uacute;ltimo</th>
			</tr>
		</thead>
		<tbody>
<?php
//LOOP TABLE ROWS
foreach ($saidasListar as $row){
		echo '<tr>';
		echo '<td>';
		$dataAno = substr ( $row['datahora_sd'] , 0, 4 );
		$dataMes = substr ( $row['datahora_sd'] , 4, 2 );
		$dataDia = substr ( $row['datahora_sd'] , 6, 2 );
		echo $dataAno,'/'.$dataMes.'/'.$dataDia;
		echo '</td><td>';
		$diaSemana = date("D", mktime(0, 0, 0, $dataMes, $dataDia, $dataAno));
		if ($diaSemana == 'Mon') echo 'Seg';
		if ($diaSemana == 'Tue') echo 'Ter';
		if ($diaSemana == 'Wed') echo 'Qua';
		if ($diaSemana == 'Thu') echo 'Qui';
		if ($diaSemana == 'Fri') echo 'Sex';
		if ($diaSemana == 'Sat') echo 'Sab';
		if ($diaSemana == 'Sun') echo 'Dom';
		echo '</td><td>';
		$dataHora = substr ( $row['datahora_sd'] , 8, 2 );
		$dataMin = substr ( $row['datahora_sd'] , 10, 2 );
		echo $dataHora.':'.$dataMin.' ';
		echo '</td><td>';
		echo $row['morada_sd'];
		echo '</td><td>';
		echo $row['observ_sd'];
		echo '</td><td>';
		echo $row['marcadoPor_sd'];
		if ($row['apagada_sd'] == '1'){
			echo "<b> -----> Apagada </b>";
		}
		echo '</td></tr>';
	}
	echo '</tbody></table>';
?>
</div>
<div id="botaoLogout">
        <a href="sd-saidas.php">Sair</a>
    </div>
</body>
</html>