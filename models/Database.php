<?php
class Database extends PDO
{

    private $servername;
    private $username;
    private $password;
    private $bddname;

    public function __construct()
    {

        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'HBFormation63';
        $this->bddname = 'rentacar';

        parent::__construct('mysql:host=' . $this->servername . ';dbname=' . $this->bddname, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        try {

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


    public function update($sql, $array = array())
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value):
            $sth->bindValue("$key", $value);
        endforeach;
        $sth->execute();
    }

    public function classlistJson($sql, $fetchmode){

        $sth = $this->prepare($sql);
        $sth->execute();

        return $sth->fetchAll($fetchmode);

    }


    public function selectJson($sql, $array = array(), $fetchmode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);

        foreach ($array as $key => $value):
            $sth->bindValue("$key", $value);
        endforeach;
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_ASSOC);

        return $sth->fetch();
    }




}