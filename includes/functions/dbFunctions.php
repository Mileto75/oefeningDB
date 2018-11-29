<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 20/11/2018
 * Time: 13:19
 */

//database constants
define("SERVER","localhost");
define("USERNAME","root");
define("PASSW","");
define("DBASE","moviesDB");

//connect met Mysqli
function connect($server=SERVER,$username=USERNAME,$passw=PASSW,$dbase=DBASE)
{
    $dbConn = new mysqli($server,$username,$passw,$dbase);
    if($dbConn->connect_error)
    {
        return false;
    }
    else
    {
        return $dbConn;
    }
}

function connectPDO()
{
    $DbConn =
        new PDO("mysql:host = localhost;dbname=moviesdb","root","");
    if($DbConn)
    {
        return $DbConn;
    }
    else
    {
        die("no connection");
    }

}


