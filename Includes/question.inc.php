<?php
if (isset($_POST['submit-question']) && isset($_POST['user-name'])) {
    
    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['user-name']);
    $subject = mysqli_real_escape_string($conn, $_POST['sub']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $details = mysqli_real_escape_string($conn, $_POST['qdetails']);

    $question = str_replace("\\\\", "\\", $question);
    $question = str_replace("\\'", "'", $question);
    $question = str_replace('\\"', '"', $question);
    $details = str_replace("\\r\\n", "<br>", $details);
    $details = str_replace("\\\\", "\\", $details);
    $details = str_replace("\\'", "'", $details);
    $details = str_replace('\\"', '"', $details);

    if (empty($username) || empty($subject) || empty($question)) {
        header('Location: ../Discussion/Discussion_bounds.php?error=emptyfield');
        exit();
    } else {
        $sql = "INSERT INTO questions (q_user, q_sub, q_question, q_details) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../Discussion/Discussion_bounds.php?error=sql');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $username, $subject, $question, $details);
            mysqli_stmt_execute($stmt);
        }
    }
    header("Location: ../Discussion/Discussion_bounds.php?submission=success");
} else {
    header("Location: ../Discussion/Discussion_bounds.php");
}