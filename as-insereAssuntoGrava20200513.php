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

	$DataNovoAss=$_SESSION['DataAssunto'];
	$AssuntoNovo=$_SESSION['AssuntoNovo'];
	$MarcadoPor=$_SESSION['MarcadoPor'];
	
	$DataAno=substr($DataNovoAss,0,4);
	$DataMes=substr($DataNovoAss,5,2);
	$DataDia=substr($DataNovoAss,8,2);
	$DataHora=substr($DataNovoAss,11,2);
	$DataMin=substr($DataNovoAss,14,2);
	$DataHoraGrava=$DataAno.$DataMes.$DataDia.$DataHora.$DataMin;

	try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");

    $query = "INSERT INTO `assuntos`
    (`id_assunto`,`assunto_as`,`datahora_as`,`marcadoPor_as`,`aberto_as`)
    VALUES ('','".$AssuntoNovo."','".$DataHoraGrava."','".$MarcadoPor."','1')";
    $dbconn->exec($query);

    }
    catch(PDOException $e)
    {
    echo $query . "<br>" . $e->getMessage();
    }
    ?>

    <div></br><b>Novo assunto gravado!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="as-assuntos.php">Sair</a>
</div>

</body>

</html>