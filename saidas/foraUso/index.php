<?php
include('./login.php'); // Includes Login Script

//if(isset($_SESSION['login_user'])){header("location: inicio.php");}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Bigbizz</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta name="keywords" content="jpdasneves, jose, viterbo, neves, bigbizz" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="font-family: Arial">
	<img src="../imagens/bigbizz_logo.jpg" alt="Bigbizz" height="168" width="306">
	</br>
	<b>BIGBIZZ</b>, Exporta&ccedil;&atilde;o de Cer&acirc;micas Unipessoal, Lda</br>
	Zona Ind. do Porto</br>
	Rua Manuel Pinto de Azevedo, 171</br>
	4100-321 PORTO</br>
	</br>
	<b>Tel.:</b> +351 226171615</br>
	<b>Tlmv:</b> +351 963426782</br>
	<b>e-mail:</b> comercial@bigbizz.com.pt</br>
	<b>NIF:</b> 507141458</br>
	<b>IBAN:</b> PT50 0010 0000 3455 8340 0018 6
	<h4><a href="http://www.outletdehotelaria.com">http://www.outletdehotelaria.com</a></h4>

	<div id="main">

		<h2>SA&Iacute;DAS</h2>

		<form action="" method="POST">
			<input id="username" name="username" placeholder="Nome" type="text" autofocus="1"> 
			: Nome </br> 
			<input id="password" name="password" placeholder="Password" type="password">
			: Password </br>
			<input id="submit" name="submit" type="submit" value=" Login ">
			</br>	
			<?php echo $error; ?>
		</form>
	</div>

</body>

</html>