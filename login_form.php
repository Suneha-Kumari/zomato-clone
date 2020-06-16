<?php

session_start();

if(!empty($_SESSION))
{
	header('location: profile.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body background="https://img5.goodfon.com/wallpaper/nbig/7/38/cpetsii-chesnok-rozmarin-perets-dereviannyi-fon-chili.jpg" style="background-size: cover; background-repeat: no-repeat;">
	<nav class="navbar"  style="background: #333333;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #dd1818, #333333);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #dd1818, #333333); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
		<h3 class="navbar-brand text-light">zomato</h3>
	</nav>
	<div class="container">
		<div class="row mt-50">
			<div class="col-md-8"><h1 class="text-light display-2 text-md-center"><br><strong>Craving for food?? look nowhere else. Explore Now!!</strong></h1></div>
			<div class="col-md-4 mt-4">
				<br><br>
				<div class="card">
					<div class="card-body">
						<?php
						if(!empty($_GET)){
						$message=$_GET['message'];

 						if($message==1){
 							echo "<p class='text-success'><b>Account created Login to proceed</b></p>";
 						}else{
 							echo '<p class="text-danger"><b>error occured</b></p>';
 						}
						}

						?>
						<form action="login_validation.php" method="POST">
							<label>Email:</label><br>
							<input type="email" name="email" class="form-control">
							<br><br><label>password:</label><br>
							<input type="password" name="password" class="form-control"><br><br>
							<input type="submit" name="" class="btn mybtn-color btn-block btn-lg text-light" >
						</form>
						<p>Not a member? <a href="" data-toggle="modal" data-target="#exampleModal">sign up here</a></p>
					</div>
				</div>
			</div>
		</div>
		<div  style="padding-top: 50px;padding-left: 300px;">
			<a href="#" class="btn btn-danger">join as a restaurant partner</a>
		</div>

	</div>


	<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><form action="reg_validation.php" method="POST">
        	<label>name:</label><br>
        	<input type="text" name="name" class="form-control"><br><br><label>Email:</label><br>
        	<input type="email" name="email" class="form-control"><br><br><label>password:</label>
        	<input type="password" name="password" class="form-control"><br>
        	<input type="submit" name="" value="sign up" class="btn btn-danger">
        </form></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn mybtn-color text-light">Save changes</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>