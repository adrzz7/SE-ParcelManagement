<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['courier_username'])){ 
    session_destroy();
    // Redirect to login page
    header("location: login.php"); 
}
$courier_ID = $_SESSION['courier_ID'];
?>
<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Parcel</title>
                <!-- import bootstrap  -->
        
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	

    <style>
* {
	margin: 0;
	padding: 0;
}

.wrapper {
	width: 100%;
	margin: 0 auto;
}
header {
	height: 50px;
	background: #213e3b;
	width: 100%;
	z-index: 10;
	position: fixed;
  margin: 0;
	padding: 0;
}
.logo {
	
	float: left;
	line-height: 50px;
}
.logo a {
	text-decoration: none;
	font-size: 16px;
	color: #fff;
	letter-spacing: 5px;
}
nav {
	float: left;
	line-height: 50px;
}

.logout a{
	float: right;
  text-decoration: none;
	font-size: 16px;
	color: rgb(255, 255, 255);
  padding: 14px 16px;
}

nav a {
	text-decoration: none;
  padding: 14px 16px;
	font-size: 16px;
	color: #fff;
}

nav a:hover {
  text-decoration: none;
  background-color: #e8ffff;
  color: black;
}

.logout a:hover:not(.active) {
  text-decoration: none;
  background-color: #e8ffff;
  color: black;
  
}

.active {
  background-color: #41aea9;
  line-height: 50px;
  
}

.active:hover {
  text-decoration: none;
  background-color: #e8ffff;
  color: black;
}




        </style>
                </head>
                   
            <body>

            <header>
			<div class="wrapper">
				<div class="logo">
					<a href="#"><img src="pictures/logoCourier.png" style="height:35px; width:120px; "></a>
				</div>
				<nav>
					<a href="homeCourier.php">Home</a> 
                    <a class="active" href="parcelCourier.php">Parcel</a> 
                    
				</nav>
                <div class="logout">
                    <a href="logout.php"><i class="fa fa-sign-out"></i>   Log out</a>
                </div>
			</div>
		</header>
                <br>
               
                <div class="container col-lg-10">
                <br>
                <br>
                    
                    <h3  style="color:#41aea9; " role="alert">
                    <img src="pictures/parcel.jpg" style="height:90px; width:120px; "> Parcel
                    </h3>
                    <br>
                    
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    
                                    <tr>
                                        <th scope="col">Bil</th>
                                        <th scope="col">Parcel ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $connection = mysqli_connect("localhost", "root", "", "parcelmanagement");
            
                                        
                                        $no = 1;
            
                                        $query = "select * from parcel where parcel_courierID = $courier_ID";
                                        $select         = mysqli_query($connection, $query);
                                        $rowcount=mysqli_num_rows($select);
                                        
                                        if($rowcount >0){
                                        while($data= mysqli_fetch_array($select)){
                                            $orderid =$data['parcel_ID'];
                                    ?>
                                    <tr>
            
                                        
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['parcel_ID']; ?></td>
                                        <td><?php echo $data['parcelCustomer_name']; ?></td>
                                        <td><?php echo $data['parcelCustomer_phoneNumber']; ?></td>
                                        <td><?php echo $data['parcelCustomer_email']; ?></td>
                                        <td>
            
                                            
                                            <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?php echo $data['parcel_ID']; ?>">Edit</a>
                                            <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal1<?php echo $data['parcel_ID']; ?>">Email</a>
                                            <button class="btn btn-sm btn-info" type='button'  value="<?php echo $orderid ?>" onclick="window.location.href='parceldetail.php?orderid=<?php echo "$orderid"  ?>'" name='detailbtn' >Details</button>
							
            
                                
<!---------------------------------------------------------------------------update modal---------------------------------------------------------------------->                                                
                                            

                                            <div class="modal fade" id="modal<?php echo $data['parcel_ID']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Status & Tracking Number</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    
                                                        <div class="modal-body">
                                                            <form action="Parcel_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Parcel ID</label>
                                                                    <input type="text" class="form-control" name="pid" id="pid"
                                                                    readonly="readonly" value="<?php echo $data['parcel_ID']; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                <label for="day">Order Status :</label>
                                                                    <select class="form-control"name="parcel_status">
                                                                            <option selected="selected" value="<?php echo $data['parcel_status'];?>"><?php echo $data['parcel_status'];?></option>
                                                                            <?php 	 
                                                                            if (  $data['parcel_status']== "-"   )
                                                                                            {
                                                                                                
                                                                                $option2 ="In Transit";
                                                                                $option3 ="Picked Up";
                                                                                $option4 ="Delivered";

                                                                                }

                                                                            else  if (  $data['parcel_status']== "Picked Up"   ){
                                                                                $option2 ="In Transit";
                                                                                $option3 ="Delivered";
                                                                                $option4 ="-";
                                                                                    }

                                                                            else  if (  $data['parcel_status']== "In Transit"   ){
                                                                                    $option2 ="Picked Up";
                                                                                    $option3 ="Delivered";
                                                                                    $option4 ="-";
                                                                                    }
                                                                            else {
                                                                                $option2 ="Picked Up";
                                                                                $option3 ="In Transit";
                                                                                $option4 ="-";
                                                                            }

                                                                ?>
                                                                            <option  value="<?php echo $option2   ?>"><?php echo $option2   ?></option>
                                                                            <option  value="<?php echo $option3   ?>"><?php echo $option3   ?></option>
                                                                            <option  value="<?php echo $option4   ?>"><?php echo $option4   ?></option>
                                                                </select>
                                                                    </div>

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Tracking Number</label>
                                                                    <input type="text" class="form-control" name="parcel_trackingNumber"
                                                                        value="<?php echo $data['parcel_trackingNumber']; ?>">
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                            <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

<!---------------------------------------------------------------------------end of update modal---------------------------------------------------------------------->    

<!---------------------------------------------------------------------------email modal---------------------------------------------------------------------->                                                
            

                                        <div class="modal fade" id="modal1<?php echo $data['parcel_ID']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Email Parcel Tracking Number</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    
                                                        <div class="modal-body">
                                                            <form action="sendEmail.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Parcel ID</label>
                                                                    <input type="text" class="form-control" name="pid" id="pid"
                                                                    readonly="readonly" value="<?php echo $data['parcel_ID']; ?>">
                                                                </div>

                                                                <div class="form-group">

                                                                    <label for="exampleFormControlInput1">Sender Name</label>
                                                                    <input type="text" class="form-control" name="parcelCustomer_name" readonly="readonly" value="<?php echo $data['parcelCustomer_name']; ?>">
                                                                
                                                                </div>

                                                                <div class="form-group">

                                                                    <label for="exampleFormControlInput1">Sender Email Address</label>
                                                                    <input type="text" class="form-control" name="parcelCustomer_email" readonly="readonly" value="<?php echo $data['parcelCustomer_email']; ?>">
                                                                
                                                                </div>

                                                                <div class="form-group">

                                                                    <label for="exampleFormControlInput1">Receiver Name</label>
                                                                    <input type="text" class="form-control" name="parcelRecipient_name" readonly="readonly" value="<?php echo $data['parcelRecipient_name']; ?>">
                                                                
                                                                </div>

                                                                <div class="form-group">

                                                                    <label for="exampleFormControlInput1">Receiver Email Address</label>
                                                                    <input type="text" class="form-control" name="parcelRecipient_email" readonly="readonly" value="<?php echo $data['parcelRecipient_email']; ?>">
                                                                
                                                                </div>

                                                                <div class="form-group">

                                                                    <label for="exampleFormControlInput1">Tracking Number</label>
                                                                    <input type="text" class="form-control" name="parcel_trackingNumber" readonly="readonly" value="<?php echo $data['parcel_trackingNumber']; ?>">
                                                                
                                                                </div>
                                                                
                                                                <div class="modal-footer">

                                                                    <button type="submit" name="email" class="btn btn-primary">Email</button>
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

<!---------------------------------------------------------------------------end of update modal---------------------------------------------------------------------->    
                                        </td>
                                    </tr>
                                    <?php }
                                     }else{
                                        ?>
                                </tbody>
                                
                            </table>
                            <p style="font-size:40px; text-align :center;">No Parcel</p>

                                <?php
                                    }
                                    ?>
                        </div> 
                    </div>
                </div>



                
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
                </script>


            </body>
            
            </html>
            