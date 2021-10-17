<?php

include 'dbh.inc.php';

$questionNewCount = $_POST['questionNewCount'];

$sql = "SELECT * FROM questions ORDER BY q_id DESC LIMIT $questionNewCount";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 8) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='question-holder'>
        <div class='q-header'>
            <p><span id = 'uid'>USER: ".$row['q_user']."</span><span id = 'sub'>SUBJECT: ".$row['q_sub']."</span></p>
        </div>
        <div class='q-content'>
            <h6 id = 'question'>QUESTION: ".$row['q_question']."</h6>
            <p id = details>".$row['q_details']."</p>
        </div>
        <div class = 'q-footer'>
            <a id = 'first' href = '#!'><u>Reply</u></a>
            <a href = '#!'><u>View replies</u></a>
        </div>
        </div>";
    }
}

if ($resultCheck < $questionNewCount) {
    echo "<script type = 'text/javascript'>
        document.getElementById('load-more').style.display = 'none';
    </script>";
}

?>