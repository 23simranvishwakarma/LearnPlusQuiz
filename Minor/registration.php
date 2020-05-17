
<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3css.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a> 
    <a href="login.php" class="w3-padding-large w3-hover-orange w3-hide-small w3-right">Sign In</a>
    <a href="login.php" class="w3-padding-large w3-hover-orange w3-hide-large w3-right" style="margin-right: -45px;">Sign In</a>
  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

	<?php
		if (isset($_GET['output'])) {
			echo "<h4>".$_GET['output']."</h4>";
		}
	?>
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:600px" id="band">
    <h2 class="w3-wide">Quiz Platform for Students</h2>
    <div class="w3-container w3-margin-top">

		<form method="POST" action="registration.php" name="regform" onsubmit="return validation()"  class="w3-container w3-card-4 ">
				
			<p>
				<label class="w3-left">Name</label>
				<input class="w3-input" name="name" type="text" style="width:100%" pattern="^[a-zA-z]+([\s][a-zA-Z]+)*$">
			</p>
			<p>
				<label class="w3-left">Roll Number</label>
				<input class="w3-input" name="rollno" type="text" style="width:100%">
			</p>
			<p>
				<select class="w3-select" name="year">
					  <option value="" disabled selected>Select Year</option>
					  <option value="1">First Year</option>
					  <option value="2">Second Year</option>
					  <option value="3">Third Year</option>
					  <option value="4">Fourth Year</option>
				</select>
			</p>
			<p>
				<select class="w3-select" name="branch">
					  <option value="" disabled selected>Select Branch</option>
					  <option value="cs">Computer Science</option>
					  <option value="ec">Electrical</option>
					  <option value="me">Mechanical</option>
					  <option value="ce">Civil</option>
				</select>
			</p>
			<p>
				<select class="w3-select" name="role">
					  <option value="" disabled selected>Select Role</option>
					  <option value="admin">Admin</option>
					  <option value="student">Student</option>
				</select>
			</p>
			<p>
				<label class="w3-left">Email</label>
				<input class="w3-input" name="email" type="text" style="width:100%">
			</p>
			<p>
				<label class="w3-left">Password</label>
				<input class="w3-input" name="password" type="password" style="width:100%">
			</p>
			<p>

				<button type="submit" value="submit" name="submit" class="w3-button w3-section w3-round-xxlarge w3-black w3-ripple" style="width: 30%; outline: none;"> Register </button>
			</p>
			<p>
				<a href="login.php">I have an Account?</a>
			</p>
		</form>


	</div>
  </div>
  
<!-- End Page Content -->
</div>

<script>

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

<script>
	function validation()   
	{
		var name = document.forms["regform"]["name"];
		var rollno = document.forms["regform"]["rollno"];

			if (name.value == "")                                  
		    { 
		        window.alert("Please enter your name."); 
		        name.focus(); 
		        return false; 
		    }
		    if(rollno.value == "")
			{
				alert("Please enter enrollment number");
				name.focus(); 
		        return false;
			}
			   
   
	}
</script>
<?php 
	if(isset($_POST['submit']))
	{
		include('database/dbcon.php');

		$name = $_POST['name'];
		$rollno = $_POST['rollno'];
		$year = $_POST['year'];
		$branch = $_POST['branch'];
		$role = $_POST['role'];
		$email = $_POST['email'];
		$password = $_POST['password'];



		$sql = "INSERT INTO `registration`(`name`,`rollno`,`year`,`branch`,`role`,`email`,`password`) VALUES ('$name','$rollno','$year','$branch','$role','$email','$password')";

		$run = mysqli_query($con,$sql);

		if($run == True)
		{

			?>
			<script >
				window.location.href = "login.php?error=Registration Successful";
			</script>

			<?php
		}
		else
		{
			?>
			<script >
				window.location.href = "registration.php?error=Not Registered, Try Again!";
			</script>
			<?php 
		}
	}	

 ?>