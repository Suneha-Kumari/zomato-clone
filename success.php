<?php

session_start();

$conn=mysqli_connect("localhost","root","","zomato");
$user_id=$_SESSION['user_id'];

$query="SELECT r_delivery_time FROM orders o JOIN restaurants r ON r.r_id=o.r_id";

$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>order successful</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<nav class="navbar" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
		<h4 class="navbar-brand text-light">zomato</h4>
		
		<h5 class="float-right text-light" >hi <?php echo $_SESSION['name'] ?></h5>
	</nav>
	<div class="mt-3">
		<center><i class="fa fa-check-circle text-success" style="font-size: 250px;"></i></center>
	</div>
	
<h1><center>Super!! payment successful</center></h1><br>
<h4 class="text-muted"><center>Your order will be delivered within <?php echo $row['r_delivery_time'];?> minutes</h4></center><br><center><h5 class="text-muted">Enjoy your meal <i class="fa fa-cutlery text-success" aria-hidden="true"></i></h5></center>

<center><a href="index.php" class="btn btn-lg text-light" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">back</a></center>
<br><div class="jumbotron" style="background-color: #e2e2e2;">
		<img src="https://www.grab.in/wp-content/uploads/2018/04/Grab-Clients-Zomato.png" style="height: 150px;width: 350px;">
		<hr style="height:1px;border-width:0;color:gray;background-color:gray;width: 90%"><br><br>
		<div class="row" style="padding-left: 100px">
			<h5>Paid using : Wallet</h5>
		</div><hr style="height:1px;border-width:0;color:gray;background-color:gray;width: 90%"><br><br>
		<div class="row" style="padding-left: 100px">
			 <i class="fa fa-phone text-success" style="font-size: 30px;"></i> <h5> Contact Delivery boy : 0612-22*****</h5>
		</div><hr style="height:1px;border-width:0;color:gray;background-color:gray;width: 90%"><br><br>
	</div>
</body>
</html>