<?php

try {
    $dbconn = new PDO("mysql:host=localhost;dbname=bigbizzpdo", "root", "");
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id_user int(11) AUTO_INCREMENT PRIMARY KEY,
                nome varchar(10) NOT NULL UNIQUE,
                passwd varchar (250),
                mudapasswd boolean,
                /*root pode obrigar, mas o próprio pode mudar qd quer*/
                passwddata varchar(14),
                saidas char,
                assuntos char
            )";
	/*
	+------------------------------------------------------------+
	$sql = "CREATE TABLE IF NOT EXISTS users ( 
				`id_user` INT NOT NULL AUTO_INCREMENT ,
				`nome` VARCHAR(30) NOT NULL ,
				`passwd` VARCHAR(250) NOT NULL ,
				`mudapasswd` BOOLEAN NOT NULL ,
				`passwddata` VARCHAR(14) NOT NULL ,
				`saidas` CHAR(1) NOT NULL ,
				`assuntos` CHAR(1) NOT NULL ,
				PRIMARY KEY (`id_user`), UNIQUE `nome` (`nome`)) ENGINE = InnoDB;
			
	+------------------------------------------------------------+
	*/
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
        VALUES ('','admin','".$password."','1','20200726','1','1')";
    $dbconn->exec($query);
    echo "admin inserido<br/>";

}
catch(PDOException $e)
{
    echo $query . "<br>" . $e->getMessage();
}