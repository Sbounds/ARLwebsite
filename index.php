<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION)) 
{ 
 session_start(); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Laurel Animal Rescue League </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body, html {
 height: 100%;
 margin: 0;

 /* The image used */
 background-image: url("img/HomePage.jpg");

 /* Full height */
 height: 100%; 

 /* Center and scale the image nicely */
 background-position: center;
 background-repeat: no-repeat;
 background-size: cover;
}

.navbar {
 z-index: 300;
 border-radius: 0;
}

.body-container {
 position: absolute;
top: 50%;
transform: translateY(-50%);
height: auto;
margin-left: auto;
margin-right: auto;
left: 0;
right: 0;
 color: #fff;
}

.body-container > h1 {
 font-size: 52px;
 text-shadow: 1px 3px #000;
}

.body-container > p {
 font-size: 18px;
 text-shadow: 1px 2px #000;
 color: #E5E5E5;
}
 </style>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Laurel Animal Rescue League</a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li class="active">
<a href="index.php">Home</a>
</li>
<li>
<a href="DogPage.php">Available Dogs</a>
</li>
<li>
<a href="CatPage.php">Available Cats</a>
</li>
</ul>
<?php
 if (empty($_SESSION["email"]) == true){
 ?>
<ul class="nav navbar-nav navbar-right">
<li>
<a href="login.php">
<span class="glyphicon glyphicon-log-in"></span> Login
</a>
</li>
</ul>
<?php
 }
 else { ?>
<ul class="nav navbar-nav navbar-right">
<li>
<a href="logout.php">
<span class="glyphicon glyphicon-log-out"></span>Logout
</a>
</li>
</ul>
<?php }
 ?>
</div>
</div>
</nav>

 <!-- Container -->
<div class="container text-center body-container">
<h1>Laurel ARL</h1>
<p>We are a non-profit organization dedicated to the welfare of the homeless, abandoned, and mistreated animals in Jones County.
 Founded in 1981, the ARL is one of very few no-kill facilities in Mississippi. This means there is no time limit on adoptions of each animal. 
 If they are not adopted, they live out their lives at the shelter. They are NOT euthanized just for being unwanted.
 </p>
</div>
</body>
</html>
