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
                id_user int(11) AUTO_INCREMENT PRIMARY KEY,
                nome varchar(30) NOT NULL,
                passwd varchar (250),
                mudapasswd boolean,
                /*root pode obrigar, mas o próprio pode mudar qd quer*/
                passwddata varchar(14),
                saidas char,
                assuntos char
            )";
    $dbconn->exec($sql);
    echo "DB users created successfully<br/>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $password = hash('ripemd160', '123');
    $query = "INSERT INTO `users`
        (`id_user`,`nome`,`passwd`,`mudapasswd`,`passwddata`,`saidas`,`assuntos`)
        VALUES ('','admin','".$password."','1','2019121209','1','1')";
    $dbconn->exec($query);
    echo "admin inserido<br/>";

}
catch(PDOException $e)
{
    echo $query . "<br>" . $e->getMessage();
}

try {
    //$sql = "use bigbizzpdo";
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $sql = "CREATE TABLE IF NOT EXISTS temas (
                id_tema int(11) AUTO_INCREMENT PRIMARY KEY,
                tema_tm varchar(250) NOT NULL,
                datahora_tm varchar(14),
                user_tm int(11),
                aberto_tm char
            )";
    $dbconn->exec($sql);
    echo "DB temas created successfully<br/>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

try {
    //$sql = "use bigbizzpdo";
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $sql = "CREATE TABLE IF NOT EXISTS linhas (
                id_linha int(11) AUTO_INCREMENT PRIMARY KEY,
                tema_ln int(11),
                linhatxt_ln varchar(250) NOT NULL
            )";
    $dbconn->exec($sql);
    echo "DB linhas created successfully<br/>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

try {
    //$sql = "use bigbizzpdo";
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $sql = "CREATE TABLE IF NOT EXISTS saidas (
                id_saida int(11) AUTO_INCREMENT PRIMARY KEY,
                datahora_sd varchar(14),
                morada_sd varchar(250),
                observ_sd varchar(250),
                marcadoPor_sd varchar(30),
                apagada_sd char
            )";
    $dbconn->exec($sql);
    echo "DB saidas created successfully<br/>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}