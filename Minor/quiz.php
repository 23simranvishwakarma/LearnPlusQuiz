<?php
	
	session_start();
	if(!isset($_SESSION['rollno'])) {
		header('Location: login.php');
	}
	
    include ('database/dbcon.php');	
    $sql = "SELECT * FROM `answer`";
    $res = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | Test</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3css.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style>
body {font-family: "Lato", sans-serif}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a class="w3-padding-large w3-hover-orange w3-hide-small w3-right" onclick="location.href='logout.php';">Logout</a>

  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

  <div class="w3-container w3-content w3-padding-64" style="max-width:600px" id="band">
  	 <h2 class="w3-wide w3-center">Quiz Platform for Students</h2>
  	

	<form action="check.php" method="post">
	 <?php while($row = mysqli_fetch_array($res)) { ?>

	 	<div class="w3-card w3-margin">

		<div class="w3-panel w3-padding" style="background-color: #e0e0e0;">
			<h4 class="w3-text-black"><?php echo $row['aid']; ?>. <?php echo $row['question']; ?></h4>
		</div>

		<!-- Answers Display -->
		<div class="w3-bar w3-padding">
			<input type="radio" name="check[<?php echo $row['aid']; ?>]" value="<?php echo $row['a']; ?>"><b class="w3-padding"><?php echo $row['a']; ?></b><br>
			<input type="radio" name="check[<?php echo $row['aid']; ?>]" value="<?php echo $row['b']; ?>"><b class="w3-padding"><?php echo $row['b']; ?></b><br>
			<input type="radio" name="check[<?php echo $row['aid']; ?>]" value="<?php echo $row['c']; ?>"><b class="w3-padding"><?php echo $row['c']; ?></b><br>
			<input type="radio" name="check[<?php echo $row['aid']; ?>]" value="<?php echo $row['d']; ?>"><b class="w3-padding"><?php echo $row['d']; ?></b><br>
		</div>
		
		</div>
		<?php } ?>
		<div class="w3-padding">
			<div class="w3-center w3-green w3-round-xxlarge" style="width: 50%;">
				<input type="submit" name="submit" class="w3-button w3-center">
			</div>
		</div>
	</form>

   
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


