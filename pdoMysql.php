<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 4/10/2018
 * Time: 21:20
 */
include 'header.php';

//de juiste drive moet in de ext directory geplaatst worden en in de php ini onder apache bin vermeld staan
//php_pdo_sqlsrv_71_ts_x64.dll
//op mssql server moet men een lokale user aanmaken
//bij server properties moet men authenticatie op server

$serverName = "DESKTOP-JBJ5ICD\SQLEXPRESS";
$user = "miledi";
$passw = "Robyb@ggio75";
//phpinfo();

try
{


    $conn = new PDO( "mysql:host=localhost;dbname=boeken", 'root', '');



    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e)
{
    die( print_r( $e->getMessage() ) );
}

$sql = "select * from auteurs WHERE woonplaats=:woonplaats AND naam=:naam";

$statement = $conn->prepare($sql);

$naam = "Lanoye";
$woonplaats = "Antwerpen";
$statement->bindParam("naam",$naam);
$statement->bindParam(":woonplaats",$woonplaats);

$res = $statement->execute();

if($res)
{
    $results = $statement->fetchAll();
}

if(count($results > 0))
{
    foreach ($results as $auteur)
    {
        echo $auteur['naam'].",".$auteur['woonplaats']."<br>";
    }
}



include 'footer.php';

