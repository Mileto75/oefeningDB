<?php
    include "includes/header.php";
//maak een PDO connectie
$conn = connectPDO();

//gewone query
$result = $conn->query("SELECT * FROM tbl_films");
$rows = $result->fetchAll(PDO::FETCH_OBJ);

    //gebruik van prepared statements
    $query = "SELECT * FROM tbl_films WHERE titel=:titel";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":titel",$titel);
    $titel = "Forrest Gump";
    $result = $stmt->execute();
    $titel = "Jaws";
    $result = $stmt->execute();





    if($result)
    {
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row)
        {
            echo $row->titel;
        }
    }
    unset($conn);

    $conn = new DB();
    $movies = $conn->get_movies();
    var_dump($movies);

    include "includes/footer.php";
?>
