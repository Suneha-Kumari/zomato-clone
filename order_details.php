<?php

session_start();

$conn=mysqli_connect("localhost","root","","zomato");

$order_id=$_GET['order_id'];


$query="SELECT * FROM orders WHERE order_id LIKE '$order_id'";

$result=mysqli_query($conn,$query);

$result=mysqli_fetch_array($result);

$r_id=$result['r_id'];
$order_time=$result['order_time'];
$query1="SELECT * FROM restaurants WHERE r_id LIKE '$r_id'";

$result1=mysqli_query($conn,$query1);

$result1=mysqli_fetch_array($result1);

$r_name=$result1['r_name'];


?>


<?php

$query3="SELECT name,price FROM menu m JOIN order_details o ON o.menu_id=m.id WHERE o.order_id LIKE '$order_id'";
							$result3=mysqli_query($conn,$query3);
							
							$total=0;
							while($row=mysqli_fetch_array($result3)){
								$total=$total+$row['price'];

							}


?>


<!DOCTYPE html>
<html>
<head>
	<title>order details</title>
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
		var initial_total='<?php echo $total; ?>';
		$('#total').text(initial_total);
		$('#amount').text(initial_total);
		$('#apply_coupon').click(function(){
			var coupon_input=$('#coupon_input').val()
			//alert(cpoupon_input);
			$.ajax({

				url:'check_discount.php',
				type:'POST',
				data:{'user_input':coupon_input},
				success:function(data){
					console.log(data);
					data=JSON.parse(data);
					var percent=data.percent;
					var total=$('#total').text();
					//make changes
					if(data.response==200){


					
					var discount=(percent/100)*total;
					var amount=total-discount;
					$('#discount').text(discount);
					$('#amount').text(amount);
				}
				else{
					$('#discount').text(0);
					$('#amount').text(total);

				}
				},
				
				error:function(){
					alert("some error occured");
					}
				
			})
		})
		$('#pay').click(function(){
			var order_id='<?php echo $order_id; ?>';
			var final_amount=$('#amount').text();
			window.location.href='confirm_order.php?order_id=' +order_id +'&amount=' +final_amount;
		});
	})



</script>
<body style="background-color: #919191;">

	<nav class="navbar" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
		<h4 class="navbar-brand text-light">zomato</h4>
		
		<h5 class="float-right text-light" >hi <?php echo $_SESSION['name'] ?></h5>
	</nav>
	<nav class="navbar" style="background-color: #F0CB35;">
		

	</nav><br>

	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h4 class="text-danger"><?php echo $r_name; ?></h4>

						<table class="table">
							<?php

							$query2="SELECT * FROM menu m JOIN order_details o ON o.menu_id=m.id WHERE o.order_id LIKE '$order_id'";
							$result2=mysqli_query($conn,$query2);
							$counter=1;
							echo "<b>Order Id: </b>".$order_id;
							echo "<span class='float-right'><b>Order time: </b>".$order_time."</span>";
							while($row=mysqli_fetch_array($result2))
							{
								echo '<tr>
								<td>'.$counter.'</td>
								<td>'.$row['name'].'</td>
								<td>1</td>
								<td>'.$row['price'].'</td>
							</tr>';
							
							$counter++;
							}


							?>
							
						</table>
						<p>Have a coupon code? <b>Apply Now!</b></p>
						<input type="text" name="" class="form-control" id="coupon_input">
						<button class="btn mt-1 text-light" id="apply_coupon" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"><b>Apply</b></button><br>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<B>Payment details</B>
						<table class="table">

							<tr>
								<td>total</td>
								<td>Rs <span id="total">1300</span></td>
							</tr>
							<tr>
								<td>Discount</td>
								<td>Rs <span id="discount">0</span></td>
							</tr><hr>
							<tr>
								<td>to be paid</td>
								<td>Rs <span id="amount">1100</span></td>
							</tr>
						</table>
						<button class=" text-light btn btn-block" id="pay" style="background: #333333;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"><b>pay now</b> </button>
					</div>
				</div>
			</div>
		</div>
	</div>



</body>

</html>