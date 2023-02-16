<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['courier_username'])){ 
    session_destroy();
    // Redirect to login page
    header("location: login.php"); 
}
?>
<!DOCTYPE html>
<html>
<title>COURIER</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        <?php include 'headerCourier.css'; ?>

        /*center picture*/
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        /*2 column*/
        * {
            box-sizing: border-box;
        }
        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        /*home picture*/
        .homePic{
            width:130%;
            padding-top: 20%;
            margin-left: -15%;
        }

        /*text*/
        .center h1{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 3.5em;
            width: 150%;
            text-align: center;
            padding-top: 25%;
            margin-left: -40%;
        }
        .center h3{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: lighter;
            font-size: 1.9em;
            width: 120%;
            text-align: center;
            margin-left: -20%;
        }
    </style>
</head>


<body>
   <!--Navigation Bar-->
   <div class="navbar">
        <ul>
            <li><img src="pictures/logoCourier.png" style="height:35px; width:120px;padding-top:4.5px;padding-left:5px;padding-right:5px;"></li>
            <li><a class="active" href="homeCourier.php">Home</a></li>
            <li><a href="parcelCourier.php">Parcel</a></li>
            <li style="float:right;"><a href="logout.php"><i class="fa fa-sign-out"></i>   Log out</a>
        </ul>
    </div>
    <!--END Navigation Bar-->



    <div class="row">
        <div class="column">
            <div class="center">
                <img src="pictures/homeCourier.png" class="homePic">
            </div>
            
        </div>
        <div class="column">
            <div class="center" style="margin-left:20%">
                <h1>Welcome to Courier Home Page</h1>
                <h3>Always deliver earlier than expected</h3>
            </div>
            
        </div>
    </div>
</body>
</html>