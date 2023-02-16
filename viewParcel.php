<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username']))
{ header("Location:login.php"); }
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
    Customer
    <!--add button-->
    <!-- <div class="AddCourier">
        <input type="button" onclick="window.location='addCourier.php'" class="button AddBtn" value="Add Courier"/>
    </div> -->

    <!--fetch data-->
    <?php
    $sql = "SELECT * FROM parcel";
    $data = mysqli_query($con, $sql);
    $row = mysqli_num_rows($data);

    ?>

    <!--table-->
    <div class="table">
    <table id="table" class=" table table-responsive table-hover table-sm table-bordered">
        <thead class="thead-dark">
            <th scope="col">No.</th>
          <th scope="col">Parcel ID</th>
          <th scope="col">StaffID</th>
          <th scope="col">CourierID</th>
          <th scope="col">Tracking Number</th>
          <th scope="col">Weight</th>
          <th scope="col">Parcl Type</th>
          <th scope="col">Total Price</th>
          <th scope="col">Status</th>
          <th scope="col">CustomerName</th>
          <th scope="col">Customer Phonenumber</th>
          <th scope="col">Customer Email</th>
          <th scope="col">Customer Address</th>
          <th scope="col">Recipient Name</th>
          <th scope="col">Recipient Phonenumber</th>
          <th scope="col">Recipient Email</th>
          <th scope="col">Recipient Address</th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>

            <th scope="row"><?php echo $bil;?></th>
			<td><?php echo $result['parcel_ID'];?></td>
			<td><?php echo $result['parcel_staffID'];?></td>
      <td><?php echo $result['parcel_courierID'];?></td>
      <td><?php echo $result['parcel_trackingNumber'];?></td>
      <td><?php echo $result['parcel_weight'];?></td>
      <td><?php echo $result['parcel_type'];?></td>
      <td><?php echo $result['parcel_totalPrice'];?></td>
      <td><?php echo $result['parcel_status'];?></td>
      <td><?php echo $result['parcelCustomer_name'];?></td>
      <td><?php echo $result['parcelCustomer_phoneNumber'];?></td>
      <td><?php echo $result['parcelCustomer_email'];?></td>
      <td><?php echo $result['parcelCustomer_address'];?></td>
      <td><?php echo $result['parcelRecipient_name'];?></td>
      <td><?php echo $result['parcelRecipient_phoneNumber'];?></td>
      <td><?php echo $result['parcelRecipient_email'];?></td>
      <td><?php echo $result['parcelRecipient_address'];?></td>


            <!-- <td style="width:165px; text-align:center;">
              <button type="button"  class=" btn btn-info EDIT" name="button"  data-toggle="modal" data-target="#editModal<?php echo $result['courier_ID']; ?>" >view</button>
            </td>
            <td style="width:165px; text-align:center;">
              <button type="button"  class=" btn btn-info EDIT" name="button"  data-toggle="modal" data-target="#editModal<?php echo $result['courier_ID']; ?>" ><i class="fa fa-edit"></i>  </button>
            </td>
            <td style="width:165px; text-align:center;">
                <button type="button"  id="deletebutton" class=" btn btn-danger delete"  value="<?php echo $result['courier_ID'] ; ?>" name="delete"><i class="fa fa-trash-o"></i></button>
            </td> -->


          </tr>

          <?php
          $bil++;

          //include 'modaledit.php';
					}
				?>

        </tbody>
      </table>
      </table>
    </div>


</body>
</html>
