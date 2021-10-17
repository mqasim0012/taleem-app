<?php
    session_start();
    include 'Includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Taleem | Dashboard</title>
	<link rel = "shortcut icon" href = "Images/icon.ico" />
	<link href = "CSS/resetstyle.css" type = "text/css" rel = "stylesheet">
	<link href = "CSS/DashboardCSS.css" type = "text/css" rel = "stylesheet">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src = "JS/DashboardJS.js"></script>
</head>
<body>
<header>
	<div class = "main">
	<div class = "logo">
		<img src = "logo.png" />
	</div>
	<a class = 'menu-icon'><img src="Images/menu.png" alt=""></a>
	<ul>
		<li class = "cool-link"><a href = "index.php" class = "home">Home</a></li>
		<li class = "cool-link"><a href = "Dashboard.php" class = "active">Dashboard</a></li>
		<li class = "cool-link"><a href = "Discussion/Discussion_bounds.php" class = "discussion">Discussion</a></li>
		<?php
		if (isset($_SESSION['userId'])) {
			echo '<li class = "cool-link"><form action = "includes/logout.inc.php" method = "post"><a href = "#"><button type = "submit" name = "logout-submit">Log Out</button></a></form></li>';
		} else {
			echo '<li class = "cool-link"><a href = "index.php#login" class = "login">Log-In/Sign-Up</a></li>';
		}
		?>
	    </ul>
	</div>
</header>
<div class = "heading">
    <h1>Subjects</h1>
</div>