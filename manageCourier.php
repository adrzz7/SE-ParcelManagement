<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username']))
{ header("Location:login.php"); }
?>

<!DOCTYPE html>
<html>
<title>Manage Courier</title>
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
        /*center content*/
        .contentCourier{
            max-width: 1000px;
            min-width: 800px;
            margin: auto;
            padding: 10px;
        }
        /*courier title*/
        .resPic{
            width: 100%;
            max-width: 10em;
            height: auto;
            padding-top: 5%;
        }

        .containerAddbtn { 
            height: 40px;
            margin-bottom: 25px;
            position: relative;
        }

        .AddCourier {
            margin: 0;
            position: absolute;
            top: 50%;
            left:100%;
            margin-left: -11%;
            margin-bottom: 15px;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .leftBorder{
            border-left: 1.5px solid #336b65;
        }

        .rightBorder{
            border-right: 1.5px solid #336b65;
        }

        .tableCourier th {  
            border-bottom: 1.5px solid #336b65;
            text-align: left;
            font-weight: normal;
        }

        .tableCourier table {
            border: 1.5px solid #336b65;
            border-collapse: collapse;
            width: 100%;
        }

        .tableCourier th, td {
            padding: 5px;
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
        }
        .edit_btn{
            text-decoration: none;
            color: black;
        }

        .edit_btn:hover{
            text-decoration: none;
            color: grey;
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

<div class="contentCourier">
        <!--title-->
    <div>
        <img src="pictures/courierlist.png" class="resPic">
    </div>
    <!--add button-->
    <div class="containerAddbtn">
        <div class="AddCourier">
            <input type="button" onclick="window.location='addCourier.php'" class="button AddBtn" value="Add Courier"/>
        </div>
    </div>


    <!--fetch data-->
    <?php
			$sql = "SELECT * FROM courier";
			$data = mysqli_query($con, $sql);
      $row = mysqli_num_rows($data);

    ?>
    
    <!--table-->
    <div class="tableCourier">
    <table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <th style="width:5%;" scope="col" class="rightBorder">No.</th>
            <th style="width:12%;" scope="col" class="rightBorder">Courier ID</th>
            <th style="width:15%;" scope="col" class="rightBorder">Username</th>
            <th style="width:55%;" scope="col" >Courier Service Provider</th>
            <th style="width:2%;" scope="col" ></th>
            <th scope="col" class="leftBorder" style="text-align:center;">Actions</th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>

            <td scope="row" class="rightBorder"><?php echo $bil;?></td>
			<td class="rightBorder"><?php echo $result['courier_ID'];?></td>
			<td class="rightBorder"><?php echo $result['courier_username'];?></td>
            <td><?php echo $result['courier_name'];?></td>
            <td style="text-align:center;">
                <a href="viewCourierDetails.php?id=<?php echo $result['courier_ID']; ?>" class="edit_btn" >view</a>
            </td>
            <td  class="leftBorder" style="text-align:center;">
                <a href="editCourier.php?id=<?php echo $result['courier_ID']; ?>" class="edit_btn" ><i class="fa fa-edit"></i></a>
                <a href="staffCourier_Action.php?deleteCourier=<?php echo $result['courier_ID']; ?>" class="edit_btn" ><i class="fa fa-trash-o"></i></a>
            </td>

          </tr>

          <?php
          $bil++;

					}
				?>

        </tbody>
      </table>
      </table>
    </div>
</div>
    
</body>
</html>