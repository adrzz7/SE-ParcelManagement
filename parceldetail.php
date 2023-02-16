<?php
include_once 'connection.php';

// Get the variables.
$orderid = $_GET['orderid'];

$res = mysqli_query($con,"SELECT * FROM parcel WHERE parcel_ID  = $orderid");
?>

<!DOCTYPE html>
<html>
<head>
<title>Parcel Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}


body {
  font-family: Arial;
  padding: 20px;
  background: #213e3b;
}


.header {
  padding: 10px;
  font-size: 40px;
  text-align: center;
  background: white;
}


.leftcolumn {
  float: left;
  width: 50%;
}


.rightcolumn {
  float: left;
  width: 50%;
  padding-left: 20px;
}


.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.footer {
  padding: 20px;
  background: white;
  margin-top: 20px;
  float: left;
  width: 100%;
}

.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
}

.button {
  background-color: #41aea9; /* Green */
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
  width: 100px;
}

@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h3>Parcel ID <?php echo $orderid; ?></h3>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
    <h2>SENDER INFORMATION</h2>
    <?php

 $row = mysqli_fetch_assoc($res);
   ?>
    <h3>Name</h3>
      <p><?php echo $row['parcelCustomer_name'];?>  </p>
      <h3>Contact Number</h3>
      <p><?php echo  $row['parcelCustomer_phoneNumber'];  ?> </p>
      <h3>Email</h3>
      <p><?php echo  $row['parcelCustomer_email'];  ?> </p>
      <h3>Address</h3>
      <p><?php echo  $row['parcelCustomer_address'];  ?> </p>


      </div>


  </div>

  <div class="rightcolumn">
    <div class="card">
    <h2>RECEIVER INFORMATION</h2>
    <h3>Name</h3>
      <p><?php echo $row['parcelRecipient_name'];?>  </p>
      <h3>Contact Number</h3>
      <p><?php echo  $row['parcelRecipient_phoneNumber'];  ?> </p>
      <h3>Email</h3>
      <p><?php echo  $row['parcelRecipient_email'];  ?> </p>
      <h3>Address</h3>
      <p><?php echo  $row['parcelRecipient_address'];  ?> </p>

    </div>
</div>
<div class="footer">
      <h2>PARCEL INFORMATION</h2>
      <br>
      <table class="order"  width="1200px"  >


<tr>
<td colspan="6"><hr></td>
</tr>
<thead>
  <th >Weight</th>
  <th >Type</th>
  <th >Total Price</th>
  <th >Status</th>
  <th >Tracking Number</th>
</thead>


<tr>
  <td style="text-align:center"><?php echo $row['parcel_weight'];?></td>
  <td style="text-align:center"><?php echo $row['parcel_type'];?></td>
  <td style="text-align:center"> RM <?php echo $row['parcel_totalPrice'];?></td>
  <td style="text-align:center"><?php echo$row['parcel_status'];?></td>
  <td style="text-align:center"><?php echo$row['parcel_trackingNumber'];?></td>


</tr>
<tr>
<td colspan="6"><hr></td>
</tr>
<tr>
<td style="text-align:right" colspan="3"></td>
</tr>

							
</table>
  </div>
</div>
<div class="btn">
<button class="button" type='button' onclick="window.location.href='parcelCourier.php'" name='detailbtn' >Back</button>
</div>
</body>
</html>
