<?php
    session_start();

    if (isset($_SESSION['ID_users'])) {
        $IDuser = $_SESSION['ID_users'];
        if ($IDuser === '') {
            unset($IDuser); 
        }
    }

    include "../php_connect/connect.php";
    require_once '../GA/GoogleAuthenticator.php';

        $ga = new PHPGangsta_GoogleAuthenticator();

        $select_user_key = "SELECT * FROM users WHERE ID_users = '$IDuser'"; 
        $result = mysqli_query($connect, $select_user_key); 
        $key_user = mysqli_fetch_array($result); 
        $secret_key_user = $key_user['secret_key'];

        $checkResult = $ga->verifyCode($secret_key_user, $_POST['code'], 2); 
        if($checkResult){
            header("location: ../index.php");
        } 
        else
        {
            header("location: ./form-ga.php");
            $_SESSION['message'] ="Вы ввели неправильный код";
        }
    