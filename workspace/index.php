<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <script type="text/javascript" src="script.js"></script>
		<title>
		Timetable
		</title>
	</head>
	
  
  <body onload = "loadAPI()">
    <ul class="topnav" id="myTopnav">
		<div class="container" id="home">
			<div class="row">
				<div class="col-lg-12">
					<img src="images/logo.jpg"/>
  <h1 id="white">Ryanair
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li></h1>
  <li id="be"><a href="index.php">Home Page</a></li>
  <li id="be"><a href="contact.php">Contact Us</a></li>
  <?php
				if (isset($_SESSION['username'])){
						echo '<li class="navlogin"><p>Hello, '. $_SESSION["username"] . '</p</li>';
						 echo '<li class="navlogin" id="be"><a href="logout.php">Logout</a></li>';
							
				}
				
				else{
						echo '<li class="navlogin" id="be"><a href="login.php">Login</a></li>
									<li id="be"><a href="register.php">Register</a></li>';
					  }
				
				 ?>
			
			
		</ul>
		
		
		</div>
				</div>
			</div>
		</div>
		<div class="container" >
			<div class="row">
				<div class="col-lg-12">
		<center><h1>Real Time Flight Information</h1></center>
				Departure Airport: <select onchange='changeDeparture()' id='departure'>
					</select>
					</br>
        Arrival Airport:  <select onchange="displayDetails();" id='arrival'>
        </select>
        
        
       

        
        <table id="output" style ='width:100%'>
        </table>
        </div>
        </div>
        </div>
        
        <script>
			function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
				} else {
			x.className = "topnav";
						}			
								}
		</script>
		
		<div class="alt2">
	<div class="container" >
			<div class="row">
				<div class="col-lg-12">
	</div>
			<div id="paddingname">
			</div>
			<footer>&copy; Created by Karl McSherry, Eoin Kirwan, Andrew McBride  <br /></footer>
		</div>
		</div>
		</div>
	
		</div>
			
		</div>
	</div>

  </body>
</html>
