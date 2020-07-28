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
$assuntos=$user->assuntos;

?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
<title>as-assuntos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="font-family: Arial">
	<?php require_once 'inicioPagina.html'; 
	echo 'Ol&aacute; - '.$nome; ?>

<div class="container">
	<h1>Assuntos</h1>
    
<?php
	if ($assuntos > '0') {
		?>
		<div class="escolha">
    	<a href="as-insereAssunto.php">Novo Assunto</a>
    	</div>
		<div class="escolha">
    	<a href="as-listaAssuntos.php">Lista/Actualiza Assuntos</a>
    	</div>
<?php
	}
	else {
		?>
		<div class="escolha">
    	<a href="as-listaAssunto.php">Lista Sa&iacute;das</a>
    	</div>
<?php
	}
	?>
</br>
</div>

    <div id="botaoLogout">
        <a href="inicio00.php">Sair</a>
    </div>
</body>

</html>