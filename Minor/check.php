<?php
include 'database/dbcon.php';
	session_start();	
	if(!isset($_SESSION['rollno'])) {
		header('Location: login.php');
		exit();
	}
 
$sql = "SELECT * FROM answer ORDER BY aid DESC LIMIT 1";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
echo $last_id = $row['aid'];
?>

<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | Result</title>
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
    <a class="w3-padding-large w3-hover-orange w3-hide-small w3-right" onclick="location.href='logout.php';">Logout</a>
    
  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:600px" id="band">
    <h2 class="w3-wide">Quiz Platform for Students</h2>
    <div class="w3-container w3-margin-top">

		<form method="POST" action="check.php" class="w3-container">
			<table class="w3-table-all w3-card-4">
			    <tr>
			      <th colspan="2" class="w3-center w3-green" >RESULT</th>
			    </tr>
			    <tr>
			      <td>Question Attempted</td>
			      <td>
			      <?php
			      	include('database/dbcon.php');
					if (isset($_POST['submit'])) {

						if (!empty($_POST['check'])) {

							$count = count($_POST['check']);
							echo 'Out of '.$last_id.', you have attempted '.$count;  
			      ?>
			      </td>

			    </tr>
			    <tr>
			      <td>Your Total Score</td>
			      <td>
			      <?php
			      	$result = 0;
					$i = 1;
					$selected = $_POST['check'];	//select options
					$q = "SELECT * FROM `answer`";
					$run = mysqli_query($con,$q);

					while ($row = mysqli_fetch_array($run)) {
						$checked = $row['ans'] == $selected[$i];
						if ($checked) {
							$result++;
						}
						$i++;
					}
					echo "Total Score is ".$result;

						}//Close of Inner If Loop
					}//Close of Outer If Loop

			      	?>
			      </td>
			    </tr>
  			</table>

			
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
