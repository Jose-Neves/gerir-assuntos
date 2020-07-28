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
	$_SESSION['DataSaida']=$_POST['dataNovaSaida'];
	$_SESSION['Morada']=$_POST['Morada'];
	$_SESSION['Observ']=$_POST['Observ'];
	$_SESSION['MarcadoPor']=$_POST['MarcadoPor'];
    header("Location: sd-insereSaidaGrava.php"); // Redirect user
}

?>
<!doctype html>
<html lang="pt">
<head>
    <link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
    <meta charset="UTF-8">
    <title>sd-insereSaida</title>
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

<h1>Marcar Sa&iacute;da</h1>
<?php
    echo $dataHoraHoje . '- Olá ' . $nome . '</br>';
?>

<form name="Registo" method="POST" action="sd-insereSaida.php">

Data :<input type="datetime-local" placeholder="Data" name="dataNovaSaida" required="" value="<?php echo $dataHoraHojeMarcar; ?>"  autofocus/>
</br>
Morada : <textarea name="Morada" cols="60" rows="2" required autofocus></textarea>
</br>
Observa&ccedil;&otilde;es: <textarea name="Observ" cols="60" rows="4"></textarea>
</br>
Marcada por: <input type="text" size="10" name="MarcadoPor" value="<?php echo $nome; ?>" readonly>
</br>
<input type="submit" name="btnGrava" value="Grava"/>
</form>

    
<div id="botaoLogout">
    <a href="sd-saidas.php">Sair</a>
</div>

</body>

</html>
