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

echo $idUtilizador=$_SESSION['idUtilizador'];
echo $mudapasswd=$_SESSION['mudapasswd'];
echo $passwddata=$_SESSION['passwddata'];
echo $saidas=$_SESSION['saidas'];
echo $assuntos=$_SESSION['assuntos'];
 
?>
<!doctype html>
<html lang="en">
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

    echo $DataHora=date("YmdHi");

    try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $query = "UPDATE users 
        SET mudapasswd='$mudapasswd', passwddata='$passwddata', saidas='$saidas', assuntos='$assuntos' 
        WHERE id_user = '".$idUtilizador."'";
    $dbconn->exec($query);
    }
    catch(PDOException $e)
    {
    echo $query . "<br>" . $e->getMessage();
    }
    ?>
    <div></br><b>Utilizador alterado!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="utilizadoresListar.php">Sair</a>
</div>

</body>

</html>