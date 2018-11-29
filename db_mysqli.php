<?php
include 'header.php';
//we openen een connectie
$myDB = new mysqli("localhost","root","","Boeken");
//we controleren of de verbinding gelukt is
if($myDB->connect_error)
{
    die("Connectie niet geslaagd:");
}

//var_dump($myDB);
//We voeren een query uit
/*$sql = "SELECT * FROM auteurs;";
$result = $myDB->query( $sql);*/
//voorbeeld van een insert query met prepared statement

$sql = "DELETE FROM auteurs 
		WHERE aut_id = 8";
$result = $myDB->query($sql);
if($result)
{
    echo "Auteur verwijderd!";
}
else
{
    echo $myDB->error;
}

//statement preparen
$preparedStatement = $myDB->prepare($sql);

//parameters binden
$preparedStatement->bind_param("i",$aut_id);

//parameters vullen

$aut_id = 8;


//Query uitvoeren
$preparedStatement->execute();
$result = $preparedStatement->get_result();

$aantalAuteurs = $result->num_rows;

echo "<h1>Er zitten $aantalAuteurs auteurs in onze tabel!</h1>";


?>
<table class="table table-responsive table-striped table-bordered table-hover table-condensed">
    <thead class="thead-inverse">
        <tr>
            <th>Naam</th>
            <th>voornaam</th>
            <th>woonplaats</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //we halen de resultaten uit het resultaatobject
        //controleren als er resultaten in de resultset zitten
        if($result && $aantalAuteurs > 0)
        {

            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>".$row['naam']."</td>";
                echo "<td>".$row['vnaam']."</td>";
                echo "<td>".$row['woonplaats']."</td>";
                echo "<td><a href=\"\"><i class=\"fa fa-pencil-square\" aria-hidden=\"true\"></i></a></td>";
                echo "</tr>";
            }
        }
        else 
        {
            echo "<h2>Geen resultaten gevonden!</h2>";
        }
?>
    </tbody>
</table>
<?php

//we sluiten de connectie af
$myDB->close();


include 'footer.php'
?>