<?php

if(isset($_POST["submit-register"])){

    $username = $_POST["user-register"];
    $password = $_POST["password-register"];
    $rptpassword = $_POST["retype-password-register"];
    $email = $_POST["email-register"];

    require_once '../db/dbconnection.php';

    if($username == "" || $password == "" || $rptpassword == ""||$email==""){
        header("location: ../index.php?errorRegister=emptyInputRegister");
        exit();
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../index.php?errorRegister=invalidUserRegister");
        exit();
    }

    if(!preg_match("/^[a-z0-9._]+\@[a-z]+\.[a-z]+$/",$email)){
        header("location: ../index.php?errorRegister=invalidEmailRegister");
        exit();
    }
    
    if(!preg_match("/^[a-zA-Z0-9]*$/",$password)||strlen($password)<7){
        header("location: ../index.php?errorRegister=invalidPasswordRegister");
        exit();
    }
    
    if($password != $rptpassword){
        header("location: ../index.php?errorRegister=passwordMatchRegister");
        exit();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se verifica daca exista username-ul in baza de date

    $sql = "select * from utilizatori where username = '".$username."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?errorRegister=stmtFailedRegister");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        header("location: ../index.php?errorRegister=userExistsRegister");
        exit();
    }

    mysqli_stmt_close($stmt);

    $sql = "select * from utilizatori where email = '".$email."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?errorRegister=stmtFailedRegister2");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        header("location: ../index.php?errorRegister=emailExistsRegister");
        exit();
    }

    mysqli_stmt_close($stmt);

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se adauga un utilizator
    $sql = "insert into utilizatori(username,password,email) values('".$username."','".$password."','".$email."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?errorRegister=stmtFailedRegister3");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?succes");
}

?>