<?php
try{
    $dbconn = new PDO("mysql:host=localhost", "root", "");
    $prepstatment = $dbconn->prepare("CREATE DATABASE IF NOT EXISTS bigbizzpdo
                                CHARACTER SET utf8
                                COLLATE utf8_general_ci");
    $prepstatment->execute();    
}
catch(PDOException $e)
{
    echo $prepstatment . "<br>" . $e->getMessage();
}

try {
    //$sql = "use bigbizzpdo";
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id int(11) AUTO_INCREMENT PRIMARY KEY,
                nome varchar(30) NOT NULL,
                passwd varchar (250),
                mudapasswd boolean,
                /* root pode obrigar, mas o próprio pode mudar qd quer*/
                passwddata varchar(14),
                saidas boolean,
                assuntos boolean,
                nivelacessoassuntos char
                )";
    $conn->exec($sql);
    echo "DB created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


$pswUser = md5($_POST["password"]);

/*
try {
    $db = new PDO("mysql:dbname=mydb;host=localhost", "root", "" );
} catch(PDOException $e) {
    echo $e->getMessage();
}
$table= "tcompany";
$columns = "ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY, Prename VARCHAR( 50 ) NOT NULL, Name VARCHAR( 250 ) NOT NULL,
 StreetA VARCHAR( 150 ) NOT NULL, StreetB VARCHAR( 150 ) NOT NULL, StreetC VARCHAR( 150 ) NOT NULL, 
 County VARCHAR( 100 ) NOT NULL, Postcode VARCHAR( 50 ) NOT NULL, Country VARCHAR( 50 ) NOT NULL " ;


$createTable = $db->exec("CREATE TABLE IF NOT EXISTS mydb.$table ($columns)");

if ($createTable) 
{
    echo "Table $table - Created!<br /><br />";
}
else { echo "Table $table not successfully created! <br /><br />";
}
*/


<?php

crypt ( string $str [, string $salt ] ) : string
crypt() retornará uma string criptografada usando o algoritmo de encriptação 
Unix Standard DES-based ou ou algoritmos alternativos disponíveis no sistema.

salt
Uma opcional string de salt para base da encriptação. Se não fornecido, será 
gerado randomicamente pelo PHP cada vez que chamar esta função.



$password = crypt('mypassword'); // let the salt be automatically generated

/* You should pass the entire results of crypt() as the salt for comparing a
   password, to avoid problems when different hashing algorithms are used. (As
   it says above, standard DES-based password hashing uses a 2-character salt,
   but MD5-based hashing uses 12.) */
   if (crypt($user_input, $password) == $password) { 
    echo "Password verified!";
 }
 ?>
/* ---------------------------------------------------------------------------------


?>
