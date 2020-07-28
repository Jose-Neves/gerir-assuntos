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

$login_error_message = '';
$register_error_message = '';

if (!empty($_POST['btnGrava'])) {
    $novoUtilizador = trim($_POST['novoUtilizador']);
    $_SESSION['novoUtilizador']=$novoUtilizador;
    header("Location: novoUtilizadorGrava.php"); // Redirect user to the profile.php
}
 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>novoUtilizador</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        input[type=text],input[type=password] {
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

<body>

<div class="container">
    <img src="./bigbizz_newLogo.png" alt="Bigbizz" height="160" width="300">
    </br>

    <?php
        //echo $_SESSION['user_id']; echo "</br>";
        echo $DataHora=date("Y/m/d H:i")." - ";
        echo $nome;
    ?>
    <h3>Novo Utilizador</h3>

    <?php
    if ($login_error_message != "") {
        echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
    }
    ?>

    <form action="novoUtilizador.php" method="post">
        <input type="text" placeholder="Novo Utilizador" name="novoUtilizador" required>
        <label for="">Novo Utilizador</label>
        <br>
        <input type="text" value="000" disabled>
        <br>
        <input type="submit" name="btnGrava" value="Grava"/>
    </form>
</div>
    
<div id="botaoLogout">
    <a href="utilizadoresListar.php">Sair</a>
</div>

</body>

</html>