<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username'])){ 
    session_destroy();
    // Redirect to login page
    header("location: login.php"); 
}
$staff_ID = $_SESSION['staff_ID'];
?>
<!DOCTYPE html>
<html>
<title>Add Parcel</title>
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
        .form-control{
          width:500px;
          height: 25px;
        }
        .receiver {
          display:inline-block;
          margin:0 auto;
          border:2px solid #333;
          border-radius: 2px;
          margin:20px;
          padding:5px;
          left:50px;
          bottom:100px;
          /* float:right;   */
          bottom:0%;
          left:0%;
        }
        .sender {
          display:inline-block;
          margin:0 auto;
          border:2px solid #333;
          border-radius: 2px;
          margin:20px;
          padding:5px;
          /* float:right; */
          position:static;
          top:0%;
          left:0%;
        }
        .parcel {
          display:inline-block;
          margin:0 auto;
          border:2px solid #333;
          border-radius: 2px;
          float:left;
          margin:20px;
          padding:5px;
          top:0%;
          right:0%;
        }
        .staff {
          display:inline-block;
          margin:0 auto;
          border:2px solid #333;
          border-radius: 2px;
          float:left;
          margin:20px;
          padding:5px;
          bottom:0%;
          right:0%;
        }
        .button{
          position: absolute;
          right:0%;
          bottom:0%;

        }
        .textbtn{
            font-size: 20px;
        }
        .textbtn:hover {
            background-color: yellow;
            color: black;
        }
        #hidden_div {
    display: none;
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
    <h2 style="text-align:center;">Add Parcel</h2>


    <!--FORM -->
    <form action="addParcelFunc.php"  method="POST">
        <input type="hidden" name="id" value="<?php echo $n[0]; ?>">
        <input type="hidden" class="form-control"  name="courier_usersID" value="2">
<div class="staff">
        <div class="form-group">
        
        <label for="courier_username" >Parcel Staff ID</label> &nbsp;&nbsp;
        
        <input type="text" class="form-control" value="<?php echo $staff_ID; ?>" name="PstaffID" required placeholder ="Parcel Staff ID" readonly = 'readonly'> 
        <!-- <input type="text" class="form-control"  name="PstaffID" required placeholder ="Parcel Staff ID"> -->
        </div>
<br>
<label for="courier">Courier </label>
                                           <select name="courier" class="form-control"  required >
                                                 <option selected="selected" >  Select a Courier </option>
                                                   <?php
                                                   $res =  mysqli_query($con, "SELECT * FROM courier");
                                                   while($displaycourier = mysqli_fetch_assoc($res)) :
                                                   ?>
                                                     <option value="<?php echo $displaycourier['courier_ID']; ?>"><?php echo $displaycourier['courier_name']; ?></option>
                                                   <?php 
                                                   
                                                   
                                                   endwhile;
                                                   
                                                   ?>
                                                   
                                           </select>
<br>

<br> 
        <div class="form-group">
        <input type="hidden" class="form-control" value="-" readonly = 'readonly' name="TN"  placeholder ="Tracking Number">
        </div>
</div>
<div class="sender">
        <div class="form-group">
        <label for="courier_username" >Sender Name</label>
        <input type="text" class="form-control"  name="Sname" required placeholder ="Sender Name">
        </div>
<br>
        <div class="form-group">
        <label for="courier_password" >Sender Phone Number</label>
        <input type="tel" class="form-control"  name="Sphonenumber" required placeholder ="Sender Phone Number">
        </div>
<br>
        <div class="form-group">
        <label for="courier_name" >Sender Email</label>
        <input type="text" class="form-control"  name="Semail" required placeholder ="Sender Email">

        </div>
<br>
        <div class="form-group">
        <label for="courier_price" >Sender Address</label>
        <input type="text" class="form-control"  name="Saddress" required placeholder ="Sender Address">
        </div>
<br>
</div>
<div class=receiver>
        <div class="form-group2">
        <label for="courier_description" >Receiver Name</label>
        <input type="text" class="form-control"  name="Rname" required placeholder ="Receiver Name">
        </div>
<br>
        <div class="form-group2">
        <label for="courier_description" >Receiver Phone Number</label>
        <input type="tel" class="form-control"  name="Rphonenumber" required placeholder ="Receiver Phone Number">
        </div>
<br>
        <div class="form-group2">
        <label for="courier_description" >Receiver Email</label>
        <input type="text" class="form-control"  name="Remail" required placeholder ="Receiver Email">
        </div>
<br>
        <div class="form-group2">
        <label for="courier_description" >Receiver Address</label>
        <input type="text" class="form-control"  name="Raddress" required placeholder ="Receiver Address">
        </div>
</div>
<div class="parcel">
<br>
        <div class="form-group">
        <label for="courier_description" >Parcel Weight (kg)</label>
        <input type="text" class="form-control"  name="weight" required placeholder ="Parcel Weight"> kg

        </div>
<br>
        <div class="form-group">
        <label for="courier_description" >Parcel Type</label>
        <select class="form-control"name="type">
            <!-- <option selected="selected" disabled>Parcel Type</option>                                                                -->
            <option  value="Fragile">Fragile</option>
             <option  value="Non-Fragile">Non-Fragile</option>
        </select>

        </div>
        <div class="form-group">
        <input type="hidden" class="form-control"  name="cost" required placeholder ="Total Cost">
        </div>
        
        <div class="form-group">
        <input type="hidden" value="-" readonly = 'readonly' class="form-control"  name="stats" required placeholder ="Parcel Status">
        </div>
<br>
</div>

<div class=button>
        <button class=textbtn onclick="cancelBtn()">Cancel</button>
        <button class=textbtn type="submit" name="submit" >Add Parcel</button>
</div>


        <script>
            function cancelBtn() {
            location.replace("manageParcel.php")
            }

</script>
</body>
</html>
