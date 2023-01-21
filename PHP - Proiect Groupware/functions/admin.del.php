<?php
    if(isset($_POST["submit-sterge-admin"])){
        if(isset($_POST["selectare_user"])){
        require '../db/dbconnection.php';
        $user = $_POST["selectare_user"];
        $query = "delete from proiecte_semiadmin where IdUtilizator=".$user;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("location: ../indexonline.php?proiect=".$_POST["proiectul"]);
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../indexonline.php?proiect='.$_POST["proiectul"]);
        }
        else
            header("location: ../indexonline.php?emptyInputs");
    }
?>