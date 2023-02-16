<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username']))
{ header("Location:login.php"); }

$parcelid = $_GET['parcelid'];

$res = mysqli_query($con, "SELECT * FROM parcel WHERE parcel_ID = $parcelid");
?>

<!DOCTYPE html>
<html>
<title>View Customer</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
            margin: 0;
            padding: 0;
        }

        .staffBody{
            background-color: #fbf3e4;
        }

        <?php include 'headerStaff.css'; ?>

        /*back button*/
        .button {
            border: none;
            color: white;
            padding: 5px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.2s;
            cursor: pointer;
        }

        .AddBtn {
            margin-top: 3%;
            margin-right: 12%;
            float:right;
            background-color: #c22f3c;
            color: white;
        }

        .AddBtn:hover {
            background-color: #dfd8ca;
            color: black;
        }
        .back-button {
          left: 0;
          float:right;
          font-size: 20px;
          text-align: center;
          margin-right: 150px;
        }
        .back-button:hover {
          background-color: yellow;
          color: black;
        }
        th,td,table{
          border: 2px solid black;
          background-color: white;
          width:1000px;
          text-align: center;
        }
        .cusDetails{
          border:10px;
          text-align: center;
          margin:auto;
          width: 300px;
          height: 400px;
          border-style: groove;
        }
        .custID{
          background-color: yellow;
          display:inline-block;
          border-style: double;
          padding: 5px;
          margin: 10px;
        }
    </style>
</head>
<body class="staffBody">
    <!--Navigation Bar-->
    <div class="navbar">
        <ul>
            <li><img src="pictures/logoStaff.png" style="height:35px; width:120px;padding-top:4.5px;padding-left:5px;padding-right:5px;"></li>
            <li><a href="homeStaff.php">Home</a></li>
            <li><a href="manageParcel.php">Parcel</a></li>
            <li><a href="manageCourier.php">Courier</a></li>
            <li><a class="active" href="viewCustomer.php">Customer</a></li>
            <li><a href="generateReport.php">Report</a></li>
            <div class="topnav-right">
                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fa fa-fw fa-user"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <!--END Navigation Bar-->
    <!--title-->
    <h1>Customer Details</h1>
    <div >
      <a href="viewCustomer.php">
        <button class="back-button"> Back </button>
      </a>
    </div>
<div class = custID>
  <h3>Customer ID <?php echo $parcelid; ?></h3>
</div>
  <div>
 <div class=cusDetails>
    <div class="card">
      <?php
        $row = mysqli_fetch_assoc($res);
      ?>
      <h3>Customer Name</h3>
      <p><?php echo $row['parcelCustomer_name'];?>  </p>
      <h3>Phone Number</h3>
      <p><?php echo  $row['parcelCustomer_phoneNumber'];  ?> </p>
      <h3>Customer Email</h3>
      <p><?php echo  $row['parcelCustomer_email'];  ?> </p>
      <h3>Home Address</h3>
      <p><?php echo  $row['parcelCustomer_address'];  ?> </p>
    </div>
  </div>
 </div>
</body>
</html>
