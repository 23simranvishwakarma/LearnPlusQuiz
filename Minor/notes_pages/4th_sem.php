<?php
	include('../database/dbcon.php');
	$sql ="SELECT * from `notes` WHERE sem = '4th'";
	$res = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<title>Online Quiz | Fourth Sem Notes</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3css.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="../index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
    
    <a href="../registration.php" class="w3-padding-large w3-hover-orange w3-hide-small w3-right">Sign Up</a>
    <a href="../login.php" class="w3-padding-large w3-hover-orange w3-hide-small w3-right">Sign In</a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="../login.php" class="w3-bar-item w3-button w3-padding-large">Sign In</a>
  <a href="../registration.php" class="w3-bar-item w3-button w3-padding-large">Sign Up</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1600px;" id="home">
  <img src="../image/Quiz-bg12.png" alt="Architecture" style="width: 100%; max-height: 400px;" class="responsive"> 
</header>

  <!-- Group of subject -->
  <div class="w3-container w3-content w3-padding" style="max-width:1200px">
    <div class="w3-row-padding" id="about">
      <div class="w3-center w3-padding">
        <h2>Fourth Semester Notes</h2>
      </div>

       <?php while($row = mysqli_fetch_array($res)) { ?>
	      <div class="w3-quarter w3-margin-bottom">
	        <div class="w3-card-4">
	          <img src="../image/notes.webp" style="width:100%">
	          <div class="w3-container">
	          	<h3><?php echo $row['subject'] ?></h3>
	            <p class="w3-opacity">Unit Number: <?php echo $row['unit'] ?></p>
	            <p><?php echo $row['notes_des'] ?></p>
	            <a href="../admin/notes/<?php echo $row['file']; ?>" download><p><button class="w3-button w3-light-grey w3-hover-orange w3-block">Download</button></p></a>
	          </div>
	        </div>
	      </div>
  		<?php } ?>

    </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">ONLINE QUIZ</h2>
    <p class="w3-opacity"><i>Everyone can practise non-violence, it only calls for determination. If you succeed, it will open the way to a far more peaceful world.</i></p>
    <p class="w3-justify">In the last 20 years, the Internet has grown from being nearly non-existent into the largest, most accessible database of information ever created. It has changed the way people communicate, shop, socialise, do business and think about knowledge and learning. Much more than just a new twist on distance learning, online schooling is changing the face of traditional classrooms and making education more accessible than ever before.</p>
  </div>


  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i>Sagar Group of Institution, Gandhi Nagar Bhopal(M.P.)<br>
      	<a href="tel:9399171057"><i class="fa fa-phone" style="width:30px"></i> +91-9399171057</a><br>
        <a href="mailto:27.simranvishwakarma@gmail.com"><i class="fa fa-envelope" style="width:30px"> </i> 27.simranvishwakarma@gmail.com</a><br>
      </div>
      <div class="w3-col m6">
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
          <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
</footer>

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
