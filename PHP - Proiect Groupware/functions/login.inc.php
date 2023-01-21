<?php
if(isset($_POST["submit-login"])){

    $email = $_POST["email-login"];
    $password = $_POST["password-login"];

    require_once '../db/dbconnection.php';

    if($email == "" || $password == ""){
        header("location: ../index.php?errorLogin=emptyInputLogin");
        exit();
    }
    
    if(!preg_match("/^[a-z0-9._]+\@[a-z]+\.[a-z]+$/",$email)){
        header("location: ../index.php?errorLogin=invalidEmailLogin");
        exit();
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/",$password)||strlen($password)<7){
        header("location: ../index.php?errorLogin=invalidPasswordLogin");
        exit();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se verifica daca exista username-ul si parola se afla in baza de date

    $sql = "select * from utilizatori where Email = '".$email."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?errorLogin=stmtFailedLogin");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if(!$row){
        header("location: ../index.php?errorLogin=emailDoesntExists");
        exit();
    }
    else if($row['Password']!=$password) {
        header("location: ../index.php?errorLogin=passwordWrongLogin");
        exit();
    }
    mysqli_stmt_close($stmt);
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se salveaza sesiunea pentru 20 de minute

    session_start();
    $_SESSION['id'] = $row['Id'];
    $_SESSION['username'] = $row['Username'];
    $_SESSION['start']=time();
    $_SESSION['expire']=$_SESSION['start'] + (20*60);
    header("location: ../indexonline.php");
    exit();

}
?>