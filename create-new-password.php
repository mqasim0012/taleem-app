<?php
    session_start();
?>

<html>
<head>
    <title>JT TALEEM | NEW PASSWORD FROM RECOVERY</title>
	<link rel = "shortcut icon" href = "Images/icon.ico" />
	<link href = "CSS/resetstyle.css" type = "text/css" rel = "stylesheet">
    <link href = "CSS/create-new-passwordCSS.css" type = "text/css" rel = "stylesheet">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<!--<script src = "JS/create-new-passwordJS.js"></script>-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
		<div class = "main">
			<div class = "logo">
				<img src = "Images/logo.png" />
			</div>
			<ul>
				<li><a href = "index.php">Home</a></li>
                <li><a href = "#!">Dashboard</a></li>
				<li><a href = "#!" class = "contact">Contact</a></li>
				<?php
				if (isset($_SESSION['userId'])) {
					echo '<li><form action = "includes/logout.inc.php" method = "post"><a href = "#!"><button type = "submit" name = "logout-submit">Log Out</button></a></form></li>';
				} else {
					echo '<li><a class = "login" href = "index.php">Log-In/Sign-Up</a></li>';
				}
				?>
				
			</ul>
		</div>
    </header>
    <main>
		<p class = "heading">New Password</p>
		<?php
			if (isset($_GET['selector'])) {
				$selector = $_GET["selector"];
			}
			if (isset($_GET['validator'])) {
				$validator = $_GET["validator"];
			}

			if (empty($selector) || empty($validator)) {
				echo "Could not validate your request!";
			} else {
				if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
				?>
        		<form action = "Includes/reset-password.inc.php" method = "post">
            		<ul>
						<li><input type = "hidden" name = "selector" value = "<?php echo $selector; ?>"></li>
						<li><input type = "hidden" name = "validator" value = "<?php echo $validaor; ?>"></li>
						<li><input type = "password" name = "pwd" placeholder = "Enter New Password"></li>
						<li><input type = "password" name = "pwd-repeat" placeholder = "Repeat Password"></li>
       			        <li><button type = "submit" name = "reset-password-submit">Reset Password</button></li>
        		    </ul>
		        </form>
				<?php
				}
			}
		?>
    </main>
    <footer>
        <p>&copy; JT Taleem | jtTaleem@gmail.com</p>
    </footer>
</body>
</html>