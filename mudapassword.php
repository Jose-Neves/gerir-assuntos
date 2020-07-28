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

$login_error_message = '';
$register_error_message = '';

if (!empty($_POST['btnMuda'])) {
 
    $passwordAntiga = trim($_POST['passwordAntiga']);
    $passwordNova = trim($_POST['passwordNova']);
    $passwordNovaConf = trim($_POST['passwordNovaConf']);
    $passwordTeste = hash('ripemd160', $passwordAntiga);
    //$passwordEnvio = hash('ripemd160', $passwordNova);
    $_SESSION['passwordNova']=$passwordNova;
 
    if ($passwordAntiga == "") {
        $login_error_message = 'Password antiga Obrigat&oacute;ria!';
    } else if ($passwordNova == "") {
        $login_error_message = 'Password nova Obrigat&oacute;ria!';
    } else if ($passwordNovaConf == "") {
        $login_error_message = 'Password nova conf Obrigat&oacute;ria!';
    } else if ($passwordNova != $passwordNovaConf) {
        $login_error_message = 'A Password nova tem que ser igual a conf!';
    } else if ($passwordAntiga == $passwordNova) {
        $login_error_message = 'A Password nova tem que ser diferente!';
    } else if ($passwd != $passwordTeste) {
        $login_error_message = 'A Password antiga n&atilde;o coincide!';
    } else {
            header("Location: mudapasswordGrava.php"); // Redirect user to the profile.php
        }
}
 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mudaPassword</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

    <?php  require_once 'inicioPagina.html'; ?>

    <?php
        $_SESSION['user_id'];
        echo $DataHora=date("Y/m/d H:i")." - ";
        echo $nome; echo "</br>";
        //echo $passwd;
    ?>

<div class="container">

    <div></br><b>MudaPassword</b></div>

    <?php
    if ($login_error_message != "") {
        echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
    }
    ?>

    <form action="mudapassword.php" method="post">
        <div class="form-group">
            <input type="password" placeholder="Password antiga" name="passwordAntiga" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password nova" name="passwordNova" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password nova conf" name="passwordNovaConf" class="form-control"/>
        </div>
        <div class="form-group">
            <br/>
            <input type="submit" name="btnMuda" class="btn btn-primary" value="Muda"/>
        </div>
    </form>
</div>
    
<div id="botaoLogout">
    <a href="logout.php">Sair</a>
</div>

</body>

</html>