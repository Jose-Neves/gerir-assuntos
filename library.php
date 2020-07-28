<?php
 
/*
 * Tutorial: PHP Login Registration system
 *
 * Page: Application library
 * */
 
class DemoLib
{
 
    /*
     * Register New User
     *
     * @param $name, $username, $password
     * @return ID
     * */
    
     public function Register($name, $username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("INSERT INTO users(name, username, password) VALUES (:name,:email,:username,:password)");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    /*
     * Check Username
     *
     * @param $username
     * @return boolean
     * */
    
     public function isUsername($username)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */
    
     public function isEmail($email)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */
    
     public function Login($username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id_user FROM users WHERE (nome=:username) AND (passwd=:password)");
            $query->bindParam(":username", $username, PDO::PARAM_STR);
            $enc_password = hash('ripemd160', $password);
            $query->bindParam(":password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id_user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    /*
     * get User Details
     *
     * @param $user_id
     * @return $mixed
     * */
    
     public function UserDetails($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id_user, nome, passwd, mudapasswd, saidas, assuntos 
            FROM users 
            WHERE id_user=:user_id");
            $query->bindParam(":user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function UserDetailsListar()
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id_user, nome, passwddata, saidas, assuntos 
            FROM users 
            ORDER BY nome");
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function SaidasDetailsListar($dataInicio)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id_saida, dataHoraIns_sd, datahora_sd, morada_sd, observ_sd, marcadoPor_sd, apagada_sd
            FROM saidas 
            WHERE datahora_sd>=:dataInicio
            AND apagada_sd = '0' 
            ORDER BY datahora_sd");
            $query->bindParam(":dataInicio", $dataInicio, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function SaidaDetails($saida_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM saidas WHERE id_saida=:saida_id");
            $query->bindParam(":saida_id", $saida_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function SaidasDetailsListarTodas($dataInicio)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM saidas 
            WHERE datahora_sd>=:dataInicio
            ORDER BY datahora_sd");
            $query->bindParam(":dataInicio", $dataInicio, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
/*
    public function AssuntosDetailsListarTodas($dataInicio)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM assuntos 
            WHERE datahora_as>=:dataInicio
            ORDER BY datahora_sd");
            $query->bindParam(":dataInicio", $dataInicio, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
*/
/*
    public function AssuntosDetailsListarTodas($dataInicio)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT assuntos.id_assunto, assuntos.assunto_as, assuntos.datahora_as, 
            assuntos.marcadoPor_as, assuntos.aberto_as, 
            ( 
                SELECT linhas.linhatxt_ln 
                FROM linhas 
                WHERE assuntos.id_assunto=linhas.assunto_ln 
                ORDER BY linhas.linhatxt_ln DESC
                LIMIT 1 
            ) 
            WHERE assuntos.datahora_as>=:dataInicio
            FROM assuntos");
            $query->bindParam(":dataInicio", $dataInicio, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    */
    public function AssuntosDetailsListarTodas()
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT assuntos.id_assunto, assuntos.assunto_as, assuntos.datahora_as, 
            assuntos.marcadoPor_as, assuntos.aberto_as, 
            ( 
                SELECT linhas.linhatxt_ln 
                FROM linhas 
                WHERE assuntos.id_assunto=linhas.assunto_ln 
                ORDER BY linhas.linhatxt_ln DESC
                LIMIT 1 
            ) as linhaTexto
            FROM assuntos");
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function AssuntoDetails($idAssunto)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM assuntos WHERE id_assunto=:assunto_id");
            $query->bindParam(":assunto_id", $idAssunto, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
	
	    public function LinhasDetails($idAssunto)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM linhas WHERE assunto_ln=:assunto_id");
            $query->bindParam(":assunto_id", $idAssunto, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}