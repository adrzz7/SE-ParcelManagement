<?php
session_start();
include 'connection.php';

    $courier_ID = $_GET['id'];
    $sql = "SELECT * FROM courier WHERE courier_ID=$courier_ID";
    $result = mysqli_query($con, $sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $courier_usersID         = $row['courier_usersID'];
        $courier_username        = $row['courier_username'];
        $courier_password        = $row['courier_password'];
        $courier_name            = $row['courier_name'];
        $courier_price           = $row['courier_price'];
        $courier_description     = $row['courier_description'];
    }
    /*if (count($data) == 1 ) {
        $n = mysqli_fetch_array($data);
        $name = $n['name'];
        $address = $n['address'];
        $courier_ID              = $n['courierID'];
        $courier_usersID         = $n['courier_usersID'];
        $courier_username        = $n['courier_username'];
        $courier_password        = $n['courier_password'];
        $courier_name            = $n['courier_name'];
        $courier_price           = $n['courier_price'];
        $courier_description     = $n['courier_description'];
    }*/

?>

<!DOCTYPE html>
<html>
<title>EDIT Courier</title>
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
            padding: 5px 9px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.2s;
            cursor: pointer;
        }

        .backBtn {
            margin-top: 2%;
            margin-left: 4%;
            background-color: #c22f3c; 
            color: white; 
        }

        .backBtn:hover {
            background-color: #dfd8ca;
            color: black;
        }

        /*center content*/
        .contentCourier{
            max-width: 900px;
            min-width: 800px;
            margin: auto;
            padding: 0px;
            text-align: left;
        }
        .contentCourier form{
            margin-left: 30%;
        }
        .courierViewForm{
            border: 2.1px solid #336b65;
            margin-top: 15px;
        }

        /*courier title*/
        .resPic{
            margin-top: -11%;
            width: 100%;
            max-width: 15em;
            height: auto;
        }
        /*form css*/
        .courierForm{
            padding-top: 20px;
            padding-bottom: 10px;
        }

        .form-group{
            margin-bottom: 0.5em;
        }

        input[type=text], select textarea {
            padding: 5px;
            margin: 5px 0;
            display: inline-block;
            border: none;
            background-color: #dfd8ca;;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            padding: 5px;
            margin: 5px 0;
            display: inline-block;
            border: none;
            background-color: #dfd8ca;;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        form label{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 0.9em;
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
            <li><a class="active" href="manageCourier.php">Courier</a></li>
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

    <!--back button-->
    <input type="button" class="button backBtn" name="Back" value="<   Back" onClick="window.location.href='manageCourier.php';" />

    <div class="contentCourier">
        <!--title-->
        <div>
            <img src="pictures/courierdetails.png" class="resPic">
        </div>


        <div class="courierViewForm">
            <!-- view form-->
            <form action="staffCourier_Action.php?id=<?php echo $courier_ID; ?>"  method="post" class="courierForm">

                <input type="hidden" name="courier_usersID" value="<?php echo $courier_usersID;?>" readonly>
                
                <div class="form-group">
                    <label for="courier_username" >Courier ID</label><br>
                    <input  type="text" name="courier_ID" value="<?php echo $courier_ID;?>" readonly style="width:9%">
                </div>

                <div class="form-group">
                    <label for="courier_username" >Username</label><br>
                    <input type="text" class="form-control"  name="courier_username" required placeholder ="Username" value="<?php echo $courier_username;?>" readonly style="width:15%">
                </div>

                <div class="form-group">
                    <label for="courier_password" >Password</label><br>
                    <input type="text" class="form-control"  name="courier_password" required placeholder ="Password" value="<?php echo $courier_password;?>" readonly style="width:20%">
                </div>

                <div class="form-group">
                    <label for="courier_name" >Name</label><br>
                    <input type="text" class="form-control"  name="courier_name" required placeholder ="Name" value="<?php echo $courier_name;?>" readonly style="width:40%">
                </div>

                <div class="form-group">
                    <label for="courier_price" >Price</label><br>
                    <input type="text" class="form-control"  name="courier_price" required placeholder ="Price" value="RM <?php echo $courier_price;?>" readonly style="width:15%"> 
                </div>

                <div class="form-group">
                    <label for="courier_description" >Description</label><br>
                    <textarea rows="4" cols="50" name="courier_description" required placeholder ="Description" readonly><?php echo $courier_description;?></textarea>
                </div>

            </form>
        </div>
    </div>
</body>
</html>