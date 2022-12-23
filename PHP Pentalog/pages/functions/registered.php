<?php

if(isset($_POST["regsubmit"])){

    $username = $_POST["reguser"];
    $password = $_POST["regpass"];
    $rptpassword = $_POST["regpassrep"];
    $email = $_POST["regemail"];
    $nume= $_POST["regnume"];
    $prenume= $_POST["regprenume"];

    require_once '../../db/dbconnection.php';

    if($username == "" || $password == "" || $rptpassword == ""||$email==""||$nume==""||$prenume==""){
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    
    if(!preg_match("/^[a-zA-Z]*$/",$nume)){
        header("location:../register.php?error=invalidName");
        exit();
    }

    if(!preg_match("/^[a-zA-Z]*$/",$prenume)){
        header("location:../register.php?error=invalidPrenume");
        exit();
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("location: ../register.php?error=invalidUser");
        exit();
    }

    if(!preg_match("/^[a-z0-9._]+\@[a-z]+\.[a-z]+$/",$email)){
        header("location: ../register.php?error=invalidEmail");
        exit();
    }
    
    if(!preg_match("/^[a-zA-Z0-9]*$/",$password)||strlen($password)<7){
        header("location: ../register.php?error=invalidPassword");
        exit();
    }
    
    if($password != $rptpassword){
        header("location: ../register.php?error=passwordMatch");
        exit();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se verifica daca exista username-ul in baza de date

    $sql = "select * from utilizatori where username = '".$username."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        header("location: ../register.php?error=userExists");
        exit();
    }

    mysqli_stmt_close($stmt);

    $sql = "select * from utilizatori where email = '".$email."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        header("location: ../register.php?error=emailExists");
        exit();
    }

    mysqli_stmt_close($stmt);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //se verifica daca exista username-ul in baza de date 
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se adauga un utilizator
    $sql = "insert into utilizatori(username,password,email,nume,prenume) values('".$username."','".$hashedPassword."','".$email."','".$nume."','".$prenume."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../register.php?error=stmtFailed2");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php");
}
?>