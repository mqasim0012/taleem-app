<?php

if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';
	
	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];
	
	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?error=emptyfield");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE userEmail=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
					error_log(mysqli_error($conn));
			header("Location: ../index.php?error=sqlerror1");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['userPwd']);
				if ($pwdCheck == false) {
					header("Location: ../index.php?error=wrongpwd");
					exit();
				} else if ($pwdCheck == true) {
					session_start();
					$_SESSION['userId'] = $row['userId'];
					$_SESSION['admin'] = $row['admin'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['userEmail'] = $row['userEmail'];
					header("Location: ../index.php?login=success");
					exit();
				} else {
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
			} else {
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}
} else {
	header("Location: ../index.php");
	exit();
}