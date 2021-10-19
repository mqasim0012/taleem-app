<?php
/**
 * Automating adding a subject+topics
 * 
 * IN DEVELOPMENT
 * 
 */ 
if (isset($_POST['submit-subject'])) {
    include 'dbh.inc.php';

    $subject = mysqli_real_escape_string($conn, $_POST["subjectName"]);
    $topics = array(mysqli_real_escape_string($conn, $_POST["maintopic1"]), mysqli_real_escape_string($conn, $_POST["maintopic2"]), mysqli_real_escape_string($conn, $_POST["maintopic3"]), mysqli_real_escape_string($conn, $_POST["maintopic4"]), mysqli_real_escape_string($conn, $_POST["maintopic5"]), mysqli_real_escape_string($conn, $_POST["maintopic6"]), mysqli_real_escape_string($conn, $_POST["maintopic7"]), mysqli_real_escape_string($conn, $_POST["maintopic8"]), mysqli_real_escape_string($conn, $_POST["maintopic9"]), mysqli_real_escape_string($conn, $_POST["maintopic10"]));
    
    if (empty($subject)) {
        header("Location: ../dashboard.php?error=emptyfield");
        exit();
    } else if (empty($topics[0]) || empty($topics[1])) {
            header('Location: ../dashboard.php?error=lessThanMin');
            exit();
    } else {
        $sql = "INSERT INTO subjects (s_subject, s_topic1, s_topic2, s_topic3, s_topic4, s_topic5, s_topic6, s_topic7, s_topic8, s_topic9, s_topic10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../dashboard.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssssssssss", $subject, $topics[0], $topics[1], $topics[2], $topics[3], $topics[4], $topics[5], $topics[6], $topics[7], $topics[8], $topics[9]);
            mysqli_stmt_execute($stmt);
        }
        header('Location: ../dashboard.php?subject=success');
    }
    /*
    if (!isset($topics[1])) {

    } else if (isset($topics[10])) {
        header('Location: ../dashboard.php?error=moreThanMax');
        exit();
    } else {
      $sql = "INSERT INTO subjects (s_subject, s_topic1, s_topic2, s_topic3, s_topic4, s_topic5, s_topic6, s_topic7, s_topic8, s_topic9, s_topic10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../dashboard.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssssssssss", $subject, $topics[0], $topics[1], $topics[2], $topics[3], $topics[4], $topics[5], $topics[6], $topics[7], $topics[8], $topics[9]);
            mysqli_stmt_execute($stmt);
        }
        header('Location: ../dashboard.php?subject=success');
    }
    */
} else {
    header('Location: ../dashboard.php');
}