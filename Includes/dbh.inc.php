<?php

$servername = "localhost";
$dBUsername = "phpmyadmin";
$dBPassword = "abcde";
$dBName = "jtTaleem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}