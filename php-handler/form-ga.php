<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Двухфакторная аутентификация</title>
    <link rel="stylesheet" href="../scss/main.css">
    <link rel="shortcut icon" href="../images/svg/logo_purple.svg" type="image/png">
</head>

<body>
    <div class="auth_body">
        <div class="auth_content">
            <h1 class="form-ga-header" >Двухфакторная аутентификация</h1> 
            <?php
            
            session_start();

                if (isset($_SESSION['ID_users'])) {
                    $IDuser = $_SESSION['ID_users'];
                    if ($IDuser === '') {
                        unset($IDuser); 
                    }
                }

                include "../php_connect/connect.php";
                include_once("../GA/GoogleAuthenticator.php"); 
                $ga = new PHPGangsta_GoogleAuthenticator();

                $select_user_key = "SELECT * FROM users WHERE ID_users = '$IDuser'";
                $result = mysqli_query($connect, $select_user_key); 
                $key_user = mysqli_fetch_array($result);
                $secret_key_user = $key_user['secret_key'];
                echo "</div>";
                $qrCodeUrl = $ga->getQRCodeGoogleUrl('esketit', $secret_key_user);
                echo "<img class=\"w\" src=\"".$qrCodeUrl."\">";
                echo "<div>";
                echo "<a class=\"www\"".$secret_key_user.">";
                echo $secret_key_user;
                echo "</div>";
                ?>
                </div>
           

                <form action="verify_code.php?test=$secret_key_user" method="post" class="form_ga"> 
                    <input type="text" maxlength="6" name="code" placeholder="Введите код" class="input_form-ga"> 
                    <button type="submit" class="submitt">Авторизоваться</button>
                </form>
            </body>
            </html>
