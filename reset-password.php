<?php
    session_start();
?>

<html>
<head>
    <title>TALEEM | RECOVERY EMAIL</title>
	<link rel = "shortcut icon" href = "Images/icon.ico" />
	<link href = "CSS/resetstyle.css" type = "text/css" rel = "stylesheet">
    <link href = "CSS/reset-passwordCSS.css" type = "text/css" rel = "stylesheet">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src = "JS/reset-passwordJS.js"></script>
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
        <p class = "heading">Reset password</p><br />
        <p class = "instructions">Enter email address for the account you wish to recover</p>
        <form action = "Includes/reset-request.inc.php" method = "post">
            <ul>
                <li><input type = "text" name = "email"></input></li>
                <li><button type = "submit" name = "reset-request-submit">Submit</button></li>
            </ul>
        </form>
    </main>
    <footer>
        <p>&copy; Taleem | taleem@gmail.com</p>
    </footer>
</body>
</html>