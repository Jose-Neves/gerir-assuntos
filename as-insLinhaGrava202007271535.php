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
    <title>insLinhaGrava</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div class="container">
    <?php require_once 'inicioPagina.html';

    echo $idAssuntoLinha=$_SESSION['assuntoLin'];
    echo $dataHoraLinha=$_SESSION['dataHoraLin'];
    echo $novaLinha=$_SESSION['novaLinha'];
    echo $insPorLinha=$_SESSION['MarcadoPor'];

	try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");

    $queryLinhas = "INSERT INTO `linhas`
    (`id_linha`,`assunto_ln`,`datahora_ln`,`linhatxt_ln`,`insPor_ln`)
    VALUES ('','".$idAssuntoLinha."','".$dataHoraLinha."','".$novaLinha."','".$insPorLinha."')";
    $dbconn->exec($queryLinhas);
    }
    catch(PDOException $e)
    {
    echo $queryLinhas . "<br>" . $e->getMessage();
    }
    ?>

    <div></br><b>Nova linha gravada!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="as-assuntos.php">Sair</a>
</div>

</body>

</html>