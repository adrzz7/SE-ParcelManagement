<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username'])){ 
    session_destroy();
    // Redirect to login page
    header("location: login.php"); 
}
?>
<!DOCTYPE html>
<html>
<title>Manage Parcel</title>
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

        .addbtn {
            padding:10px;
        }

        .AddBtn:hover {
            background-color: #dfd8ca;
            color: black;
        }
        a.button {
          -webkit-appearance: button;
          -moz-appearance: button;
          appearance: button;

          text-decoration: none;
          color: initial;
          }
          .back-button {
            font-size: 20px;
            text-align: center;
            /* margin-right:300px; */
            margin:auto;
            display:flex;
            display:grid;
            padding:5px;
          }
          .back-button:hover {
            background-color: yellow;
            color: black;
          }
          th,td,table{
            border: 2px solid black;
            background-color: white;
            width:550px;
            text-align: center;
            margin-left:auto;
            margin-right:auto;
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
    <h2 style="text-align:center; padding:10px;">View Parcel</h2>
    <!--add button-->
    <div class="addbtn">
      <a href="addParcel.php">
        <button class="back-button"> Add Parcel</button>
      </a>
    </div>
    <!-- <div class="AddCourier">
        <input type="button" onclick="window.location='addCourier.php'" class="button AddBtn" value="Add Courier"/>
    </div> -->
    <!--table-->
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">

                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Parcel ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $connection = mysqli_connect("localhost", "root", "", "parcelmanagement");

                        $no = 1;

                        $select = mysqli_query($connection, "select * from parcel");

                        while($data= mysqli_fetch_array($select)){
                            $parcelid =$data['parcel_ID'];
                    ?>
                    <tr>


                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['parcel_ID']; ?></td>
                        <td><?php echo $data['parcelCustomer_name']; ?></td>
                        <td>
                            <button class="btn btn-sm btn-info" type='button'  value="<?php echo $parcelid ?>" onclick="window.location.href='manageParcelDetails.php?parcelid=<?php echo "$parcelid"  ?>'" name='detailbtn' >Parcel Details</button>
                        </td>

                      <?php } ?>
</body>
</html>
