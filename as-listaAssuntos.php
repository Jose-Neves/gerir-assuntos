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
	<title>Ver Assuntos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
	<link rel="stylesheet" href="DataTables-1_10_21/css/jquery.dataTables.min.css">
	
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<script src="jQuery-3_3_1/jquery-3.3.1.js"></script>

	<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
	<script src="DataTables-1_10_21/js/jquery.dataTables.min.js"></script>

	<!-- <script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json"></script> -->
	<script type="text/javascript" language="javascript">

	$(document).ready(function() {
		$('#listar-assuntos').dataTable( {
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

	<h1>Lista Assuntos (todos)</h1>

<?php
//header("Content-Type: text/html; charset=iso-8859-1");
/*
$dataHoje='000000000000';
$assuntosListar = $app->AssuntosDetailsListarTodas($dataHoje); // get saidas details
*/
$assuntosListar = $app->AssuntosDetailsListarTodas(); // get saidas details

//$dataDia='00';
if (!$assuntosListar) {
	header('Location: as-assuntos.php');
	exit;
}
?>
	<table id="listar-assuntos" class="display" style="width:100%">
		<thead>
			<tr>
				<th>Act</th>
				<th>Assunto</th>
				<th>datahoraAber</th>
				<th>AbertoPor</th>
				<th>Aberto?</th>
				<th>UltTexto</th>
			</tr>
		</thead>
		<tbody>
<?php
//LOOP TABLE ROWS
foreach ($assuntosListar as $row){
		echo '<tr>';
		echo '<td>';
		?>
		<div id="botaoActualiza">
		<a href="as-actAssuntos.php?idAssunto=<?php echo $row['id_assunto']; ?>">Act</a>
		</div>
		<?php
		//echo $row['id_assunto'];
		echo '</td><td>';
		echo $row['assunto_as'];
		echo '</td><td>';
		echo $row['datahora_as'];
		echo '</td><td>';
		echo $row['marcadoPor_as'];
		echo '</td><td>';
		if ($row['aberto_as']=="1") { echo "sim"; }
		else { echo "não"; }
		echo '</td><td>';
		echo $row['linhaTexto'];
		echo '</td></tr>';
	}
	echo '</tbody></table>';
?>
</div>
<div id="botaoLogout">
        <a href="as-assuntos.php">Sair</a>
    </div>
</body>
</html>