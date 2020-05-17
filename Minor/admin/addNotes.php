<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | addNotes</title>
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

		<form method="post" action="addNotes.php" enctype="multipart/form-data" class="w3-container w3-card">
      <p>
        <label class="w3-left">Select Semester</label>
        <select class="w3-input" name="sem">
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="3rd">4th</option>
          <option value="3rd">5th</option>
          <option value="3rd">6th</option>
          <option value="3rd">7th</option>
          <option value="3rd">8th</option>
        </select>
      </p>
      <p>
        <p>
          <label class="w3-left">Subject Name</label>
          <input class="w3-input" name="subject" type="text" style="width:100%" required>
        </p>
      </p>
      <p>
        <label class="w3-left">Unit Number</label>
        <input class="w3-input" name="unit" type="text" style="width:100%" required>
      </p>
      <p>
        <label class="w3-left">Notes Description</label>
        <input class="w3-input" name="notes_des" type="text" style="width:100%" required>
      </p>
  		<input type="file" name="notesname" class="w3-input">
  		<input type="submit" name="submit" value="Upload" class="w3-button w3-section w3-round-xxlarge w3-black w3-ripple">
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
	if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $unit = $_POST['unit'];
    $notes_des = $_POST['notes_des'];
    $sem = $_POST['sem'];
		$filename = $_FILES['notesname']['name'];
		$tempfilename = $_FILES['notesname']['tmp_name'];

		include('../database/dbcon.php');
		move_uploaded_file($tempfilename,"notes/$filename");
		$sql = "INSERT INTO `notes`(`file`,`subject`,`unit`,`notes_des`,`sem`) VALUES ('$filename','$subject','$unit','$notes_des','$sem')";
		$run = mysqli_query($con,$sql);		
	}
?>
