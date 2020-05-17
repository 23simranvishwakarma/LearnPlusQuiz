<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | showNotes</title>
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
    <a href="../index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
   <a class="w3-padding-large w3-hover-orange w3-hide-small w3-right" onclick="location.href='logout.php';">Logout</a>

  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">


  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:600px" id="band">
    <h2 class="w3-wide">Quiz Platform for Students</h2>
    
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
	include('database/dbcon.php');
	$sql ="SELECT * from `notes`";
	$run = mysqli_query($con,$sql);
	
	while($data = mysqli_fetch_array($run)) {
		?>	
			<div class="w3-container w3-card">
 			<iframe class="w3-card" src="admin/notes/<?php echo $data['file']; ?>"></iframe><br><a href="admin/notes/<?php echo $data['file']; ?>" download>Download</a>
 			</div>	
		<?php
	}

?>








