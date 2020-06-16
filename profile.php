<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");

if(empty($_SESSION))
{
	header('location: login_form.php');
}
$user_id=$_SESSION['user_id'];
$query="SELECT * FROM users WHERE user_id='$user_id'";
$result=mysqli_query($conn,$query);
$result=mysqli_fetch_array($result);

$dp=$result['dp'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>hi users</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('#edit_dp').hide();
		$('#profile').mouseenter(function(){
			$('#edit_dp').show();
		})
		$('#profile').mouseleave(function(){
			$('#edit_dp').hide();
		})
		$('.rate').click(function(){
			var order_id=$(this).data('id');
			//pass order_id ti form
			$('#order_id').val(order_id);

		});
		$('#rating-form').submit(function(){
			var order_id=$('#order_id').val();
			var rating_number=$('#rating-number').val();
			var review=$('#review').val();
			$('#exampleModal').modal('hide');

			$.ajax({
				url:'insert_rating.php',
				type:'POST',
				data:{'order_id':order_id,'rating_number':rating_number,'review':review},
				success:function(data){
					console.log(data);
					data=JSON.parse(data);

					if(data.code==1){
						alert("rating added");
					}
					else{
						alert("error");
					}
				},
				error:function(){
					alert("error occured");
				}
			})
		})
	})

</script>
<body background="https://dionysoshotelpaphos.com/wp-content/uploads/forkandknife.jpg" style="background-size: cover;background-repeat: no-repeat;">
	<nav class="navbar" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
		<h4 class="navbar-brand text-light"><b>zomato</b></h4>
		<h5 class="float-right text-light" >hi <?php echo $_SESSION['name']; ?></h5>
	</nav>
	<div class="mt-3">
	<a href="index.php" class="btn btn-sm float-right" style="background: #e2e2e2;"><b><i class="fa fa-shopping-cart"></i> Order food</b></a></div>
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-3">
				<div class="card" id="profile">
 				 <img class="card-img-top" src="<?php echo $dp; ?>" alt="Card image cap">
 				 <a href="#" data-toggle="modal" data-target="#dpModal"><i id="edit_dp" class="fa fa-pencil-square text-dark" style="font-size: 50px;margin-top: -150px; padding-left: 5px"></i></a>
  				<div class="card-body">
   				 <h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
    			</div>
 				 <ul class="list-group list-group-flush">
  				  <li class="list-group-item">Orders<span class="float-right">30</span></li>
   				 <li class="list-group-item">Reviews<span class="float-right">30</span></li>
    				<li class="list-group-item text-danger"><b><a href="logout.php">Logout</a></b></li>
 				 </ul>
 				 <div class="card-body">
    				<a href="#" class="btn text-light btn-block" style="background: #333333;background: -webkit-linear-gradient(to right, #dd1818, #333333);background: linear-gradient(to right, #dd1818, #333333);" data-toggle="modal" data-target="#editModal">Edit Profile</a>
				</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<?php

					$conn=mysqli_connect("localhost","root","","zomato");
					$user_id=$_SESSION['user_id'];
					$query="SELECT * FROM orders o JOIN restaurants r ON r.r_id=o.r_id WHERE o.user_id=$user_id AND o.status=1";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_array($result))
					{
						echo '<div class="col-md-12 mt-3">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title text-danger">'.$row['r_name'].'</h5>
								<p>order date: <b>'.$row['order_time'].'</b><span class="float-right">Total: Rs <B>'.$row['amount'].'</B></span></p>

								<table class="table">';
								$current_order_id=$row['order_id'];
								$query2="SELECT * FROM order_details o JOIN menu m ON m.id=o.menu_id WHERE o.order_id LIKE '$current_order_id'";

								$result2=mysqli_query($conn,$query2);
								while($row2=mysqli_fetch_array($result2)){
									echo '<tr>
											<td>'.$row2['name'].'</td>
											<td>2 pcs</td>
										 </tr>';

								}

								

								echo '</table>
								<button class="btn text-light float-right rate" style="background: #333333;background: -webkit-linear-gradient(to right, #dd1818, #333333);background: linear-gradient(to right, #dd1818, #333333);" data-toggle="modal" data-target="#exampleModal"
									 data-id="'.$row['order_id'].'">Rate Order</button>
							</div>

						</div>
					</div>';
					}



					?>
				</div>	
			</div>

			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12">
						<div class="card" style="height: 300px;overflow-y: scroll;">
							<div class="card-body">
								<div>
								<h5>Review:</h5>
								
								<p><?php
									//fetching the address from table to profile page
									

								$conn=mysqli_connect("localhost","root","","zomato");
								$user_id=$_SESSION['user_id'];
								$query="SELECT * FROM orders o JOIN restaurants r ON r.r_id=o.r_id WHERE o.user_id=$user_id AND o.status=1";
								$result=mysqli_query($conn,$query);
								while($row5=mysqli_fetch_array($result))
									{
									echo '<span class="text-muted">'. $row5['r_name'].'</span><br>';
									echo $row5['review'];

									echo "<br>";
									echo "Rating : ";
									echo $row5['rating'];
									echo "<br><hr><br>";
								}
																		
									
									?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mt-3">
						<div class="card" style="height: 300px;overflow-y: scroll;">
							<div class="card-body">
								<p><b>Change Location </b> <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addressModal">add</button></p>
								<div>
									<small class="badge badge-danger">work</small>
									<p><?php
									//fetching the address from table to profile page
									$conn=mysqli_connect("localhost","root","","zomato");
									$user_id=$_SESSION['user_id'];
									$query="SELECT * FROM users WHERE user_id='$user_id'";
									$result=mysqli_query($conn,$query);
									$row4=mysqli_fetch_array($result);
									echo $row4['address'];
									echo "<br>";
									echo $row4['pincode'];
									?>
									</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate your order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="rating-form" method="POST">
        	<label>Rating</label><br>
        	<input id="rating-number" type="number" name="rating" class="form-control" max="5" min="1"><br>
        	<label>Your review</label><br>
        	<textarea class="form-control" id="review" name="review"></textarea><br>

        	<input type="hidden" name="order_id" id="order_id">
        	<input type="submit" name="" value="Submit" class="btn text-light" style="background: #333333;background: -webkit-linear-gradient(to right, #dd1818, #333333);background: linear-gradient(to right, #dd1818, #333333);">
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="dpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">choose profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="update_dp.php" enctype="multipart/form-data">
        	<label>choose profile picture</label><br>
        	<input type="file" name="img_file" class="form-control"><br>

        	<input type="submit" name="" value="submit" class="btn text-light" style="background: #333333;background: -webkit-linear-gradient(to right, #dd1818, #333333);background: linear-gradient(to right, #dd1818, #333333);">
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit_profile.php">
        	<label>name</label><br>
        	<input type="text" name="name" value="<?php echo $_SESSION['name'];?>" class="form-control"><br><label>password</label><br>
        	<input type="password" name="password" class="form-control"><br>

        	<input type="submit" name="" value="submit" class="btn text-light" style="background: #333333;background: -webkit-linear-gradient(to right, #dd1818, #333333);background: linear-gradient(to right, #dd1818, #333333);">
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal" id="addressModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Your location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><form action="address.php" method="POST">
        
        	<label>ADDRESS:</label><br>
        	<input type="text" name="locality" class="form-control"><br><br>
        	<label>PINCODE:</label>
        	<input type="pincode" name="pincode" class="form-control"><br>
        	<input type="submit" name="submit" value="submit" class="btn btn-danger">
        </form></p>
      </div>
    </div>
  </div>
</div>
<!--<?php

//print_r($_SESSION);

?>

<a href="logout.php">logout</a>-->
</body>
</html>