<?php
include 'connection.php';

//ADD COURIER
if (isset($_POST['addcourier']))
{
  //courier user type
  $courier_ID            = mysqli_real_escape_string($con,$_POST['courier_ID']);
  $courier_usersID            = mysqli_real_escape_string($con,$_POST['courier_usersID']);
  $courier_username            = mysqli_real_escape_string($con,$_POST['courier_username']);
  $courier_password            = mysqli_real_escape_string($con,$_POST['courier_password']);
  $courier_name            = mysqli_real_escape_string($con,$_POST['courier_name']);
  $courier_price            = mysqli_real_escape_string($con,$_POST['courier_price']);
  $courier_description            = mysqli_real_escape_string($con,$_POST['courier_description']);

  echo $courier_name;
  echo $courier_username;
  echo $courier_password;
  echo $courier_usersID;
  echo $courier_price;
  echo $courier_description;

  mysqli_query($con, "INSERT INTO courier (courier_ID, courier_usersID , courier_username , courier_password , courier_name , courier_price, courier_description  ) VALUES ('$courier_ID', '$courier_usersID','$courier_username', '$courier_password', '$courier_name', '$courier_price','$courier_description')");
  header('location: manageCourier.php');

}

//delete
if (isset($_GET['deleteCourier'])) {

  $courier_ID = $_GET['deleteCourier'];
  $sql = "DELETE FROM courier WHERE courier_ID = $courier_ID";
  mysqli_query($con,$sql);
  header('location: manageCourier.php');

}

//update courier
if (isset($_POST['updatecourier'])) {

  $courier_ID              = $_GET['id'];
  $courier_usersID         = $_POST['courier_usersID'];
  $courier_username        = $_POST['courier_username'];
  $courier_password        = $_POST['courier_password'];
  $courier_name            = $_POST['courier_name'];
  $courier_price           = $_POST['courier_price'];
  $courier_description     = $_POST['courier_description'];

  $sql = "UPDATE courier SET courier_ID ='$courier_ID', courier_usersID='$courier_usersID', courier_username='$courier_username', courier_password='$courier_password', courier_name='$courier_name', courier_price='$courier_price', courier_description='$courier_description' WHERE courier_ID ='$courier_ID' ";
  mysqli_query($con, $sql);
 header('location: manageCourier.php');
}



