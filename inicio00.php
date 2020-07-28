<?php
/**
 * Tutorial: PHP Login Registration system
 * Page : inicio00.php
 */
 
// Start Session
session_start();
 
// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}
 
// Database connection
require __DIR__ . '/database.php';
$db = DB();
// Application library ( with DemoLib class )
require __DIR__ . '/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$nome=$user->nome;
$passwd=$user->passwd;

?>
<!doctype html>
<html lang="pt">
<head>
    <link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
    <meta charset="UTF-8">
    <title>Inicio00</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body style="font-family: Arial">


    <?php
        require_once 'inicioPagina.html';
        echo $DataHora=date("Y/m/d H:i")." - ";
        /*
        echo "<b>Data:</b> ";
        $dataAno = substr ( $DataHora , 0, 4 );
        $dataMes = substr ( $DataHora , 4, 2 );
        $dataDia = substr ( $DataHora , 6, 2 );
        echo $dataAno,'/'.$dataMes.'/'.$dataDia.' <b>Hora:</b>';
        $dataHora = substr ( $DataHora , 8, 2 );
        $dataMin = substr ( $DataHora , 10, 2 );
        echo $dataHora.':'.$dataMin.' ';
        */  
        echo $nome;
    ?>

    <div class="container">

        <!-- <h2> Inicio00 </h2> -->
    <?php
        if ($user->mudapasswd == "1") {
            header("Location: mudaPassword.php");
        }
    ?>
    </br>
    <?php
    if ($nome=='admin'){
        ?>
        <div class="escolha">
            <a href="utilizadoresListar.php">Utilizadores</a>
        </div>
        <?php
    } else {
        ?>
        <div class="escolha">
            <a href="mudapassword.php">muda password</a>
        </div>
        <?php        
    }
    ?>
    <div class="escolha">
        <a href="sd-saidas.php">Sa&iacute;das</a>
    </div>
    <div class="escolha">
        <a href="as-assuntos.php">Assuntos</a>
    </div>
    <div id="botaoLogout">
        <a href="logout.php">Sair</a>
    </div>
    </br>
</div>
</body>
</html>