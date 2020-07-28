<?php
 
// Start Session
session_start();
 
// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

$IdSaida=$_GET['indiceSaida'];

// Database connection
require 'database.php';
//$db = DB();
// Application library ( with DemoLib class )
require 'library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$nomeUtilizador=$user->nome;

$Saida = $app->SaidaDetails($IdSaida); // get saida details
$zzdataHoraIns=$Saida->dataHoraIns_sd;
$zzdataHora=$Saida->datahora_sd;
$zdataAno = substr ( $zzdataHora , 0, 4 );
$zdataMes = substr ( $zzdataHora , 4, 2 );
$zdataDia = substr ( $zzdataHora , 6, 2 );
//echo $zdataAno,'/'.$zdataMes.'/'.$zdataDia.' <b>Hora:</b>';
$zdataHora = substr ( $zzdataHora , 8, 2 );
$zdataMin = substr ( $zzdataHora , 10, 2 );
$zdataHoraSaidaFich=$zdataAno.'-'.$zdataMes.'-'.$zdataDia.'T'.$zdataHora.':'.$zdataMin;

//echo $zdataHora.':'.$zdataMin.' ';
$zzmorada=$Saida->morada_sd;
$zzobserv=$Saida->observ_sd;
$zzultimo=$Saida->marcadoPor_sd;
$zzapagada=$Saida->apagada_sd;

$login_error_message = '';
$register_error_message = '';

if (!empty($_POST['btnGrava'])) {
    $_SESSION['IdSaida']=$_POST['IdSaida'];
    $_SESSION['DataIns']=$_POST['DataIns'];
	$_SESSION['DataNovaSaida']=$_POST['dataNovaSaida'];
	$_SESSION['Morada']=$_POST['Morada'];
	$_SESSION['Observ']=$_POST['Observ'];
    $_SESSION['Ultimo']=$_POST['Ultimo'];
    $_SESSION['Apagada']=$_POST['Apagada'];
    header("Location: sd-alteraSaidaGrava.php"); // Redirect user
}
 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alteraSa&iacute;da</title>
    <link rel="stylesheet" href="css/bigbizzpdo.css">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style> /*está aqui porque não funcionou no fich. css*/
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
        echo date("Y/m/d H:i");
        echo " - ";
        echo $nomeUtilizador;
    ?>
    <h3>Altera Sa&iacute;da</h3>

    <?php
    if ($login_error_message != "") {
        echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
    }
    ?>

<form name="Registo" method="POST" action="sd-alteraSaida.php">
IdSaida: <input type="text" name="IdSaida" value="<?php echo $IdSaida;?>" > </br>
DataIns: <input type="text" name="DataIns" value="<?php echo $zzdataHoraIns;?>" > </br>

Data :<input type="datetime-local" placeholder="Data" name="dataNovaSaida" required="" value="<?php echo $zdataHoraSaidaFich; ?>"  autofocus/>
</br>
Morada : <textarea name="Morada" cols="60" rows="2" required><?php echo $zzmorada; ?></textarea>
</br>
Observa&ccedil;&otilde;es: <textarea name="Observ" cols="60" rows="4"><?php echo $zzobserv; ?></textarea>
</br>
&Uacute;ltimo: <input type="text" size="10" name="Ultimo" value="<?php echo $nomeUtilizador; ?>" readonly>
</br>
<input type="radio" id="0" name="Apagada" value="0" <?php if ($zzapagada=="0") echo "checked"; ?>>
        N&atilde;o &nbsp;&nbsp;&nbsp;
<input type="radio" id="1" name="Apagada" value="1" <?php if ($zzapagada=="1") echo "checked"; ?>>
        Sim &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label><b>Apagada</b></label>
<br>
<input type="submit" name="btnGrava" value="Grava"/>
</form>
    
<div id="botaoLogout">
    <a href="sd-listaSaidasHoje.php">Sair</a>
</div>

</body>

</html>