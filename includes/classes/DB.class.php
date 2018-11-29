<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 28/11/2018
 * Time: 10:26
 */

class db
{
    private $dsn = "mysql:host=localhost;dbname=moviesdb";
    private $user = "root";
    private $passw = "";

    //$connectievar
    private $dbConn;


    //connection options
    private $connOptions = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );


    /**
     * db constructor.
     */
    public function __construct()
    {
        return $this->dbConn =
                new PDO($this->dsn,$this->user,$this->passw,$this->connOptions);
    }

    public function runQuery($query)
    {
        try
        {
            $results = $this->dbConn->query($query);
            if ($results->rowCount() > 0) {
                //Gebruik de methode fetchall om een array met objecten terug
                //te geven
                $rows = $results->fetchAll(PDO::FETCH_OBJ);
                return $rows;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e)
        {
            var_dump($e->errorInfo);
        }

    }

    /**
     * @param $query
     * @param $params
     * @return array|bool
     */
    public function runPreparedQuery($query,$params = array())
    {
        try
        {
            //prepare statements
            $statement = $this->dbConn->prepare($query);
            //bind the params
            foreach ($params as $name => $value) {
                $statement->bindParam($name, $value);
            }
            //Execute the query
            $result = $statement->execute();
        }
        catch(PDOException $e)
        {
            echo $e->errorInfo;
        }
        if($result)
        {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
        else
        {
            return false;
        }
    }

    public function get_movies()
    {
        $query = "SELECT * FROM tbl_films";
        return $this->runQuery($query);
    }

    public function insert_film($query,$params)
    {

    }



}