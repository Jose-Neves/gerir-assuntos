<?php

// Start Session
session_start();
// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

// Database connection
require 'database.php';
$db = DB();
// Application library ( with DemoLib class )
require 'library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$nome=$user->nome;
$dataHoraHoje=date("YmdHi");
$dataHoraHojeAno=substr($dataHoraHoje, 0, 4);
$dataHoraHojeMes=substr($dataHoraHoje, 4, 2);
$dataHoraHojeDia=substr($dataHoraHoje, 6, 2);
$dataHoraHojeHora=substr($dataHoraHoje, 8, 2);
$dataHoraHojeMin=substr($dataHoraHoje, 10, 2);
$dataHoraHojeMarcar=$dataHoraHojeAno.'-'.$dataHoraHojeMes.'-'.$dataHoraHojeDia.'T'.$dataHoraHojeHora.':'.$dataHoraHojeMin;

if (!empty($_POST['btnGrava'])) {
	$_SESSION['DataAssunto']=$_POST['dataNovoAss'];
	$_SESSION['AssuntoNovo']=$_POST['assuntoNovo'];
	$_SESSION['MarcadoPor']=$_POST['marcadoPor'];
    header("Location: as-insereAssuntoGrava.php"); // Redirect user
}

?>
<!doctype html>
<html lang="pt">
<head>
    <link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
    <meta charset="UTF-8">
    <title>as-insereAssunto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        input[type=text],input[type=password],[type=datetime-local] {
            background-color: #e6ecf5;
            border: none;
            color: black;
            padding: 10px 25px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        input[type=button], input[type=submit], input[type=reset] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #50a049;
        }
    </style>
</head>

<body style="font-family: Arial">
<img src="./bigbizz_newLogo.png" alt="Bigbizz" height="160" width="300">

<h1>Novo Assunto</h1>

<form name="Registo" method="POST" action="as-insereAssunto.php">
Data :<input type="datetime-local" name="dataNovoAss" required="" value="<?php echo $dataHoraHojeMarcar; ?>" autofocus/>
</br>
Assunto : <textarea name="assuntoNovo" cols="60" rows="2" required></textarea>
</br>
Marcado por: <input type="text" size="10" name="marcadoPor" value="<?php echo $nome; ?>" readonly>
</br>
<input type="submit" name="btnGrava" value="Grava"/>
</form>

    
<div id="botaoLogout">
    <a href="as-assuntos.php">Sair</a>
</div>

</body>

</html>
