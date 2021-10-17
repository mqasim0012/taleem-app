<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel = "shortcut icon" href = "Images/icon.ico" />
	<title>Taleem</title>


	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link href = "CSS/resetstyle.css" type = "text/css" rel = "stylesheet">
	<link href = "CSS/MainCSS.css" type = "text/css" rel = "stylesheet">

	<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src = "JS/MainJS.js"></script>
</head>
<body>
	<header>
		<div class = "main">
			<div class = "logo">
				<img src = "logo.png" />
			</div>
			<a class = 'menu-icon'><img src="Images/menu.png" alt=""></a>
			<ul>
				<li><a href = "#" class = "active">Home</a></li>
				<li><a href = "Dashboard.php">Dashboard</a></li>
				<li><a href = "Discussion/Discussion_bounds.php">Discussion</a></li>
				<?php
				if (isset($_SESSION['userId'])) {
					echo '<li><form action = "Includes/logout.inc.php" method = "post"><a class = \'logout\' href = "#"><button type = "submit" name = "logout-submit">Log Out</button></a></form></li>';
				} else {
					echo '<li><a class = "login">Log-In/Sign-Up</a></li>';
				}
				?>
				
			</ul>
			<div class = "title">
				<h1 data-animate-scroll='{
	  "x": "0%",  
      "alpha": "0",  
	  "duration": "1.5",
	  "opacity": "0",
	  "reverse": "false"
      }'>TALEEM</h1>
				<?php
				if (isset($_SESSION['userId'])) {
					echo '<p id = "welcome">Welcome '.$_SESSION['username'].'!</p><br />';
					echo '<a href = "account-settings.php" class = "loggedin">Account Settings</a>';
				}
				?>
			</div>
		</div>
	</header>
	<div class = "content">
	<div class = "Aims">
		<h2>AIM</h2>
		<p data-animate-scroll='{
	  "x": "0%",
	  "y": "-50%",  
      "alpha": "0",  
      "easingType": "Back.easeIn",  
	  "duration": "1",
	  "opacity": "0",
	  "reverse": "false"
      }'>TALEEM is a nonprofit organization that aims to provide easier access to quality education for Pakistan's youth by uploading urdu lectures and notes onto this website and letting students study at their own pace.</p>
	</div>
	<div class = "forms">
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] =="emptyfield") {
					echo '<p id = \'error\'>Fill in all fields!</p>
					<script>
					$(document).ready(function() {
						window.scrollTo(0, 500);
					});
					</script>';
				} else if ($_GET['error'] == "wrongpwd") {
					echo '<p id = \'error\'>Email and password do not match!</p>
					<script>
					$(document).ready(function() {
						window.scrollTo(0, 500);
					});
					</script>';
				} else if ($_GET['error'] == "nouser") {
						echo '<p id = \'error\'>Email has not been registered</p>
						<script>
						$(document).ready(function() {
							window.scrollTo(0, 500);
						});
						</script>';
				}
			}
		if (!isset($_SESSION['userId'])) {
			?>
			<div id = "login">
			<h2  data-animate-scroll='{
				"x": "0%",
				"y": "-50%",  
				"alpha": "0",  
				"easingType": "Back.easeIn",  
				"duration": "1",
				"opacity": "0",
				"reverse": "false"
				}'>Log In</h2>
			<form action = "Includes/login.inc.php" method = "post">
				<ul>
					<li><input type = "text" name = "mailuid" placeholder = "Email"></li>
					<li><input type = "password" name = "pwd" placeholder = "Password"></li>
					<li><a href = "reset-password.php">Forgot Password?</a></li>
					<li class = 'toggle-signup'><a>No Account? Sign Up</a></li>
					<li><button type = "submit" name = "login-submit">Login</button></li>
				</ul>
			</form>
		</div>
		<div id = "borderBottom"></div>
		<?php
		}
		if (isset($_GET['error'])) {

			if ($_GET['error'] === "emptyfields") {
				echo '<p id = \'error\'>Fill in all fields!</p>
				<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
				</script>';
			} else if ($_GET['error'] == "invalidmailuid") {
				echo '<p id = \'error\'>Invalid username and email!</p>
				<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
				</script>';
			} else if ($_GET['error'] == "invalidmail") {
				echo '<p id = \'error\'>Invalid email!</p>
				<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
				</script>';
			} else if ($_GET['error'] == "passwordcheck") {
				echo '<p id = \'error\'>Passwords do not match!</p>
				<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
				</script>';
			} else if ($_GET['error'] == "invaliduid") {
				echo '<p id = \'error\'>Invalid username!</p>
				<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
				</script>';
			} else if ($_GET['error'] == "usertaken") {
				echo '<p id = \'error\'>Username is already taken!</p>
				<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
				</script>';
			}
		} else if (isset($_GET['signup']) && $_GET['signup'] == "success") {
			echo '<p id = \'error successful\'>Signup successfull!</p>
			<script>
				$(document).ready(function() {
					window.scrollTo(0, 900);
				});
			</script>';
		}
		if (!isset($_SESSION['userId'])) {
		?>
		<div class = 'form-signup'>
			<h2 data-animate-scroll='{
			"x": "0%",
			"y": "-50%",  
			"alpha": "0",  
			"easingType": "Back.easeIn",  
			"duration": "1",
			"opacity": "0",
			"reverse": "false"
			}'>Sign Up</h2>
			<form action = "Includes/signup.inc.php" method = "post">
				<ul>
					<li><input type = "text" name = "uid" placeholder = "Username | No Spaces"></li>
					<li><input type = "text" name = "mail" placeholder = "Email"></li>
					<li><input type = "password" name = "pwd" placeholder = "Password"></li>
					<li><input type = "password" name = "pwd-repeat" placeholder = "Repeat Password"></li>
					<li><button type = "submit" name = "signup-submit">Sign Up</button></li>
				</ul>
			</form>
		</div>
		<?php
		}
		?>
	</div>

	<!-- Begin footer -->
	<footer>
		<p id = "author">Taleem<span>|</span>taleem@gmail.org<span>|</span>&copy; Muhammad Qasim</p>
		<div class="social-btns" data-animate-scroll="{&quot;rotationY&quot;:&quot;-15&quot;, &quot;alpha&quot;: &quot;0&quot;, &quot;duration&quot;: &quot;1&quot;,&quot;scaleX&quot;: &quot;0&quot;,&quot;scaleY&quot;: &quot;0&quot;}" class="animateScroll" style="transform: translate3d(0px, 0px, 1px); visibility: inherit; opacity: 1; transform-style: flat;">
			<a class="btn facebook" href="#!"><i class="fa fa-facebook"></i></a>
			<a class="btn twitter" href="#!"><i class="fa fa-twitter"></i></a>
			<a class="btn instagram" href="#!"><i class="fa fa-instagram"></i></a>
		</div><br>
	</footer>
	<!-- End footer -->

	<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script src="JS/Max.js"></script>
	<script src="JS/ScrollTo.js"></script>
	<script src="JS/Ease.js"></script>
	<script src="JS/animate-scroll.js"></script>
	<script type="text/javascript">
		$(document).animateScroll();
	</script>
	<?php
	if (isset($_GET['error']) && $_GET['error'] !== "emptyfield" && $_GET['error'] !== "wrongpwd" && $_GET['error'] !== "nouser") {
		?>
		<script type = 'text/javascript'>
			$('.form-signup').slideToggle();
        	$('#borderBottom').slideToggle();
			$('html, body').animate({
            	scrollTop: $(".form-signup").offset().top
        	}, 1000);
		</script>
		<?php
	}
	?>
</body>
</html>