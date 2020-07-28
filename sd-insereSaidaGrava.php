<?php
session_start();
 
// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

// Database connection
require 'database.php';
//$db = DB();
// Application library ( with DemoLib class )
require 'library.php';
$app = new DemoLib();

?>

<!doctype html>
<html lang="en">
<script>
	function carregar() {
		window.location="inicio.php";
	}
</script>
<head>
    <meta charset="UTF-8">
    <title>insereSaidaGrava</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div class="container">
    <?php require_once 'inicioPagina.html';

	$DataHora=date("YmdHi");
	$DataSaida=$_SESSION['DataSaida'];
	$Morada=$_SESSION['Morada'];
	$Observ=$_SESSION['Observ'];
    $MarcadoPor=$_SESSION['MarcadoPor'];
	$DataAno=substr($DataSaida,0,4);
	$DataMes=substr($DataSaida,5,2);
	$DataDia=substr($DataSaida,8,2);
	$DataHora=substr($DataSaida,11,2);
	$DataMin=substr($DataSaida,14,2);
	$DataHoraGrava=$DataAno.$DataMes.$DataDia.$DataHora.$DataMin;
	$dataHoraInsere=date("YmdHi");

	try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");

    $query = "INSERT INTO `saidas`
    (`id_saida`,`dataHoraIns_sd`,`datahora_sd`,`morada_sd`,`observ_sd`,`marcadoPor_sd`,`apagada_sd`)
    VALUES ('','".$dataHoraInsere."','".$DataHoraGrava."','".$Morada."','".$Observ."','".$MarcadoPor."','0')";
    $dbconn->exec($query);

    }
    catch(PDOException $e)
    {
    echo $query . "<br>" . $e->getMessage();
    }
    ?>
    <div></br><b>Nova saida inserida!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="sd-saidas.php">Sair</a>
</div>

</body>

</html>