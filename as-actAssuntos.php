<?php
 
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
$idAssunto=$_REQUEST['idAssunto'];

?>

<!doctype html>
<html lang="pt">

<head>
	<link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">	
	<meta charset="UTF-8">
	<title>Act Assuntos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		//$idAssunto;

		$leAssunto = $app->AssuntoDetails($idAssunto);
		$assunto_as=$leAssunto->assunto_as;
		$datahora_as=$leAssunto->datahora_as;
		$marcadoPor_as=$leAssunto->marcadoPor_as;
		$aberto_as=$leAssunto->aberto_as;

		$dataAno = substr ( $datahora_as, 0, 4 );
		$dataMes = substr ( $datahora_as, 4, 2 );
		$dataDia = substr ( $datahora_as, 6, 2 );
		$dataHora = substr ( $datahora_as, 8, 2 );
		$dataMin = substr ( $datahora_as, 10, 2 );

    ?>

<div class="contentor">

	<h1>Act Assunto</h1>

	<table style="background: #ccc;">
		<tr>
			<td style="border:1px solid #000;">
				Assunto : 
			</td>
			<td style="border:1px solid #000;">
			<?php echo $assunto_as; ?>
			</td>
		</tr>
		<tr>
			<td>
				Aberto : 
			</td>
			<td>
			<?php   echo $dataAno,'/'.$dataMes.'/'.$dataDia;
					echo " ";
					echo $dataHora.':'.$dataMin.' - ';
					echo $marcadoPor_as;
			?>
			</td>
		</tr>
	</table>
	
	<?php
	$linhasListar = $app->LinhasDetails($idAssunto);

	if (!$linhasListar) {
		header('Location: as-listaAssuntos.php');
		exit;
	}
	//echo "------".$idAssunto."-------";
	?>
	<table style="width:100%">
		<thead>
			<tr>
				<th>DataAct</th>
				<th>Texto</th>
				<th>insPor</th>
			</tr>
		</thead>
		<tbody>
		<?php
		//LOOP TABLE ROWS
		foreach ($linhasListar as $linha){
			echo '<tr>';
			echo '<td style="border:1px solid #000;">';
			//echo $linha['assunto_ln'];
			echo $linha['datahora_ln'];
			echo '</td><td style="border:1px solid #000;">';
			echo $linha['linhatxt_ln'];
			echo '</td><td style="border:1px solid #000;">';
			echo $linha['insPor_ln'];
			echo '</td></tr>';
		}
	echo '</tbody></table>';
	?>

</div>
	
<div class="botaoInsereLinha">
	<a href="as-insLinha.php?idAssunto=<?php echo $idAssunto; ?>">Insere Linha</a>
</div>

<div class="botaoLogoutInsLinha">
   	<a href="as-listaAssuntos.php">Sair</a>
</div>

</body>
</html>