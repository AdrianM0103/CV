<?php
    if(isset($_POST["submit-sterge-sarcina"])){
        require '../db/dbconnection.php';
        $sarcina = $_POST["sarcina"];
        $query = "delete from sarcini where IdSarcina=".$sarcina;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("location: ../indexonline.php");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../indexonline.php');
    }
?>