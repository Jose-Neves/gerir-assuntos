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
require_once 'database.php';
//$db = DB();
// Application library ( with DemoLib class )
require_once 'library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$nome=$user->nome;
$passwd=$user->passwd;

?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>utilizadores</title>
    <link rel="stylesheet" type="text/css" href="./css/bigbizzpdo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

<div>
    <img src="./bigbizz_newLogo.png" alt="Bigbizz" height="160" width="300">
    </br>
    <?php
        //echo $_SESSION['user_id']; echo "</br>";
        echo $DataHora=date("Y/m/d H:i")." - ";
        echo $nome; echo "</br>";
        //echo $passwd;
    ?>
    
    <div></br><b>Utilizadores</b></div>

    <?php

    $userListar = $app->UserDetailsListar(); // get user details

    try{
        echo "<table width=50% border='1' cellpadding='5' cellspacing='5'>
        <tr>
        <th>Nome</th>
        <th>Data</th>
        <th>Nivel sa&iacute;das</th>
        <th>Nivel assuntos</th>
        </tr>";
    
        foreach ($userListar as $row){
            $anoPasswddata=substr($row['passwddata'],0,4);
            $mesPasswddata=substr($row['passwddata'],4,2);
            $diaPasswddata=substr($row['passwddata'],6,2);
            $horaPasswddata=substr($row['passwddata'],8,2);
            $minPasswddata=substr($row['passwddata'],10,2);
            echo "<tr>
            <td align=center><a "
            ?>
            href="alteraUtilizador.php?idUtilizador=<?php echo $row['id_user'];?>"
            <?php echo ">".$row['nome']."</a></td>
            <td align=center>".$anoPasswddata."/".$mesPasswddata."/".$diaPasswddata." ".$horaPasswddata.":".$minPasswddata."</td>
            <td align=center>".$row['saidas']."</td>
            <td align=center>".$row['assuntos']."</td>
            </tr>";
        }
        echo "</table>";
    }
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>
    <div id="botaoNovoUtilizador">
        <a href="novoUtilizador.php">Novo Utilizador</a>
    </div>
    <div id="botaoLogout">
        <a href="inicio00.php">Sair</a>
    </div>

</div>
</body>

</html>