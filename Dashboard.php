<?php
    include 'Dashboard_header.php';
?>

<div class="subject-container">
	<?php
	$sql = "SELECT * FROM subjects LIMIT 6;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$subject = $row['s_sub'];
			$img = $row['s_img'];
			echo "<div class='box'>
			<a href = 'SUBJECTS/".$subject.".php'><div class='imgBox' data-animate-scroll='{
		  'x': '0%',
		  'y': '0%',  
		  'scaleY': '0.5',
		  'alpha': '0',  
		  'easingType': 'Back.easeIn',  
		  'duration': '1',
		  'opacity': '0',
		  'reverse': 'false'
		  }'>
				<img src='SUBJECTS/Subs/".$img."'>
			</div>
			<div class='details'>
				<div class='content'>
					<p>".$subject."</p>
				</div>
			</div>
		</div></a>";
		}
	}
	?>
</div>

<div id="load-more">
	<button class = 'trigger'>Load more subjects</button>
</div>

<?php
    include "Dashboard_footer.php"
?>