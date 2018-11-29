<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 14/11/2018
 * Time: 10:32
 */
/**
 * @param $userVar
 * @return bool|mixed
 * sanitizes user input string
 */
function sanitize_data($userVar)
{
    //check if var exists
    if (check_variable($userVar))
    {
        //rest van de sanitizing
        return filter_var($userVar, FILTER_SANITIZE_STRING);
    }
    else
    {
        return false;
    }
}

/**
 * @param $userVar
 * @return bool|mixed
 * sanitizes user input email
 */
function sanitize_email($userVar)
{
    if(check_variable($userVar))
    {
        $sanitizedEmail = filter_var($userVar,FILTER_SANITIZE_EMAIL);
        if($sanitizedEmail)
        {
            return filter_var($sanitizedEmail,FILTER_VALIDATE_EMAIL);
        }
        else
        {
            return false;
        }
    }
}

/**
 * @param $userVar
 * @return bool|mixed
 * sanitizes user input url
 */
function sanitize_url($userVar)
{
    if(check_variable($userVar))
    {
        $sanitizedEmail = filter_var($userVar,FILTER_SANITIZE_URL);
        if($sanitizedEmail)
        {
            return filter_var($sanitizedEmail,FILTER_VALIDATE_URL);
        }
        else
        {
            return false;
        }
    }
}

/**
 * @param $userVar
 * @return bool|string
 * controleert variabele en trims spaties
 */
function check_variable($userVar)
{
    //check if var exists
    if(!isset($userVar))
    {
        return false;
    }
    //check if var niet leeg is
    elseif($userVar == "")
    {
        return false;
    }
    else
    {
        //trim whitespaces
        $trimmedData = trim($userVar);
        return $trimmedData;
    }
}

/**
 * @param $userName
 * @param $passw
 * @return bool
 * authenticeert gebruiker
 */
function authenticate_user($userName,$passw)
{
    if($userName == "mileto1975@gmail.com" && md5($passw) == md5("123"))
    {
        return true;
    }
    else
    {
        return false;
    }
}