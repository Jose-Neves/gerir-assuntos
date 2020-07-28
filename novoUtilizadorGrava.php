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

$novoUtilizador = $_SESSION['novoUtilizador'];
$passwordDataHora=date('YmdHi');
$password = hash('ripemd160', '000');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>novoUtilizadorGrava</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div class="container">
    <?php require_once 'inicioPagina.html'; ?>
    
    <?php
    try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");

    $query = "INSERT INTO `users`
    (`id_user`,`nome`,`passwd`,`mudapasswd`,`passwddata`,`saidas`,`assuntos`)
    VALUES ('','".$novoUtilizador."','".$password."','1','".$passwordDataHora."','0','0')";
    $dbconn->exec($query);

    }
    catch(PDOException $e)
    {
    echo $query . "<br>" . $e->getMessage();
    }
    ?>
    <div></br><b>Novo Utilizador inserido!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="inicio00.php">Sair</a>
</div>

</body>

</html>