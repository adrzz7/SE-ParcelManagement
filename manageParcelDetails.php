<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username'])){ 
    session_destroy();
    // Redirect to login page
    header("location: login.php"); 
}

$parcelid = $_GET['parcelid'];

$res = mysqli_query($con, "SELECT * FROM parcel WHERE parcel_ID = $parcelid");
?>

<!DOCTYPE html>
<html>
<title>View Parcel</title>
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
        table {
          border: 2px solid black;
          background-color: white;
          /* width:1000px; */
          text-align: center;
        }

        .sender {
          top:0%;
          left:0%;
          width:50%;
          display:inline-block;
        }


        .receiver {
          top:0%;
          right:0%;
          width:50%;
          display:inline-block;
        }

        .card {
           background-color: white;
           padding: 20px;
           margin-top: 20px;
           border:10px;
           border-style: double;
           margin: 10px;
        }
        .footer {
          padding: 20px;
          background: white;
          margin-top: 20px;
          float: left;
          width: auto;
          border: 2px solid black;
        }
        .parcelid{
          border:3px solid black;
          background-color: yellow;
          width:100px;
          display:block;
        }
    </style>
</head>
<body class="staffBody">
    <!--Navigation Bar-->
    <div class="navbar">
        <ul>
            <li><img src="pictures/logoStaff.png" style="height:35px; width:120px;padding-top:4.5px;padding-left:5px;padding-right:5px;"></li>
            <li><a href="homeStaff.php">Home</a></li>
            <li><a class="active" href="manageParcel.php">Parcel</a></li>
            <li><a href="manageCourier.php">Courier</a></li>
            <li><a href="viewCustomer.php">Customer</a></li>
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
    <h1>Parcel Details</h1>
    <div >
      <a href="manageParcel.php">
        <button class="back-button"> Back </button>
      </a>
    </div>
<div class="parcelid">
  <h3>Parcel ID <?php echo $parcelid; ?></h3>
</div>
  <div>
 <div class=sender>
    <div class="card">
      <h2>Sender Details</h2>
      <?php
        $row = mysqli_fetch_assoc($res);
      ?>
      <h3>Name</h3>
      <p><?php echo $row['parcelCustomer_name'];?>  </p>
      <h3>Phone Number</h3>
      <p><?php echo  $row['parcelCustomer_phoneNumber'];  ?> </p>
      <h3>Email</h3>
      <p><?php echo  $row['parcelCustomer_email'];  ?> </p>
      <h3>Home Address</h3>
      <p><?php echo  $row['parcelCustomer_address'];  ?> </p>
    </div>
  </div>

  <div class=receiver>
     <div class="card">
       <h2>Receiver Details</h2>
       <h3>Receiver Name</h3>
       <p><?php echo $row['parcelRecipient_name'];?>  </p>
       <h3>Phone Number</h3>
       <p><?php echo  $row['parcelRecipient_phoneNumber'];  ?> </p>
       <h3>Email</h3>
       <p><?php echo  $row['parcelRecipient_email'];  ?> </p>
       <h3>Home Address</h3>
       <p><?php echo  $row['parcelRecipient_address'];  ?> </p>
     </div>
   </div>

   <div class="footer">
         <h2>Parcel Details</h2>
         <br>
    <table class="order"  width="1200px"  >
         <tr>
         <td colspan="6"><hr></td>
         </tr>
         <thead>
           <th >Weight</th>
           <th >Type</th>
           <th >Total Price</th>
         </thead>


         <tr>
           <td style="text-align:center"><?php echo $row['parcel_weight'];?> kg</td>
           <td style="text-align:center"><?php echo $row['parcel_type'];?></td>
           <td style="text-align:center"> RM <?php echo $row['parcel_totalPrice'];?></td>
         </tr>
         <!-- <tr>
           <td colspan="3"><hr></td>
         </tr> -->
         <!-- <tr>
           <td style="text-align:right" colspan="3"></td>
         </tr> -->

   </table>
  </div>

  </div>
</body>
</html>
