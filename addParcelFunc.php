<?php
include_once 'connection.php';
    $PstaffID = $_POST['PstaffID'];
    $COURIER_ID = mysqli_real_escape_string($con, $_POST['courier']);
        $PcourID = $COURIER_ID;
        
        if ($PcourID == 1)
      $courierprice = 10.82;
      else if ($PcourID == 2)
      $courierprice = 11.66;
      else if ($PcourID == 3)
      $courierprice = 12.35;
      else
      $courierprice = 55.27;

    $TN = $_POST['TN'];
    $Sname = $_POST['Sname'];
    $Sphonenumber= $_POST['Sphonenumber'];
    $Semail = $_POST['Semail'];
    $Saddress = $_POST['Saddress'];
    $Rname = $_POST['Rname'];
    $Rphonenumber = $_POST['Rphonenumber'];
    $Remail = $_POST['Remail'];
    $Raddress = $_POST['Raddress'];
    $weight = $_POST['weight'];
    $type = $_POST['type'];
    
    if ($type == "Fragile")
      $typeprice = 10.00;
      else
      $typeprice = 0.00;

      if ($weight <= 3)
      $weightprice = 2.00;
      else if ( $weight > 3 && $weight <= 5)
      $weightprice = 5.00;
      else if ($weight > 5 && $weight <= 10)
      $weightprice = 10.00;
      else if ($weight > 10 && $weight <= 15)
      $weightprice = 20.00;
      else if ($weight > 15 && $weight <= 20)
      $weightprice = 35.00;
      else
      $weightprice = 45.00;

    $cost= $_POST['cost'];

    $totalcost = $courierprice + $typeprice + $weightprice;


    $stats= $_POST['stats'];

   
  
    $sql= "INSERT INTO parcel(parcel_staffID, parcel_courierID, parcel_trackingNumber, parcel_weight, parcel_type, parcel_totalPrice, parcel_status, parcelCustomer_name, parcelCustomer_phoneNumber, parcelCustomer_email, parcelCustomer_address, parcelRecipient_name, parcelRecipient_phoneNumber, parcelRecipient_email, parcelRecipient_address)
                VALUES ('$PstaffID','$PcourID','$TN','$weight','$type','$totalcost','$stats','$Sname','$Sphonenumber','$Semail','$Saddress','$Rname','$Rphonenumber','$Remail','$Raddress');";

        mysqli_query($con,$sql);
        header("Location:manageParcel.php?addParcel=success");
