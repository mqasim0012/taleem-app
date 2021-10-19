<?php

include 'dbh.inc.php';

$questionNewCount = $_POST['questionNewCount'];

$sql = "SELECT * FROM questions ORDER BY q_id DESC LIMIT $questionNewCount";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 8) {
    $sql = "SELECT * FROM questions ORDER BY q_id DESC LIMIT 8";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $num = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $poster = $row['q_user'];
            $id = $row['q_id'];
            echo "<div class='question-holder'>
            <div class='q-header'>
                <p><span id = 'uid'>USER: ".$poster."</span><span id = 'sub'>SUBJECT: ".$row['q_sub']."</span></p>
            </div>
            <div class='q-content'>
                <h6 id = 'question'>".$row['q_question']."</h6>
                <p id = details>".$row['q_details']."</p>
            </div>";

            $sql1 = "SELECT * FROM replies WHERE parent_id = $id";
            $result1 = mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);

            $num = $num + 1;
            echo "  <div class = 'q-footer'>
                        <a id = 'first' onclick = 'reveal".$num."Replies()'><u>Reply</u></a>
                        <a id = 'toggle-replies' onclick = 'reveal".$num."Replies()'><u>View replies (".$resultCheck1.")</u></a>
            </div>";
            echo "<div class = 'r_container' id = 'r_num".$num."'>";
                echo "
                <script>
                    function reveal".$num."Replies() {
                        $('#r_num".$num."').toggle();
                    }
                </script>
                <form action='../includes/post-reply.inc.php' method='post' class='post-reply'>
                    <textarea name='rtext' id='rtext'></textarea><br>
                    <input type='hidden' value='".$id."' name='parent-id' />
                    <input type='hidden' value='".$_SESSION['username']."' name='reply-user-id' />
                    <button type = 'submit' name = 'submit-reply'>Post</button>
                </form>";
                if ($resultCheck1 > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo 
                        "<p id = 'r_content'><span id = 'r_uid'>
                            <u>".$row1['r_user']."</u>
                            </span><br><span id = 'r_text'>".$row1['r_text']."</span>
                        </p><br>";
                }
            }
            echo "</div></div>";
        }
    }
}

if ($resultCheck < $questionNewCount) {
    $sql = "SELECT * FROM questions ORDER BY q_id DESC LIMIT 8";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $num = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $poster = $row['q_user'];
            $id = $row['q_id'];
            echo "<div class='question-holder'>
            <div class='q-header'>
                <p><span id = 'uid'>USER: ".$poster."</span><span id = 'sub'>SUBJECT: ".$row['q_sub']."</span></p>
            </div>
            <div class='q-content'>
                <h6 id = 'question'>".$row['q_question']."</h6>
                <p id = details>".$row['q_details']."</p>
            </div>";

            $sql1 = "SELECT * FROM replies WHERE parent_id = $id";
            $result1 = mysqli_query($conn, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);

            $num = $num + 1;
            echo "  <div class = 'q-footer'>
                        <a id = 'first' onclick = 'reveal".$num."Replies()'><u>Reply</u></a>
                        <a id = 'toggle-replies' onclick = 'reveal".$num."Replies()'><u>View replies (".$resultCheck1.")</u></a>
            </div>";
            echo "<div class = 'r_container' id = 'r_num".$num."'>";
                echo "
                <script>
                    function reveal".$num."Replies() {
                        $('#r_num".$num."').toggle();
                    }
                </script>
                <form action='../includes/post-reply.inc.php' method='post' class='post-reply'>
                    <textarea name='rtext' id='rtext'></textarea><br>
                    <input type='hidden' value='".$id."' name='parent-id' />
                    <input type='hidden' value='".$_SESSION['username']."' name='reply-user-id' />
                    <button type = 'submit' name = 'submit-reply'>Post</button>
                </form>";
                if ($resultCheck1 > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo 
                        "<p id = 'r_content'><span id = 'r_uid'>
                            <u>".$row1['r_user']."</u>
                            </span><br><span id = 'r_text'>".$row1['r_text']."</span>
                        </p><br>";
                }
            }
            echo "</div></div>";
        }
    }
    echo "<script type = 'text/javascript'>
        document.getElementById('load-more').style.display = 'none';
    </script>";
}

?>