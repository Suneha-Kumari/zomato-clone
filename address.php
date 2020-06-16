<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$city=$_POST['city'];
$locality=$_POST['locality'];
$pincode=$_POST['pincode'];
$name=$_POST['name'];
$password=$_POST['password'];
$user_id=$_SESSION['user_id'];
$query="UPDATE users SET address='$locality',pincode='$pincode' WHERE user_id='$user_id'";
try{
	mysqli_query($conn,$query);
	
	header('location:profile.php?msg=1');
}catch(Exception $e){
	header('location:profile.php?msg=0');
}

?>