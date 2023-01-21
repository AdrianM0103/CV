<?php
    if(isset($_POST["submit-schimba-lista"])){
    $listanoua=$_POST["selectare_lista"];
    require '../db/dbconnection.php';
    $sql = "UPDATE sarcini SET IdLista=".$listanoua." WHERE IdSarcina=".$_POST["sarcina"];
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