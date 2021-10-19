<?php
if (
    isset($_POST['submit-reply'])
    &&
    isset($_POST['rtext'])
    &&
    isset($_POST['parent-id'])
    &&
    isset($_POST['reply-user-id'])
) {
    include 'dbh.inc.php';

    $reply  = mysqli_real_escape_string($conn, $_POST['rtext']);
    $parent = $_POST['parent-id'];
    $replyUser = $_POST['reply-user-id'];
    if (empty($replyUser)) {
        $replyUser = "Anonymous";
    }

    if (empty($reply) || empty($parent)) {
        header('Location: ../discussion/discussion_bounds.php?error=emptyreplyfield');
        exit();
    } else {
        $sql = "INSERT INTO replies (parent_id, r_user, r_text)
                VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../discussion/discussion_bounds.php?error=sql');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "iss", $parent, $replyUser, $reply);
            mysqli_stmt_execute($stmt);
        }
    }
    header("Location: ../discussion/discussion_bounds.php?reply-submission=success");
} else {
    header("Location: ../discussion/discussion_bounds.php");
}
?>