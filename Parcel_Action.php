<?php
include 'connection.php';


if (isset($_POST['update'])) {

    $PARCEL_ID = $_POST['pid'];
    $TUTORIAL_Description =  $_POST['parcel_status'];
    $TUTORIAL_Name =  $_POST['parcel_trackingNumber'];
    
    $sql = "UPDATE parcel SET  parcel_trackingNumber='$TUTORIAL_Name', parcel_status='$TUTORIAL_Description' WHERE parcel_ID='$PARCEL_ID' ";
    mysqli_query($con, $sql);
    
    }

 ?>


 <script type="text/javascript">
 window.location.href="parcelCourier.php";
 </script>
