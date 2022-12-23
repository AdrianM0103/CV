<?php


function invalidUid($username){
    $result = true;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    $result = true;
    if($pwd != $pwdrepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function emailExists($conn, $email){
    $sql = 'SELECT * FROM utilizatori WHERE email ="'.$email.'";';
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        $result = false;
        return $result;
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function emptyInputLogin($email, $pwd){
    $result = true;
    if(empty($email) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd){
    $emailExists = emailExists($conn, $email);

    if($emailExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPassword = password_verify($pwd, $pwdHashed);

    if($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["id_utilizator"] = $emailExists["id_utilizator"];
        $_SESSION["username"] = $emailExists["username"];
        $_SESSION["start"]=time();
        $_SESSION["expire"]=$_SESSION['start'] + (20 * 60);
        header("location: ../../index-online.php");
        exit();
    }
}


function emptyInputChangePassword($username, $current_pwd, $new_pwd, $new_pwdrepeat){
    $result = true;
    if(empty($username) || empty($current_pwd) || empty($new_pwd) || empty($new_pwdrepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function checkCredentials($conn, $email, $current_pwd){
    $emailExists = emailExists($conn, $email);

    if($emailExists === false) {
        header("location: ../change_password.php?error=wrongcredentials");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPassword = password_verify($current_pwd, $pwdHashed);

    if($checkPassword === false){
        header("location: ../change-password.php?error=wrongcredentials");
        exit();
    }
    
    return false;
    exit();
}

function changePassword($conn, $email, $new_pwd){
    $hashedPwd = password_hash($new_pwd, PASSWORD_DEFAULT);
    $sql = "UPDATE utilizatori SET password = '".$hashedPwd."' WHERE email = '".$email."';";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../change-password.php?error=stmtfailed");
    }

    $hashedPwd = password_hash($new_pwd, PASSWORD_DEFAULT);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../change-password.php?error=none");
    exit();
}