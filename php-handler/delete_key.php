<?php
session_start();

include "../php_connect/connect.php";

if (isset($_SESSION['ID_users'])) {
    $IDuser = $_SESSION['ID_users'];
    if ($IDuser === '') {
        unset($IDuser);
    }
}

$queryDelete = "UPDATE users SET secret_key='' WHERE id_users=$IDuser";
$result = mysqli_query($connect, $queryDelete);
header("location:../profile.php");