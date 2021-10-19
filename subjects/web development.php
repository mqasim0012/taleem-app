<?php
    session_start();
    include '../includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Taleem</title>
	<link rel = "shortcut icon" href = "../images/icon.ico" />

	<link href = "../css/resetstyle.css" type = "text/css" rel = "stylesheet">
	<link rel="stylesheet" href="../css/swiper.min.css">
	<link href = "../css/subject_bounds.css" type = "text/css" rel = "stylesheet">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	
	<script src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
</head>
<body>
<header>
	<div class = "main">
	<div class = "logo">
		<img src = "../logo.png" />
	</div>
	<ul>
		<li class = "cool-link"><a href = "../index.php" class = "home">Home</a></li>
		<li class = "cool-link"><a href = "../dashboard.php" class = "active">Dashboard</a></li>
		<li class = "cool-link"><a href = "../discussion/discussion_bounds.php" class = "discussion">Discussion</a></li>
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

<div class = 'heading'>
<h1 data-animate-scroll='{
	  "x": "0%",
	  "y": "-50%",  
      "alpha": "0",  
      "easingType": "Back.easeIn",  
	  "duration": "1",
	  "opacity": "0",
	  "reverse": "false"
      }'>Web Development</h1>
</div>

<div class="swiper-container">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<div class="content">
				<h6 class = "heading"><strong>HTML</strong></h6>
				<div class = 'topic-grid'>
					<div class = 'topic-info'>
					<img alt="" src="topics/webdev/html/html.png" data-animate-scroll='{
	  "x": "0%",
	  "y": "-50%",  
      "alpha": "0",  
      "easingType": "Back.easeIn",  
	  "duration": "1",
	  "opacity": "0",
	  "reverse": "false"
      }'>
						<ul>
							<li><strong>Name:</strong> Hyper Text Markup Language</li>
							<li><strong>Rigour of course:</strong><span style = 'color: green;'> Low</span></li>
							<li><strong>Type:</strong> Front-End (Content Setup)</li>
						</ul>
					</div>
					<div class = 'topic-content'>
                        <p>HTML is an easy to learn markup language meant to lay the foundations of your website, the perfect place to start your web development journey.</p>

                        <a onclick = 'revealStrut()'>Structure</a>
                        <a onclick = 'revealTags()'>Important tags</a>
                        <a onclick = 'revealTable()'>Tables</a>
                        <a onclick = 'revealProp()'>Properties</a>
                        <a onclick = 'revealChoice()'>Factors affecting tag choice</a>
                        <a onclick = 'revealStyling()'>Basic styling</a>
				    </div>
		    	</div>
    		</div>
	    </div>
	    <div class="swiper-slide">
	        <div class="content">
				<h6 class = "heading"><strong>CSS</strong></h6>
				<div class = 'topic-grid'>
					<div class = 'topic-info'>
						<img alt="" src="topics/webdev/css/css.png" data-animate-scroll='{
	  "x": "0%",
	  "y": "-50%",  
      "alpha": "0",  
      "easingType": "Back.easeIn",  
	  "duration": "1",
	  "opacity": "0",
	  "reverse": "false"
      }'>
						<ul>
	    					<li><strong>Name:</strong> Cascading StyleSheet</li>
							<li><strong>Rigour of Course:</strong><span style = 'color: green;'> Low</span></li>
							<li><strong>Type:</strong> Front-End (Content Styling)</li>
						</ul>
					</div>
					<div class = 'topic-content'>
                        <p>A powerful 'stylesheet' that lets you resize, position, style and animate all objects in your website (with support for event-based animations); hence, HTML and CSS is all you need to create a professional front-end website.</p>

                        <div class="band">
                            <div class="band-itself"></div>
                        </div>

                        <a href="#">Structure</a>
                        <a href="#">Properties</a>
                        <a href="#">More properties</a>
                        <a href="#">Responsive design</a>
                        <a href="#">Animations</a>
                        <a href="#">@charset, @import and much more</a>
		    		</div>
				</div>
			</div>
		</div>
	</div>
	<div class="swiper-pagination"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</div>

<script src = "../js/swiper.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        hashNavigation: {
            watchState: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<div class="overlay-container">
    <div class="overlay" id = "overlay-strut">
        <h1>Structure</h1>
        <a href="html.pdf" target="_blank">CHAP 1 | NOTES</a><br>
        <div class="iframe"><iframe src="https://www.youtube.com/embed/s45SFnuRlMo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br></div>
        
        <button onclick = 'revealStrut()'>CLOSE</button>
    </div>
    <div class="overlay" id = "overlay-tags">
        <h1>Important Tags</h1>
        <button onclick = 'revealTags()'>CLOSE</button>
    </div>
    <div class="overlay" id = "overlay-table">
        <h1>Tables</h1>
        <button onclick = 'revealTable()'>CLOSE</button>
    </div>
    <div class="overlay" id = "overlay-properties">
        <h1>Properties</h1>
        <button onclick = 'revealProp()'>CLOSE</button>
    </div>
    <div class="overlay" id = "overlay-choice">
        <h1>Factors affecting tag choice</h1>
        <button onclick = 'revealChoice()'>CLOSE</button>
    </div>
    <div class="overlay" id = "overlay-styling">
        <h1>Basic styling</h1>
        <button onclick = 'revealStyling()'>CLOSE</button>
    </div>
</div>

<script type='text/javascript'>

var first = true;
var first1 = true;
var first2 = true;
var first3 = true;
var first4 = true;
var first5 = true;

function revealStrut() {
  var x = document.getElementById("overlay-strut");
  if (x.style.display === "none" || first) {
    x.style.display = "block";
    first = false;
  } else {
    x.style.display = "none";
  }
}
function revealTags() {
  var x = document.getElementById("overlay-tags");
  if (x.style.display === "none" || first1) {
    x.style.display = "block";
    first1 = false;
  } else {
    x.style.display = "none";
  }
}
function revealTable() {
  var x = document.getElementById("overlay-table");
  if (x.style.display === "none" || first2) {
    x.style.display = "block";
    first2 = false;
  } else {
    x.style.display = "none";
  }
}
function revealProp() {
  var x = document.getElementById("overlay-properties");
  if (x.style.display === "none" || first3) {
    x.style.display = "block";
    first3 = false;
  } else {
    x.style.display = "none";
  }
}
function revealChoice() {
  var x = document.getElementById("overlay-choice");
  if (x.style.display === "none" || first4) {
    x.style.display = "block";
    first4 = false;
  } else {
    x.style.display = "none";
  }
}
function revealStyling() {
  var x = document.getElementById("overlay-styling");
  if (x.style.display === "none" || first5) {
    x.style.display = "block";
    first5 = false;
  } else {
    x.style.display = "none";
  }
}
</script>

<script src = 'https://code.jquery.com/jquery-3.3.1.js'></script>

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