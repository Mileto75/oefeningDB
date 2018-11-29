<?php
include "includes/header.php";


if (isset($_GET['action']) && $_GET['action'] == "logout")
{
    //call logout cleanup function
    logout();
}
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true)
{
    echo "<H3>Welkom</H3>";
    $db = new DB();
    $movies = $db->get_movies();
    var_dump($movies);

}

include "../includes/footer.php";