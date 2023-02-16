<?php
session_start();
include "connection.php";

if(isset($_POST['username']) && isset($_POST['pwd'])){

    $username = $_POST['username'];
    $pwd= $_POST['pwd'];

    //Query the database to use
    $sql = "select * from staff where staff_username = '$username' and staff_password = '$pwd'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    //check username and password validation
    if ($count == 1) {
        $_SESSION['staff_username']=$username;
        $_SESSION['staff_ID']= $row['staff_ID'];
        header("location: homeStaff.php");
    } else {
        
        $username = $_POST['username'];
        $pwd= $_POST['pwd'];
    
        //Query the database to use
        $sql = "select * from courier where courier_username = '$username' and courier_password = '$pwd'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
    
        //check username and password validation
        if ($count == 1) {
            $_SESSION['courier_username']=$username;
            $_SESSION['courier_ID']= $row['courier_ID'];
            header("location: homeCourier.php");
        }else{
            $message = "Invalid Username/Password entered!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Login</title>
    <style>
        body{ 
            font: 14px sans-serif; 
            background-color: #dfd8ca;
        }
        .wrapper{ width: 360px; padding: 20px; }
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        #div_login{
            max-width: 1100px;
            min-width: 300px;
            margin: auto;
        }
        #div_login .column{
            border-top:2px solid #ddd;
            border-left:2px solid #ddd;
            border-bottom:2px solid #ddd;
        }

        .loginTitle{
            font-family: "Times New Roman", Times, serif;
            color: #105652;
            font-weight:100;
            text-align: center;
            font-size: 2em;
        }

        .resPic{
            width: 100%;
            max-width: 400px;
            height: auto;
            text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 5%;
            padding-bottom: 15%;
        }
        .userPic{
            width: 100%;
            max-width: 50px;
            height: auto;
            text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 60px;
        }
        
        /*text*/
        .login{
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            font-weight:100;
            text-align: center;
            font-size: 1.5em;
            padding:0px;
            margin-top: 3px;
        }
        .centerContent{
            max-width: 500px;
            margin: auto;
            padding: 10px;
            text-align: center;
        }
        .centerContent input{
            font-size: 1.2em;
        }
        .centerContent i{
            font-size:20px;
            color:white;
            padding: 8px;
        }

        /*login button*/
        .button {
            border: none;
            color: white;
            padding: 5px 100px;
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
            background-color: #c22f3c; 
            color: white; 
        }

        .AddBtn:hover {
            background-color: #dfd8ca;
            color: black;
        }
        
        /*center login button*/
        .container { 
            height: 100px;
            position: relative;
        }

        .centerbtn {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 51%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <div id="div_login">
                <div class="row" style="padding-top: 10%;">
                    <div class="column" style="background-color:white;height:35em;">
            
                        <div>
                            <h2 class="loginTitle">PARCEL SYSTEM</h2>
                        </div>
                        <div>
                            <img src="pictures/loginPic.png" class="resPic">
                        </div>
                    </div>
                    <div class="column" style="background-color:#105652; height:35em;">
                        <div>
                            <div>
                                <img src="pictures/loginUser.png" class="userPic">
                            </div>
                            <div>
                                <h2 class="login">Log in</h2>
                            </div>
                            <div class="centerContent">
                                <i class="fas fa-user-alt"style="margin-top:5px"></i>
                                <input type="text" class="textbox" id="txt_uname" name="username" placeholder="Username" />
                            </div>
                            <div class="centerContent"> 
                                <i class="fas fa-lock"></i>
                                <input type="password" class="textbox" id="txt_uname" name="pwd" placeholder="Password"/>
                            </div>
                            <div class="container">
                                <div class="centerbtn">
                                    <input type="submit" value="Login" class="button AddBtn" name="submitBtn" id="but_submit" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>