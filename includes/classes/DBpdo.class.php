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

    /**
     * DBpdo constructor.
     */
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

    /**
     * Haalt de movies uit de db
     * @return array
     */
    public function get_movies()
    {
        $query = "SELECT * FROM tbl_films";
        $res = $this->dbConn->query($query);
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Haalt een film uit de DB adhdv een titel
     * @param $ar_params
     * @return array
     */
    public function get_movie($ar_params)
    {
        //bouw query op
        $query = "SELECT * FROM tbl_films WHERE titel=:titel";
        //prepare statement
        $stmt = $this->dbConn->prepare($query);
        //bind parameters
        $stmt->bindParam(":titel",$ar_params);
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

    /**
     * maakt een nieuwe movie entry aan
     * @param $ar_params
     * @return bool
     */
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