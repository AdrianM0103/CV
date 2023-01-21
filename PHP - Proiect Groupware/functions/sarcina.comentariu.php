<?php
    if(isset($_POST["submit-comment"])){
        if(!isset($_POST["sendcomentariu"]))
            header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        else
        {
        session_start();
        require '../db/dbconnection.php';
        $sql = "insert into comentarii (Comentariu,IdAutor,IdSarcina) values('".$_POST["sendcomentariu"]."','".$_SESSION["id"]."','".$_POST["sarcina"]."');";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        }
    }
?>