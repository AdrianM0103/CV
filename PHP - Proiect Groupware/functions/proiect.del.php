<?php
if(isset($_POST["submit-sterge-proiect"]))
    require '../db/dbconnection.php';
    $query = "delete from proiecte where IdProiect=".$_POST["proiectul"];
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("location: ../indexonline.php?proiect=".$_POST["proiectul"]);
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../indexonline.php');
?>