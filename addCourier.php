<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['staff_username']))
{ header("Location:login.php"); }
?>

<!DOCTYPE html>
<html>
<title>Add Courier</title>
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

        /*button*/
        .btnCourier {
            border: none;
            color: white;
            background-color: #c22f3c;
            padding: 5px 48px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.2s;
            cursor: pointer;
        }

        .btnCourier:hover {
            background-color: #dfd8ca;
            color: black;
        }

        .btnCancel {
            border: none;
            color: grey;
            background-color: transparent;
            padding: 10px 138px 5px 35px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.2s;
            cursor: pointer;
        }

        .btnCancel:hover {
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
            margin-top: 3%;
            margin-bottom: 1%;
            width: 100%;
            max-width: 15em;
            height: auto;
        }
        /*form css*/
        .courierForm{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .form-group{
            margin-bottom: 0.5em;
        }

        input[type=text], select textarea, [type=float] {
            padding: 5px;
            margin: 5px 0;
            display: inline-block;
            border: none;
            background-color: #dfd8ca;;
            border-radius: 4px;
            box-sizing: border-box;
        }

        
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        input[type=number] {
            padding: 5px;
            margin: 5px 0;
            display: inline-block;
            border: none;
            background-color: #dfd8ca;;
            border-radius: 4px;
            box-sizing: border-box;
            -moz-appearance: textfield;
        }

        h5{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 0.7em;
            margin: 0px;
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
        /*password validation*/
        /* The message box is shown when the user clicks on the password field */
        #message {
            display:none;
            color: black;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 0.8em;
            font-weight: 100;
        }

        #message p {
            margin-left: 20px;
            margin-top: -10px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: black;
        }

        .valid:before {
            position: relative;
            color: green;
            left: -5px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: black;
        }

        .invalid:before {
            position: relative;
            left: -5px;
            color: red;
            content: "✖";
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
            <img src="pictures/addcourier.png" class="resPic">
        </div>
        <div class="courierViewForm">
            <!--FORM -->
            <form action="staffCourier_Action.php"  method="post" class="courierForm">
                <!--Generate ID and Username-->
                <?php
                   $sql = "SELECT * from courier";

                   if ($result = mysqli_query($con, $sql)) {
                   
                        // count num of rows from table
                        $idCount = mysqli_num_rows( $result );
                        //assign new id
                        $courier_ID = $idCount+1;
                        //add zeros for username
                        $id = sprintf( '%05d', $courier_ID );
                        //assign new username
                        $courier_username = "C" . $id;
                        // Display result
                        //echo $courier_username;
                    }
                ?>

                <div class="form-group">
                <label for="courier_ID" >Courier ID</label><br>
                <input type="text" class="form-control" name="courier_ID" value="<?php echo $courier_ID;?>" readonly style="width:8%; background-color:#ddd">
                </div>

                <input type="hidden" class="form-control"  name="courier_usersID" value="2">

                <div class="form-group">
                <label for="courier_username" >Username</label><br>
                <input type="text" id="courier_username" class="form-control"  name="courier_username" value="<?php echo $courier_username;?>" readonly style="width:15%; background-color:#ddd">
                </div>

                <div class="form-group">
                <label for="courier_name" >Name</label><br>
                <input type="text" id="courier_name" class="form-control"  name="courier_name" required style="width:40%">
                </div>

                <div class="form-group">
                <label for="courier_password" >Password</label><br>
                <input type="text" id="courier_password" class="form-control"  name="courier_password" required style="width:20%" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                    <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>6 characters</b></p>
                    </div>

                <div class="form-group">
                <label for="courier_price" >Price</label><br><h5>RM
                <input type="float" id="courier_price" class="form-control"  name="courier_price" required style="width:15%">
                </h5>
                </div>

                <div class="form-group">
                <label for="courier_description" >Description</label><br>
                <textarea rows="4" id="courier_description" cols="50" name="courier_description" required></textarea>
                
                </div>
                <div>
                    <input type="button" class="btnCancel" name="Cancel" value="Cancel" onClick="window.location.href='manageCourier.php';" />
                    <button  class="btnCourier" type="submit" name="addcourier" >Add</button>
                </div>
            </form>
        </div>
    </div>

    <script>
var myInput = document.getElementById("courier_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</body>
</html>