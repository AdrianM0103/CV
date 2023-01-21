<?php

if(isset($_POST["submit-adauga-lista"])){
    
    if($_POST["denumire_lista"]!=""){
    require '../db/dbconnection.php';
    $denumire = $_POST["denumire_lista"];
    $proiectul = $_POST["proiectul"];
    
    $sql = "insert into liste(DenumireLista,IdProiect) values('".$denumire."','".$proiectul."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?errorRegister=stmtFailedRegister3");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../indexonline.php?proiect=".$proiectul);
    }
    else
        header("location: ../indexonline.php?emptyInputs");
}
?>