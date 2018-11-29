
<?php
require "includes/header.php";

$conn = new DBpdo();
//var_dump($conn->get_movies());
//var_dump($conn->get_movie("Forrest Gump"));
//$con->insert_movie($ar_movies);
$conn->insert_movie(
    array(":titel"=>"StarWars2",":jaar"=>1978)
);
?>
<table class="table table-responsive">
    <thead class="thead-dark">
    <tr>
        <th>Titel</th>
        <th>Jaar</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($conn->get_movies() as $movie)
    {

        ?>
        <tr>
            <td><?php echo $movie->titel;?></td>
            <td><?php echo $movie->jaar;?></td>
        </tr>
        <?php
    }
    ?>

    </tbody>

</table>
<?php

require "includes/footer.php";
?>