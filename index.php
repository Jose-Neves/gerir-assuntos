<?php
/* *
 * Tutorial: PHP Login Registration system
 * Page index.php
 * */
 
// Start Session
session_start();

require_once 'database.php';

// Application library ( with DemoLib class )
require 'library.php';
$app = new DemoLib();
 
$login_error_message = '';
$register_error_message = '';
 
// check Login request
if (!empty($_POST['btnLogin'])) {
 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
 
    if ($username == "") {
        $login_error_message = 'Utilizador Obrigat&oacute;rio!';
    } else if ($password == "") {
        $login_error_message = 'Password Obrigat&oacute;ria!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: inicio00.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Login inv&aacute;lido!';
        }
    }
}

?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Bigbizz</title>
	<link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
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

<body style="font-family: Arial">

<div class="container">
   
    <?php require_once 'inicioPagina.html'; ?>

    <div></br><b>Login</b></div>
    <?php
    if ($login_error_message != "") {
        echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
    }
    ?>
    <form action="index.php" method="post">
        <input type="text" name="username" required/>
        <label for="">Utilizador</label>
        <br>
        <input type="password" name="password" required/>
        <label for="">Password</label>
        <br/>
        <input type="submit" name="btnLogin" value="Entrar"/>
    </form>

</div>
 
</body>
</html>