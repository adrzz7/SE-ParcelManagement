<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';
include_once 'connection.php';


if (isset($_POST['email'])){

    $PARCEL_ID = $_POST['pid'];

			$res = mysqli_query($con,"SELECT *
				FROM parcel
				WHERE parcel_ID  = $PARCEL_ID");

      $row = mysqli_fetch_assoc($res);
      $custname = $row['parcelCustomer_name'];
      $emailcust = $row['parcelCustomer_email'];    
      $reciepientname = $row['parcelRecipient_name'];
      $emailreciepient = $row['parcelRecipient_email'];
      $trackno = $row['parcel_trackingNumber'];

      $mail = new PHPMailer(true);

          //Server settings
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'parcelmngmnt@gmail.com';               // SMTP username
          $mail->Password   = 'parcelmanagement';                     // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('parcelmngmnt@gmail.com', 'Parcel Management System');
          $mail->addAddress($emailcust, $custname);                 // Sender
          $mail->addAddress($emailreciepient, $reciepientname);     // Receiver

        // Content
          $mail->isHTML(true);                                      // Set email format to HTML
          $mail->Subject = 'Tracking Number';
          $mail->Body    = "<b> Your parcel is confirmed ! </b> <br/> Thank you for showing your support ❤. <br/><br/>Your goods are on the way to your doorsteps. <br/><br/>Here is Tracking No of your item $trackno.<br/><br/> Have a pleasant day and continue to support our system. Thank you !";

          $mail->send();

            ?>
						                <script type="text/javascript">
						              	window.location.href='parcelCourier.php';
						              	</script>

            <?php

}



 ?>
