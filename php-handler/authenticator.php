<?php
session_start();

include "../php_connect/connect.php";

if (isset($_SESSION['ID_users'])) {
    $IDuser = $_SESSION['ID_users'];
    if ($IDuser === '') {
        unset($IDuser);
    }
}

include_once("../GA/GoogleAuthenticator.php");

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();

$add_secret = "UPDATE users SET secret_key = '$secret' WHERE id_users = '$IDuser'";
$result = mysqli_query($connect, $add_secret);

header("location:../profile.php");