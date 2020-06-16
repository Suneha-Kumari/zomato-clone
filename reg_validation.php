<?php
$conn=mysqli_connect("localhost","root","","zomato");
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$query="INSERT INTO users (user_id,name,email,password,dp) VALUES (NULL,'$name','$email','$password','$dp')";
try{
	//check user already exists or not do urself
	mysqli_query($conn,$query);
	header('location:login_form.php?message=1');
}catch(Exception $e){
	header('location:login_form.php?message=0');
}
?>