<?php
    if(isset($_POST["submit-schimba-denumire"])){
    $name=$_POST["denumire_sarcina"];
    require '../db/dbconnection.php';
    $sql = "UPDATE sarcini SET DenumireSarcina='".$name."' WHERE IdSarcina=".$_POST["sarcina"];
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
    }
?>