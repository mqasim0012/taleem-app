<?php
    session_start();
    include '../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Taleem | Forum</title>
    <link rel = "shortcut icon" href = "../images/icon.ico" />
    
	<link href = "../css/resetstyle.css" type = "text/css" rel = "stylesheet">
    <link href = "../css/discussion.css" type = "text/css" rel = "stylesheet">
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    
	<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
	<script src = "../js/discussion.js"></script> 
</head>
<body>
<header>
	<div class = "main">
	<div class = "logo">
		<img src = "../logo.png" />
	</div>
	<a class = 'menu-icon'><img src="../images/menu.png" alt=""></a>
	<ul>
		<li class = "cool-link"><a href = "../index.php" class = "home">Home</a></li>
		<li class = "cool-link"><a href = "../dashboard.php">Dashboard</a></li>
		<li class = "cool-link"><a href = "discussion_bounds.php" class = "active">Discussion</a></li>
		<?php
		if (isset($_SESSION['userId'])) {
			echo '<li class = "cool-link"><form action = "../includes/logout.inc.php" method = "post"><a href = "#"><button type = "submit" name = "logout-submit">Log Out</button></a></form></li>';
		} else {
			echo '<li class = "cool-link"><a href = "../index.php#login" class = "login">Log-In/Sign-Up</a></li>';
		}
		?>
	    </ul>
	</div>
</header>

<div class="main-body">
<?php
    include 'discussion.php';
?>
</div>

<footer>
	<p>&copy; Taleem | taleem@gmail.org</p>
	<div class="social-btns" data-animate-scroll="{&quot;rotationY&quot;:&quot;-15&quot;, &quot;alpha&quot;: &quot;0&quot;, &quot;duration&quot;: &quot;1&quot;,&quot;scaleX&quot;: &quot;0&quot;,&quot;scaleY&quot;: &quot;0&quot;}" class="animateScroll" style="transform: translate3d(0px, 0px, 1px); visibility: inherit; opacity: 1; transform-style: flat;">
		<a class="btn facebook" href="#!"><i class="fa fa-facebook"></i></a>
		<a class="btn twitter" href="#!"><i class="fa fa-twitter"></i></a>
		<a class="btn instagram" href="#!"><i class="fa fa-instagram"></i></a>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="../js/Max.js"></script>
<script src="../js/ScrollTo.js"></script>
<script src="../js/Ease.js"></script>
<script src="../js/animate-scroll.js"></script>
<script type="text/javascript">
	$(document).animateScroll();
</script>

</body>
</html>