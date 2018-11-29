<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 4/10/2018
 * Time: 21:20
 */
include 'header.php';

//de juiste driver moet in de ext directory geplaatst worden en in de php ini onder apacge bin vemeld staan
//php_pdo_sqlsrv_71_ts_x64.dll
//op mssql server moet men een lokale user aanmaken
//bij server properties moet men authenticatie op server

$serverName = "DESKTOP-JBJ5ICD\SQLEXPRESS";
$user = "miledi";
$passw = "Robyb@ggio75";
//phpinfo();

try
{
    $conn = new PDO( "sqlsrv:server=$serverName ; Database=bibliotheek", $user, $passw);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e)
{
    die( print_r( $e->getMessage() ) );
}

$sql = "select * from boeken";
$results = $conn->query( $sql );
while ($row = $results->fetch())
{
    echo $row['titel'].",".$row['jaar']."<br>";
}
var_dump($results);


include 'footer.php';

