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

// Add animals
if (isset($_POST['add'])) {
 // Variables
 $NAME = $_POST['name'];
 $BREED = $_POST['breed'];
 $AGE = $_POST['age'];
 $DESCRIPTION = $_POST['description'];
 $TYPE = $_POST['type'];
 $GENDER = $_POST['gender'];
 $image1_name = $_FILES['image1']['name'];
 $image1_temp_name = $_FILES['image1']['tmp_name'];
 $LOCATION1 = 'uploadedImages/' . uniqid(). $image1_name;
 $image2_name = $_FILES['image2']['name'];
 $image2_temp_name = $_FILES['image2']['tmp_name'];
 $LOCATION2 = 'uploadedImages/' . uniqid(). $image2_name;
 $image3_name = $_FILES['image3']['name'];
 $image3_temp_name = $_FILES['image3']['tmp_name'];
 $LOCATION3 = 'uploadedImages/' . uniqid(). $image3_name;
 
 if ($NAME != "" || $BREED != "" || $AGE != "" || $DESCRIPTION != "" || $GENDER != "" || $TYPE != "" || $def_name != "") {
 $mysqli->query("INSERT INTO animals (name, breed, age, description, image1, image2, image3, gender, type) VALUES ('$NAME','$BREED','$AGE', '$DESCRIPTION', '$LOCATION1', '$LOCATION2', '$LOCATION3', '$GENDER', '$TYPE')") or die($mysqli->error);
 }
 if (isset($image1_name) && isset($image2_name) && isset($image3_name)) {
 if (move_uploaded_file($image1_temp_name, $LOCATION1) && move_uploaded_file($image2_temp_name,$LOCATION2) && move_uploaded_file($image3_temp_name,$LOCATION3)) {
 echo 'Files uploaded successfully';
 }
 } 
 else {
 echo 'You should select a file to upload !!';
 }
 if ($_POST['type'] == "dog") {
 header('location: DogPage.php');
 } else {
 header('location: CatPage.php');
 }
 } 
 else {
 }

// Delete animals
if (isset($_GET['delete'])) {
 $ID = $_GET['delete'];
 $TYPE = $_GET['type'];
 $mysqli->query("DELETE FROM animals WHERE id=$ID") or die($mysqli->error());
 $_SESSION['message'] = "Record has been deleted!";
 $_SESSION['msg_type'] = "danger";
 if ($TYPE == "cat") {
 header('location: CatPage.php');
 } else {
 header('location: DogPage.php');
 }
}

// Update animals
if(isset($_POST['updatedata']))
{
 $ID = $_POST['id'];
 $NAME= $_POST['name'];
 $AGE = $_POST['age'];
 $BREED = $_POST['breed'];
 $TYPE = $_POST['type'];
 $GENDER = $_POST['gender'];

 $query = ("UPDATE animals SET gender = '$GENDER', name = '$NAME', age = '$AGE' , breed = '$BREED', type = '$TYPE' WHERE id = '$ID'")or die($mysqli->error());
 $query_run = mysqli_query($mysqli,$query);

 if($query_run){
 if ($TYPE == "dog") {
 header("location: DogPage.php");
 }
 else {
 header("location: CatPage.php"); 
 }
 }
 else
 {
 echo '<script> alert("error animal not updated"); </script>';
 }
}

// Admin login
if(isset($_POST['login'])) {
 $email = $_POST['email'];
 $password = $_POST['password'];
 $salt1 = "$%8140569mm~&3o";
 $salt2 = "njofnbpaa90**%2";
 $combined = $salt1 . $password . $salt2;
 $sql = "SELECT email FROM admin WHERE email = '" . $email . "' AND password = PASSWORD('" . $combined . "')";
 $result = $mysqli->query($sql);
 if (!empty($result) && $result->num_rows > 0) {
 $_SESSION["email"] = $email;
 header('location: index.php');
 }
 else {
 echo "Error: User not found";
 }
}
?>