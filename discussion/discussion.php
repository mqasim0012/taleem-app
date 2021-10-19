<h2 id = "heading">FORUM</h2>
<div class="border-heading"></div>
<div class="intro">
    <p>
    Post and reply, interacting with the community to further boost your learning.<br>
    Posts may be in english or urdu.
    </p>
</div>

<div class="post-question">
    <button id = 'post'>Create a post</button>
</div>

<div class='qcontainer'>
<?php
    if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div class = 'q-header'>
        <p id = 'interaction-identifier'>POSTING AS ".$username."</p>
    </div> <div class='question'>
    <h2>CREATE POST</h2>";

    if (isset($_GET['error'])) {
        echo "<script>
                $('.qcontainer').toggle();
              </script>";
        if ($_GET['error'] === 'emptyfield') {
            echo "<p id = 'error'>Fill in all necessary fields!</p>";
        }
        if ($_GET['error'] === 'sql') {
            echo "<p id = 'error'>An unidentifiable error occured!</p>";
        }
    } else if (isset($_GET['submission'])) {
        echo "<script>
                $('.qcontainer').toggle();
              </script>";
        if ($_GET['submission'] === 'success') {
            echo "<p id = 'success'>Post created successfully!</p>";
        }
    }

    $sql = "SELECT * FROM subjects";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    echo "<form action='../includes/question.inc.php' method = 'post'>
            <input type='hidden' name = 'user-name' value = '".$username."'>
            <p>Subject</p>
            <select size = 1 name = 'sub'>";
        if ($resultCheck > 0) {
            echo "<option name = 'other' value = 'other'>None</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option name = '".$row['s_sub']."' value = '".$row['s_sub']."'>".$row['s_sub']."</option>";
            }
        }
    echo "</select>
          <p>Heading</p>
          <input type = 'text' name = 'question'>
          <p>Enter optional details</p>
          <textarea type = 'text' name = 'qdetails'></textarea><br>
          <button type = 'submit' name = 'submit-question'>Post</button>
          </form></div>";
    } else {
    echo "<p>Please <a id = 'qtologin' href = '../index.php#login'><u>log in</u></a> to your jt taleem account to create a post.</p><br><p></p>You may reply to other posts without logging in</p>";
    }
    ?>
</div>

<div class="qoftcontainer">
    <?php
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
                        <textarea name='rtext' id='rtext' placeholder='Write a reply!'></textarea><br>
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
    ?>
</div>

<div id="load-more">
	<button class = 'trigger'>Load more questions</button>
</div>