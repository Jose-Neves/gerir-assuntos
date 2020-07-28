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

$idUtilizador=$_GET['idUtilizador'];
$dadosUtilizador = $app->UserDetails($idUtilizador);
$nomeUtilizador=$dadosUtilizador->nome;
$mudapasswd=$dadosUtilizador->mudapasswd;
$saidas=$dadosUtilizador->saidas;
$assuntos=$dadosUtilizador->assuntos;

$login_error_message = '';
$register_error_message = '';

if (!empty($_POST['btnGrava'])) {
    $_SESSION['idUtilizador']=$_POST['idUtilizador'];
    $_SESSION['mudapasswd']=$_POST['mudapasswd'];
    $_SESSION['passwddata']=date("YmdHi");
    $_SESSION['saidas']=$_POST['saidas'];
    $_SESSION['assuntos']=$_POST['assuntos'];
    header("Location: alteraUtilizadorGrava.php"); // Redirect user to the profile.php
}
 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alteraUtilizador</title>
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
        echo $DataHora=date("Y/m/d H:i");
        echo " - ";
        echo $nome;
    ?>
    <h3>Altera Utilizador</h3>

    <?php
    if ($login_error_message != "") {
        echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
    }
    ?>

    <form action="alteraUtilizador.php" method="post">
        <input type ="text" <?php echo 'value="'.$idUtilizador.'"' ?> name="idUtilizador" hidden>
        <input type="text" <?php echo 'value="'.$nomeUtilizador.'"' ?> name="nomeUtilizador" disabled>
        <label>Nome do Utilizador</label>
        <br>
        <input type="radio" id="0" name="mudapasswd" value="0" <?php if ($mudapasswd=="0") echo "checked"; ?>>
        N&atilde;o&nbsp;&nbsp;&nbsp;
        <input type="radio" id="1" name="mudapasswd" value="1" <?php if ($mudapasswd=="1") echo "checked"; ?>>
        Sim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Muda password</label>
        <br>
        <input type="text" <?php echo 'value="'.$DataHora.'"' ?> name="passwddata" disabled>
        <label for="">Data/Hora</label>
        <br>
        <input type="radio" id="0" name="saidas" value="0" <?php if ($saidas=="0") echo "checked"; ?>>
        Normal&nbsp;&nbsp;&nbsp;
        <input type="radio" id="1" name="saidas" value="1" <?php if ($saidas=="1") echo "checked"; ?>>
        Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Acesso a sa&iacute;das</label>
        <br>
        <input type="radio" id="0" name="assuntos" value="0" <?php if ($assuntos=="0") echo "checked"; ?>>
        Normal&nbsp;&nbsp;&nbsp;
        <input type="radio" id="1" name="assuntos" value="1" <?php if ($assuntos=="1") echo "checked"; ?>>
        Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Acesso a assuntos</label>
        <br>
        <input type="submit" name="btnGrava" value="Grava"/>
    </form>
</div>
    
<div id="botaoLogout">
    <a href="utilizadoresListar.php">Sair</a>
</div>

</body>

</html>