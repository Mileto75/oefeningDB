<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mijn applicatie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/includes/css/custom.css">
    <link rel="stylesheet" href="/includes/css/footer.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/includes/js/functions.js"></script>
    
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PHP Workshop</a>
    </div>
      <?php if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true)
      {
      ?>
      <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">zoek</a></li>
      <li><a href="#">Info</a></li>
      <li><a href="#">Contact</a></li>

    </ul>
      <ul class="nav navbar-right">
          <li><button id="logOut" class="btn btn-lg btn-primary">Logout</button></li>
      </ul>
      <?php
      }
      ?>
  </div>
</nav>
<?php
require "functions/functions.php";
//require 'includes/classes/DB.class.php';
require "includes/classes/DBpdo.class.php";
require "functions/dbFunctions.php";
require "functions/sanitize_authenticate_functions.php";
?>

 
