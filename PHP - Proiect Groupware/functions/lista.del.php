<?php
    if(isset($_POST["submit-sterge-lista"])){
        if(isset($_POST["list_selector"])){
        require '../db/dbconnection.php';
        $lista = $_POST["list_selector"];
        $query = "delete from liste where IdLista=".$lista;
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