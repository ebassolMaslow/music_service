<?php

session_start();

include "../php_connect/connect.php";

if (isset($_POST['submit'])) {
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        if ($login === '') {
            unset($login);
        }
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        if ($password === '') {
            unset($password);
        }
    }

    if (isset($_POST['g-recaptcha-response'])) {
        $recapcha = $_POST['g-recaptcha-response'];

        if (!$recapcha) {
            unset($_SESSION['message']);
            $_SESSION['message'] = 'Пожалуйста, подтвердите, что вы не робот';
            header('Location:' . $_SERVER['HTTP_REFERER']);
        } else {
            $secretKey = '6LcDvsomAAAAACQUkaFJEzg07JLxA1MXEInwBQX3';
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recapcha;
            $response = file_get_contents($url);
            $responseKey = json_decode($response, true);

            if ($responseKey['success']) {

                $login = trim($_POST['login']);
                $password = trim($_POST['password']);

                $check_user = "SELECT * FROM `users` WHERE `login`= '$login'";

                $result = mysqli_query($connect, $check_user);

                $info_user = mysqli_fetch_array($result);

                if (empty($info_user['ID_users'])) {

                    unset($_SESSION['message']);
                    $_SESSION['message'] = 'Неправильный логин или пароль';
                    header('Location:' . $_SERVER['HTTP_REFERER']);
                } else {
                    if (password_verify($password, $info_user['password'])) {
                        $_SESSION['login'] = $info_user['login'];
                        $_SESSION['ID_users'] = $info_user['ID_users'];
                        if (empty($info_user['secret_key'])) {
                            header("location: ../index.php");
                        } else {
                            header("location: form-ga.php");
                        }
                    }
                }
            }
        }
    }
}
