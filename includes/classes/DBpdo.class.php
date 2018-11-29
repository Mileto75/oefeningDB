<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 28/11/2018
 * Time: 19:09
 */

class DBpdo
{
    private $dsn;
    private $user = "root";
    private $passw = "";
    private $host = "localhost";
    private $dbName = "moviesdb";

    private $dbConn;

    public function __construct()
    {
        try
        {
            $this->dsn =
                "mysql:host=$this->host;dbname=$this->dbName";
            $this->dbConn =
                new PDO($this->dsn, $this->user, $this->passw);
        }
        catch(PDOException $e)
        {
            //in principe logging
            //NOOIT echo in productie!!
            echo $e->errorCode();
        }

    }

    public function get_movies()
    {
        $query = "SELECT * FROM tbl_films";
        $res = $this->dbConn->query($query);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_movie($params)
    {
        //bouw query op
        $query = "SELECT * FROM tbl_films WHERE titel=:titel";
        //prepare statement
        $stmt = $this->dbConn->prepare($query);
        //bind parameters
        $stmt->bindParam(":titel",$params);
        $result = $stmt->execute();
        if($result)
        {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            var_dump($this->dbConn->errorInfo());
        }

    }

    public function insert_movie($ar_params)
    {
        $query = "INSERT INTO tbl_films(titel,jaar)
                  VALUES(:titel,:jaar)";
        $stmt = $this->dbConn->prepare($query);

        $stmt->bindParam(":titel",$ar_params[':titel']);
        $stmt->bindParam(":jaar",$ar_params[':jaar']);
        $stmt->debugDumpParams();
        $res = $stmt->execute();
        if($res)
        {
            return true;
        }
        else
        {
            var_dump($stmt->errorInfo());
        }
    }
}