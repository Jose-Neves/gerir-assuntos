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

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$nome=$user->nome;
$passwd=$user->passwd;
$passwordNova = $_SESSION['passwordNova'];
 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mudaPasswordGrava</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div class="container">
    <?php require_once 'inicioPagina.html'; ?>
    
    <?php
        //echo $_SESSION['user_id']; echo "</br>";
        echo $DataHora=date("YmdHi"); echo " - ";
        echo $nome; echo "</br>";
        //echo $passwd;
    ?>

    <?php
    echo $passwordNova;
    $password = hash('ripemd160', $passwordNova);
    try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $query = "UPDATE users 
        SET passwd = '$password', mudapasswd = '0', passwddata = '$DataHora' 
        WHERE id_user = '".$_SESSION['user_id']."'";
    $dbconn->exec($query);
    }
    catch(PDOException $e)
    {
    echo $query . "<br>" . $e->getMessage();
    }
    ?>
    <div></br><b>Password mudada!</b></div>

</div>
    
<div id="botaoLogout">
    <a href="logout.php">Sair</a>
</div>

</body>

</html>