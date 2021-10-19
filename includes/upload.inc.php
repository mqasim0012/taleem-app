<?php
session_start();

include "dbh.inc.php";

if (isset($_POST['file-submit'])) {
    if (isset($_POST['topic'])) {
        $f_topic = $_POST['topic'];
    }
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileIntendedName = $_POST['file-name'];
    $f_name = $_POST['file-name'];
    $v_or_f = 1; // 1 => file, 0 => video

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = 'pdf';

    if ($fileActualExt === $allowed) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $exists = false;
                $sql = "SELECT * FROM files WHERE f_topic = '$f_topic';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($f_name === $row['f_name']) {
                            $exists = true;
                        } 
                    }
                }
                if ($exists === true) {
                    echo "file name already exists";
                } else if ($exists === false) {
                    $fileNameNew = $f_name.".".$fileActualExt;
                    $fileDestination = '../docs/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $f_src = "docs/".$fileNameNew;

                    $sql = "INSERT INTO files (f_topic, v_or_f, f_name, f_src) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "An unknown error occurred";
                    } else {
                        mysqli_stmt_bind_param($stmt, "siss", $f_topic, $v_or_f, $f_name, $f_src);
                        mysqli_stmt_execute($stmt);
                    }
                    echo "done";
                    }
            } else {
                echo "file size exceeds limit!";
            }
        } else {
            echo "An unknown error occured!";
        }
    } else {
        echo "Unsupported file format, only pdfs are accepted try converting it to a pdf";
    }

} else {
    header('Location: ../subject.php');
}