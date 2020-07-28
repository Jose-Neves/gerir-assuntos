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
require 'database.php';
//$db = DB();
// Application library ( with DemoLib class )
require 'library.php';
$app = new DemoLib();

$IdSaida=$_SESSION['IdSaida'];
$DataIns=$_SESSION['DataIns'];
$DataHoraAlteradaForm=$_SESSION['DataNovaSaida'];

$DataAno=substr($DataHoraAlteradaForm,0,4);
$DataMes=substr($DataHoraAlteradaForm,5,2);
$DataDia=substr($DataHoraAlteradaForm,8,2);
$DataHora=substr($DataHoraAlteradaForm,11,2);
$DataMin=substr($DataHoraAlteradaForm,14,2);
$DataHoraAlterada=$DataAno.$DataMes.$DataDia.$DataHora.$DataMin;

$Morada=$_SESSION['Morada'];
$Observ=$_SESSION['Observ'];
$Ultimo=$_SESSION['Ultimo'];
$Apagada=$_SESSION['Apagada'];

?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>alteraUtilizadorGrava</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div class="container">
    <?php 
    require_once 'inicioPagina.html';
    echo date("YmdHi");

    try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $query = "UPDATE saidas 
        SET datahora_sd='$DataHoraAlterada', 
            morada_sd='$Morada', 
            observ_sd='$Observ', 
            marcadoPor_sd='$Ultimo',
            apagada_sd='$Apagada'
        WHERE id_saida = '".$IdSaida."'";
    $dbconn->exec($query);
    }
    catch(PDOException $e)
    {
    echo $query . "<br>" . $e->getMessage();
    }
    ?>
    <div></br><b>Sa&iacute;da alterada!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="sd-listaSaidasHoje.php">Sair</a>
</div>

</body>

</html>