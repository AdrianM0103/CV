<?php
    require '../db/dbconnection.php';
    $sql = "UPDATE obiective SET Indeplinit=false WHERE IdObiectiv=".$_POST["obiectivv"];
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
?>