<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | addQuestion</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3css.css">
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
    <a href="../index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
   <a href="admindash.php" class="w3-padding-large w3-hover-orange w3-hide-small w3-right">Back</a>

  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">


  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:600px" id="band">
    <h2 class="w3-wide">Admin Dashboard</h2>
    <div class="w3-container w3-margin-top">

		
		<form method="POST" action="addQuestion.php"  class="w3-container w3-card">
			<label class="w3-left">Question :</label><br>
			<input class="w3-input" type="text" name="question" style="width:100%" required><br><br>
			<label class="w3-left">1.</label><input class="w3-input" type="text" name="a" style="width:100%" required><br>
			<label class="w3-left">2.</label><input class="w3-input" type="text" name="b" style="width:100%" required><br>
			<label class="w3-left">3.</label><input class="w3-input" type="text" name="c" style="width:100%" required><br>
			<label class="w3-left">4.</label><input class="w3-input" type="text" name="d" style="width:100%" required><br>
			<label class="w3-left">Correct Answer</label><br>
			<input class="w3-input" type="text" name="ans" style="width:100%" required><br><br>
			<input type="submit" name="submit"  class="w3-button w3-section w3-round-xxlarge w3-black w3-ripple" style="width: 30%; outline: none;">			
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

</body>
</html>




<?php
	

	if(isset($_POST['submit']))
	{
		include('../database/dbcon.php');

		$question = mysqli_real_escape_string($con, $_POST['question']);
		$a = mysqli_real_escape_string($con, $_POST['a']);
		$b = mysqli_real_escape_string($con, $_POST['b']);
		$c = mysqli_real_escape_string($con, $_POST['c']);
		$d = mysqli_real_escape_string($con, $_POST['d']);
		$ans = mysqli_real_escape_string($con, $_POST['ans']);
	
		$sql = "INSERT INTO `answer`(`question`,`a`,`b`,`c`,`d`,`ans`) VALUES ('$question','$a','$b','$c','$d','$ans')";
		$run = mysqli_query($con,$sql);

		if($run == True)
		{
			echo "Inserted";
		}
		else
		{
			echo "Try again";
		}

	}

?>