<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 21/11/2018
 * Time: 10:58
 */

/**
 * redirects user to loginpage with session var and error message
 */
function user_not_exists()
{
    //gebruiker bestaat niet redirect naar loginscherm met foutmelding
    //maak sessievar met foutmelding
    $_SESSION['message'] = "Uw logingegevens zijn niet correct!";
    header("Location:index.php");
}

/**
 * Log the user out and cleans up session vars
 */
function logout()
{
    $_SESSION = array();
    session.session_destroy();
    header("Location:index.php");
}