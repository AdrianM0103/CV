<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $current_pwd = $_POST["current_pwd"];
    $new_pwd = $_POST["new_pwd"];
    $new_pwdrepeat = $_POST["new_pwdrepeat"];

    require_once "../../db/dbconnection.php";
    require_once "functions.inc.php";

    if(emptyInputChangePassword($email, $current_pwd, $new_pwd, $new_pwdrepeat) !== false) {
        header("location: ../change-password.php?error=emptyinput");
        exit();
    }

    if(checkCredentials($conn, $email, $current_pwd) !== false) {
        header("location: ../change-password.php?error=wrongcredentials");
        exit();
    }

    if(pwdMatch($new_pwd, $new_pwdrepeat) !== false) {
        header("location: ../change-password.php?error=passwordsdontmatch");
        exit();
    }

    changePassword($conn, $email, $new_pwd);

}
else {
    header("location: ../change-password.php");
}