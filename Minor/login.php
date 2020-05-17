<?php
	include ('login.html');
	session_start();

	if(isset($_POST['submit'])){
	include('database/dbcon.php');

	$rollno = $_POST['rollno'];
	$password = $_POST['password'];

	$sql = "SELECT rollno,role,password FROM `registration` WHERE rollno = '$rollno' and password = '$password'";

	$run = mysqli_query($con,$sql);

	$data = mysqli_fetch_assoc($run);

	 $rolecheck = $data['role'];
	 $rollnumber = $data['rollno'];

	 $_SESSION['rollno'] = $rollno;

	if(isset($_SESSION['rollno']) and $rolecheck == "admin"){
		header('Location:admin/admindash.php');
	}
	else if(isset($_SESSION['rollno']) and $rolecheck == "student"){
		header('Location:quiz.php');
	}
	else{ 
		header('May be username or password is wrong or you are not registered with us.');
	}
}
?>