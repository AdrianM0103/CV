<?php
    if(isset($_POST["submit-sterge-sarcina"])){
        require '../db/dbconnection.php';
        if(isset($_POST["selectare_sarcina"])){
        $sarcina = $_POST["selectare_sarcina"];
        $query = "delete from sarcini where IdSarcina=".$sarcina;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("location: ../indexonline.php?proiect=".$_POST["proiectul"]);
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../indexonline.php?proiect='.$_POST["proiectul"]);}
        else
            header("location: ../indexonline.php?emptyInputs");
    }
?>