<?php

include 'dbh.inc.php';

$subjectNewCount = $_POST['subjectNewCount'];

$sql = "SELECT * FROM subjects LIMIT $subjectNewCount";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 6) {
    while ($row = mysqli_fetch_assoc($result)) {
		$subject = $row['s_sub'];
		$img = $row['s_img'];
		echo "<div class='box'>
		<div class='imgBox' data-animate-scroll='{ 'x': '0%', 'y': '0%', 'scaleY': '0.5', 'alpha': '0', 'easingType': 'Back.easeIn', 'duration': '1', 'opacity': '0', 'reverse': 'false'}'>
			<img src='SUBJECTS/Subs/".$img."'>
		</div>
		<div class='details'>
			<div class='content'>
			<form action = 'Subject_bounds.php' method = 'post'>
				<button type='submit' name = 'webdev'>".$subject."</button>
			</form>
			</div>
		</div>
	</div>";
    }
}

if ($resultCheck < $subjectNewCount) {
    echo "<script type = 'text/javascript'>
        document.getElementById('load-more').style.display = 'none';
    </script>";
}

?>