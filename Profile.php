<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION)) 
{ 
 session_start(); 
} 

// Connect to database
require_once("DatabaseConnection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Laurel Animal Rescue League </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
 /* Remove the navbar's default margin-bottom and rounded borders */
 #lab_social_icon_footer {
 padding: 40px 0;
 background-color: #f2f2f2;
}

.avatar {
 width:500px;
 height:400px;
}

#lab_social_icon_footer a {
 color: #222;
}

#lab_social_icon_footer .social:hover {
 -webkit-transform: scale(1.1);
 -moz-transform: scale(1.1);
 -o-transform: scale(1.1);
}

#lab_social_icon_footer .social {
 -webkit-transform: scale(0.8);
 /* Browser Variations: */
 
 -moz-transform: scale(0.8);
 -o-transform: scale(0.8);
 -webkit-transition-duration: 0.5s;
 -moz-transition-duration: 0.5s;
 -o-transition-duration: 0.5s;
}
/*
 Multicoloured Hover Variations
*/

#lab_social_icon_footer #social-fb:hover {
 color: #3B5998;
}

#lab_social_icon_footer #social-tw:hover {
 color: #4099FF;
}

#lab_social_icon_footer #social-gp:hover {
 color: #d34836;
}

#lab_social_icon_footer #social-em:hover {
 color: #f39c12;
}
 
.fa {
 padding: 20px;
 font-size: 30px;
 width: 50px;
 text-align: center;
 text-decoration: none;
}

/* Add a hover effect if you want */
.fa:hover {
 opacity: 0.7;
}

/* Set a specific color for each brand */

/* Facebook */
.fa-facebook {
 background: #3B5998;
 color: white;
}
.socialmedia {
 display:inline;
}
/* Twitter */
.fa-twitter {
 display:block;

 background: #55ACEE;
 color: white;
}
 /* Add a gray background color and some padding to the footer */
 
 .footer {
 background-color: #008000;
 padding: 0px;
 }

/* Make the image fully responsive */
#myCarousel {
    height:500px;
    width:100%;
}

.carousel-inner > .item > img {
    width:100%;
    height: 500px;
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
<a class="navbar-brand" href="index.php">Laurel Animal Rescue League</a>
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
<span class="glyphicon glyphicon-log-in"></span>Login
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
<div class="jumbotron">
<div class="container text-center">
<!-- PHP Section -->
<?php
// Receive data from previous page
if(isset($_GET['id'])){
 $id = $_GET['id'];

 // Get resulting animal from database
 $result = $mysqli->query("SELECT * FROM animals WHERE id=$id") or die($mysqli->error());
 $row = $result->fetch_assoc();
}
else{
 $user_id = $_GET['id'];
}
?>
<!-- HTML Section -->
<hr>
<div class="container bootstrap snippet">

<!-- Slideshow -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo $row['image1'] ?>" alt="Los Angeles">
      </div>

      <div class="item">
        <img src="<?php echo $row['image2'] ?>" alt="Chicago">
      </div>
    
      <div class="item">
        <img src="<?php echo $row['image3'] ?>" alt="New york">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</hr>
<br>
<div class="panel panel-default">
<div class="panel-heading">Name</div>
<div class="panel-body">
<p><?php echo $row['name']?></p>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">Description</div>
<div class="panel-body">
<p><?php echo $row['description']?></p>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">Age</div>
<div class="panel-body">
<p><?php echo $row['age']?></p>
</div>
</div>
 <div class="panel panel-default">
<div class="panel-heading">Breed</div>
<div class="panel-body">
<p><?php echo $row['breed']?></p>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">Gender</div>
<div class="panel-body">
<p><?php echo $row['gender']?></p>
</div>
</div>
</div>
<!--/row-->
</div>
</div>
</body>
</html>

                                                      