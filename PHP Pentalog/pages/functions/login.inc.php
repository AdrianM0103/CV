<?php

if(isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once "../../db/dbconnection.php";
    require_once "functions.inc.php";

    if(emptyInputLogin($email, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}