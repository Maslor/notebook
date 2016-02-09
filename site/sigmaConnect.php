<?php

/**
 * Created by PhpStorm.
 * User: Maslor
 * Date: 06/12/15
 * Time: 19:22
 */
class sigmaConnect
{
    private $host="db.ist.utl.pt";	// o MySQL esta disponivel nesta maquina
    private $user="ist178081";	// -> substituir pelo nome de utilizador
    private $password="TagusFTW";	// -> substituir pela password (dada pelo mysql_reset, ou atualizada pelo utilizador)
    private $connection=null;
    private $result = null;

    public function getHost(){
        return $this->host;
    }

    public function getDbname()
    {
        return $this->user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setHost($host)
    {
        $this->host = $host;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function startTransaction()
    {
        $this->getConnection()->beginTransaction();
    }

    public function commitTransaction()
    {
        $this->getConnection()->commit();
    }

    public function rollbackTransaction()
    {
        $this->getConnection()->rollback();
    }

    public function connect(){
        try {
            $this->setConnection(new PDO("mysql:host=" . $this->getHost() . ";dbname=" . $this->getDbname(), $this->getUser(), $this->getPassword(), array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)));
            $dbname = $this->getDbname();
            $host = $this->getHost();
            $user = $this->getUser();
            echo("<p>Connected to MySQL database $dbname on $host as user $user</p>\n");
        } catch (Exception $e){
            echo 'Caught exception: ', $e->getMessage(), '\n';
        }
    }

    public function disconnect()
    {
        $this->setConnection(null);
        echo("<p>Connection closed.</p>\n");
    }

    public function submitSQLquery($sqlQuery)
    {
        $this->setResult($this->getConnection()->query($sqlQuery));
    }

}
?>