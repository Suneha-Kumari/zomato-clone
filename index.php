<?php
$conn=mysqli_connect("localhost","root","","zomato");

$query="SELECT * FROM restaurants";

$result=mysqli_query($conn,$query);




?>
<!DOCTYPE html>
<html>
<head>
	<title>order online</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('https://img4.goodfon.com/wallpaper/big/e/73/harvest-fresh-wood-urozhai-natiurmort-healthy-ovoshchi-veg-2.jpg');background-size: cover; background-repeat: no-repeat;">

	<nav class="navbar" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
">
		<h4 class="navbar-brand text-light"><b>zomato</b></h4>
		<h5 class="float-right text-light"><a href="logout.php" class="btn btn-sm bg-primary text-light"><b>log out</b></a></h5>
	</nav>
	
	<div class="float-right mt-3">
		<a href="login_form.php" class="btn-sm text-light" style="background-color: #dd1818; border: none;"><i class="fa fa-shopping-cart"></i> Order Food</a>
		<a href="#" class="btn-sm text-light" style="background-color: #dd1818;border: none;"><i class="fa fa-diamond"></i>Zomato gold</a>
	</div>
	<br>
	<br>
	<div class="jumbotron" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQezPCT81R0u9iPH0iscNvz34ecC6gALekFPa-T7DnTCOpbkhKh&usqp=CAU');background-size: cover; background-repeat: no-repeat;">

		<h1 class="display-1 text-md-center text-light"><b>Hungry?? Order Now <i class="fa fa-cutlery text-light" aria-hidden="true"></i></b></h1><hr style="color-profile: #ffffff">
		<h4 class="text-md-center text-light"> 25 restaurants delivering now!!!</h4>
	</div>

	<div class="container">
	<div class="row">
		<div class="col-md-5" style="padding-left: 100px;">
			<select name="search" class="form-control">
  				<option value=""><font color="grey">please select your location...</font></option>
 				<option value="">Patna</option>
  				<option value="">Kolkata</option>
  				<option value="">Delhi</option>
  				<option value="">Pune</option>
  				<option value="">Kerala</option>
  				<option value="">Dehradun</option>
  				<option value="">Bangalore</option>
  				<option value="">Haryana</option>
  				<option value="">Chennai</option>
  				<option value="">Ranchi</option>
  				<option value="">Mumbai</option>
  				<option value="">Lucknow</option>
			</select>
		</div>
		<i class="fa fa-map-marker text-light" aria-hidden="true" style="font-size: 35px;"></i>
		<div class="col-md-5" style="padding-left: 100px;">
			<select type="text" name="search" class="form-control" placeholder="search for restaurants and cuisines...">
				<option value=""><font color="grey">search for restaurants and cuisines...</font></option>
				<option value="">Domino's</option>
  				<option value="">Arsalan</option>
  				<option value="">KFC</option>
  				<option value="">Harilal's</option>
  				<option value="">Pizza Hut</option>
  				<option value="">Haldiram's</option>
  				<option value="">Yo China</option>
  				<option value="">Cafe Hideout</option>
  				<option value="">Well Food</option>
  				<option value="">Dosa Plaza</option>
  			</select>
		</div>
		<i class="fa fa-search text-light" style="font-size: 30px;" aria-hidden="true"></i>
	</div>
</div>
	<br><br>
	<div class="container"  style="padding: 0;">
		<h5 class="text-light">Order food online in Kolkata</h5>
		
		<div class="row">
			<div class="col-md-2">
				<div class="card">
					<div class="card-body">
						<b>Apply Filters</b><br>
						<small><input type="checkbox" name="">zomato gold member<br><hr>
						<input type="checkbox" name=""><font color="green"><b>order online</b></font><br><hr>
						<b>quick filters</b><br>
						<input type="checkbox" name="">pure veg<br>
						<input type="checkbox" name="">pay online<br><br>
						<b>sort by</b><br>
						<font color="green"><b>popularity</b></font><br>
						delivery rating-<font color="grey">high to low</font><br>
						recently added<br><br>
						<b>cuisine</b><br>
						<input type="checkbox" name="">North Indian<font color="grey" class="float-right">191</font><br><br>
						<input type="checkbox" name="">Chinese<font color="grey" class="float-right" >168</font><br>
						<input type="checkbox" name="">Fast Food<font color="grey" class="float-right" >105</font><br>
						<input type="checkbox" name="">Biryani<font color="grey" class="float-right" >56</font><br>
						<input type="checkbox" name="">Beverages<font color="grey" class="float-right" >45</font><br>
						<input type="checkbox" name="">South Indian<font color="grey" class="float-right" >33</font><br>
						<input type="checkbox" name="">Mithai<font color="grey" class="float-right" >31</font><br>
						<input type="checkbox" name="">Desserts<font color="grey" class="float-right" >29</font><br>
						<input type="checkbox" name="">Pizza<font color="grey" class="float-right" >25</font><br>
						<input type="checkbox" name="">Bakery<font color="grey" class="float-right" >24</font><br><br>

						<b>Delivery Time</b><br>
						30 minutes<font color="grey" class="float-right">328</font><br>
						45 minutes<font color="grey" class="float-right">367</font><br>
						60 minutes<font color="grey" class="float-right">367</font><br><br>
						<b>Cost for two</b><br>
						Less than Rs. 350196<br>
						Rs. 350 to Rs. 750145<br>
						Rs. 750 to Rs. 1,50021<br>
						Rs. 1,500 <font color="grey" class="float-right">+3</font><br><br>
						<b>Minimum Order</b><br>
						No minimum order<font color="grey" class="float-right">59</font><br>
						Up to Rs. 150<font color="grey" class="float-right">364</font><br>
						Up to Rs. 250<font color="grey" class="float-right">367</font><br>
						Up to Rs. 500<font color="grey" class="float-right">368</font><br></small>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<?php

						while($row=mysqli_fetch_array($result)){
						echo '<div class="col-md-6">
							<div class="card mt-2">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-4">
													<img src="'.$row['r_logo'].'" style="height: 135px; width: 145px;">
												</div>
												<div class="col-md-6">
													<h3 class="text-danger"><b>'.$row['r_name'].'</b></h3>
													<h6 class="lead"><small><p>'.$row['r_cuisine'].'<br>'.$row['r_descrp'].'</p></small><br>

														<p><small>'.$row['r_delivery_time'].' mins</small></p></h6>
												</div>
												<div class="col-md-2">
													<p style="text-align: right">';
													if($row['r_rating']>=4.0)
													{
														echo '<span class="badge badge-success">'.$row['r_rating'].'</span>';	
													}else if($row['r_rating']>=3 && $row['r_rating']<=4)
													{
														echo '<span class="badge badge-warning">'.$row['r_rating'].'</span>';
													}else
													{
														echo '<span class="badge badge-danger">'.$row['r_rating'].'</span>';
													}
												

													echo '<small>'.$row['r_num_ratings'].' ratings <br>'.$row['r_num_reviews'].'  reviews</small></p>
												</div>
											</div>
										</div>
										<hr style="height:2px;border-width:0;color:green;background-color:green;width: 90%">
										<div class="col-md-12">
											<a href="order.php?id='.$row['r_id'].'" class="btn btn-sm float-right text-light" style="background-color:#0f9b0f"><b>ORDER NOW</b></a>
										</div>
									</div>
								</div>
							</div>
						</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
<br><br>
	<div class="jumbotron" style="background-color: #1e130c;">
		<img src="https://www.grab.in/wp-content/uploads/2018/04/Grab-Clients-Zomato.png" style="height: 150px;width: 350px;">
		<hr style="height:1px;border-width:0;color:gray;background-color:gray;width: 80%"><br><br>
		<div class="row" style="padding-left: 200px">
			<div class="col-md-3">
				<h4 class="text-light"><b>About Zomato</b></h4>
				<small class="text-light">about us
					<br>culture
					<br>blog
					<br>career
					<br>Report Fraud
					<br>Contact
				</small>
			</div>

			<div class="col-md-3">
				<h4 class="text-light"><b>For Foodies</b></h4>
				<small class="text-light">Code of Conduct
					<br>Community
					<br>Verified Users
					<br>Blogger Help
					<br>Developers
					<br>Mobile Apps
				</small>
			</div>

			<div class="col-md-3">
				<h4 class="text-light"><b>For Restaurants</b></h4>
				<small class="text-light">Add a Restaurant
					<br>Claim your Listing<br>Business App
					<br>Business Owner Guidelines
					<br>Business Blog
					<br>Restaurant Widgets
					<br>Products for Businesses
				</small>
			</div>

			<div class="col-md-3 text-light"><br><br>
				<small>
					Advertise
					<br>Order
					<br>Book
					<br>Trace
					<br>Hyperpure
				</small>
			</div>
		</div>
		<br><br>

		<hr style="height:1px;border-width:0;color:gray;background-color:gray;width: 80%">
		<div class="row text-md-center text-light">
			
				
					<div class="col-md-2" style="padding-left: 200px;">Privacy</div><div class="col-md-2">Terms</div><div style="padding-right: 200px;" class="col-md-2">API</div><div style="padding-right: 200px;" class="col-md-2">Policy</div><div style="padding-right: 200px;" class="col-md-2">Security</div><div style="padding-right: 200px;"class="col-md-2">Sitemap</div>
				
			
		</div><br>
		<hr style="height:1px;border-width:0;color:gray;background-color:gray;width: 80%">
		<br><br>
	</div>
</body>
</html>