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
$saidas=$user->saidas;

?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
<title>sd-saidas</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="font-family: Arial">
	<?php require_once 'inicioPagina.html'; 
	echo 'Ol&aacute; - '.$nome; ?>

<div class="container">
	<h1>Sa&iacute;das</h1>
    
<?php
	if ($saidas > '0') {
		?>
		<div class="escolha">
    	<a href="sd-insereSaida.php">Insere Sa&iacute;da</a>
    	</div>
		<div class="escolha">
    	<a href="sd-listaSaidasHoje.php">Lista/Act Sa&iacute;das</a>
    	</div>
    	<div class="escolha">
    	<a href="sd-listaSaidasTodas.php">Lista Sa&iacute;das (todas)</a>
    	</div>
<?php
	}
	else {
		?>
		<div class="escolha">
    	<a href="sd-listaSaidasHoje.php">Lista Sa&iacute;das</a>
    	</div>
    	<div class="escolha">
    	<a href="listaSaidas.php">Lista Sa&iacute;das (todas)</a>
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