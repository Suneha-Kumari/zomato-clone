<?php

session_start();

if(empty($_SESSION))
{
	header('location:login_form.php');
}

$conn=mysqli_connect("localhost","root","","zomato");

$r_id=$_GET['id'];

$query="SELECT * FROM restaurants WHERE r_id=$r_id";

$result=mysqli_query($conn,$query);

$result=mysqli_fetch_array($result);

if(empty($result))
{
	header('location:error.php');
}
else{
	$name=$result['r_name'];
	$bg=$result['r_logo'];
	$cuisine=$result['r_cuisine'];
	$rbg=$result['r_bg'];
	$r_rating=$result['r_rating'];

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>restaurant name</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<script type="text/javascript">
	$(document).ready(function(){

		var r_id='<?php echo $r_id; ?>';
		var flag=0;
		var order_id=0;
	
		$('#order-box').hide();
	
		$('.menu_item').click(function(){
			//make an entry in db
			
			var item_id=$(this).data('id');

			var item_name=$('#menu_item_name' + item_id).text();

			var item_price=$('#menu_item_price' + item_id).text();
	
			$.ajax({
				url:"add_order.php",
				type:"POST",
				data:{"r_id":r_id,"menu_id":item_id,'flag':flag,'order_id':order_id},
				success:function(data){
					//console.log(data);
					if(flag==0){
						flag++;
					}
					var data=JSON.parse(data);
					order_id=data.order_id;

					$('#order-box').show();
					

					$('#show_items').append('<p>'+item_name+'<span class="float-right">'+'Rs.'+item_price+'</span></p>');
				},
				error:function(){
					alert("hello");
				}
			});
			

		})
		$('#place').click(function(){
			window.location.href="http://localhost/zomato/order_details.php?order_id=" + order_id;
		})
	})
</script>

<body style="background-image: url('<?php echo $rbg; ?>'); background-size: cover; background-repeat: no-repeat;" >
	
	<nav class="navbar" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
		<h4 class="navbar-brand text-light"><b>zomato</b></h4>
		
		<h5 class="float-right text-light" >hi <?php echo $_SESSION['name']; ?></h5>
	</nav>
	<!--side nav menu-->

				<div id="mySidenav" class="sidenav" style="height: 100%; /* 100% Full-height */
  					width: 0; /* 0 width - change this with JavaScript */
  					position: fixed; /* Stay in place */
  					z-index: 1; /* Stay on top */
  					top: 0; /* Stay at the top */
  					left: 0;
  					background-color: #605C3C; /* Black*/
  					overflow-x: hidden; /* Disable horizontal scroll */
  					padding-top: 10px; /* Place content 60px from the top */
  					transition: 0.5s;">
  				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="font-size: 40px;color: white">&times;</a>
  				<h5 class="text-light"><b>About this place</b></h5><br><br>
  				<small style="padding-left: 10px;" class="text-light" >RESTAURANT SAFETY MEASURE</small><br>
  				<i class="fa fa-cutlery" style="padding-right: 10px;padding-left: 10px; color: white;font-size: 20px" aria-hidden="true"></i> <span class="text-light">Well Sanitized Kitchen</span><br><hr><br>
  				<small style="padding-left: 10px" class="text-light">RESTAURANT SAFETY MEASURE</small><br>
  				<i class="fa fa-handshake-o" style="padding-right: 10px;padding-left: 10px; color: white;font-size: 20px" aria-hidden="true"></i><span class="text-light">Rider Hand Wash</span><br><hr><br>
  				<small style="padding-left: 10px" class="text-light">RESTAURANT SAFETY MEASURE</small><br>
  				<i class="fa fa-thermometer-empty" style="padding-right: 10px;padding-left: 10px; color: white;font-size: 20px" aria-hidden="true"></i><span class="text-light">Daily Temp. Checks</span><br><hr><br>

			</div>
			<br>
		
			<span style="font-size:20px;cursor:pointer" onclick="openNav()" class="text-light">&#9776; About this place</span>
			<br>
			<script>
				function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
				}

				function closeNav() {
  				document.getElementById("mySidenav").style.width = "0";
				}
			</script>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-2">
				<center><img src="<?php echo $bg; ?>" style="width: 1000px;height:600px;"></center>
			</div>
			<div class="row mt-3">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
							<h1><strong><?php echo $name; ?></strong>
							<?php if($r_rating>=4.0)
													{
														echo '<span class="fa fa-star checked" style="color: #52c234;font-size: 20px;"></span><span class="fa fa-star checked" style="color: #52c234;font-size: 20px;"></span><span class="fa fa-star checked" style="color: #52c234;font-size: 20px;"></span><span class="fa fa-star checked" style="color: #52c234;font-size: 20px;"></span><span class="fa fa-star" style="color: grey;font-size: 20px;"></span>';	
													}else if($r_rating>=3 && $r_rating<4)
													{
														echo '<span class="fa fa-star checked" style="color: gold;font-size: 20px;"></span><span class="fa fa-star checked" style="color: gold;font-size: 20px;"></span><span class="fa fa-star checked" style="color: gold;font-size: 20px;"></span><span class="fa fa-star" style="color: grey;font-size: 20px;"></span><span class="fa fa-star" style="color: grey;font-size: 20px;"></span>';
													}else
													{
														echo '<span class="fa fa-star checked" style="color: red;font-size: 20px;"></span><span class="fa fa-star checked" style="color: red;font-size: 20px;"></span><span class="fa fa-star" style="color: grey;font-size: 20px;"></span><span class="fa fa-star" style="color: grey;font-size: 20px;"></span><span class="fa fa-star" style="color: grey;font-size: 20px;"></span>';
													}?>
								
							</h1>
							<h5><?php echo $cuisine; ?></h5>
								</div>
							</div>
						</div>
					</div>
				

					<div class="row mt-2">
						<div class="col-md-3">
							<div class="row">
								<div class="col-md-12">
									
									<div class="card">
										<div class="card-body">
											<h5>Apply filters</h5><br>
										<small><input type="checkbox" name="">zomato gold member<br><hr>
										<input type="checkbox" name=""><font color="green"><b>order online</b></font><br><hr>
										<b>quick filters</b><br>
										<input type="checkbox" name="">pure veg<br>
										<input type="checkbox" name="">pay online<br><br>
										<b>sort by</b><br>
										<font color="green"><b>popularity</b></font><br>
										delivery rating-<font color="grey">high to low</font><br>
										recently added<br>
										</small>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="row">
								<?php

								$query2="SELECT * FROM menu WHERE r_id=$r_id AND status=1";

								$result=mysqli_query($conn,$query2);

								while($row=mysqli_fetch_array($result))
								{
									echo '<div class="col-md-12 mt-2">
									<div class="card">
									<div class="card-body">
										<div class="row">';
										if($row['type']==1)
										{
											echo '<div class="col-md-1" style="padding:12px">
												<div style="width:25px;height:25px;background-color: white; color: black; border: 2px solid #4CAF50;padding:3px"><div style="width:15px;height: 15px;background-color: green;border-radius: 15px;"></div></div>';
										}else
										{
											echo '<div class="col-md-1" style="padding:12px">
												<div style="width:25px;height:25px;background-color: white; color: black; border: 2px solid #ED213A;padding:3px"><div style="width:15px;height: 15px;background-color: red;border-radius: 15px"></div></div>';
										}

											
											echo '</div>
											<div class="col-md-3" style="padding:0px">
												<img src="'.$row['img'].'" style="height: 125px; width: 135px; border-radius: 20%;">
												</div>
												<div class="col-md-6">
												<h5 id="menu_item_name'.$row['id'].'">'.$row['name'].'</h5>
												<p>Rs <span id="menu_item_price'.$row['id'].'"> '.$row['price'].'</span><br>
												<small>'.$row['descr'].'</small></p>
											</div>
											<div class="col-md-2">
												<button data-id='.$row['id'].' class="btn btn-sm menu_item " style="background-color: white;color: #ED213A;border: 1px solid #ED213A;border-radius: 10%;"><b>Add +</b></button>
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

			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12">
						<div id="order-box" class="card text-light" style="background: #333333;  /* 		fallback for old browsers */
							background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
								background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
							<div class="card-body">
								<h5>Order Details</h5>
								<div id="show_items">
									
								</div>
								<button id="place" class="btn btn-light btn-block">place order</button>
							</div>
						</div>
					</div>
					<div class="col-md-12 mt-2">
						<div class="card">
							<div class="card-body">
								<h3>Other Details</h3>
								<br><small>
									
								</small>
							</div>
						</div>
					</div>
					<div class="col-md-12 mt-2">
						<div class="card">
							<div class="card-body">
								<h3>Reviews</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br><br>
	<div class="jumbotron" style="background-color: #605C3C;background-size: cover">
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
		
		<br><br>
	</div>
</body>
</html>