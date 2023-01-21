<?php
    if(isset($_POST["submit-sterge-obiectiv"])){
        require '../db/dbconnection.php';
        if(isset($_POST["selectare_obiectiv"])){
        $obiectiv = $_POST["selectare_obiectiv"];
        $query = "delete from obiective where IdObiectiv=".$obiectiv;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("location: ../sarcina.php?proiect=".$_POST["sarcina"]);
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../sarcina.php?sarcina='.$_POST["sarcina"]);}
        else
            header("location: ../indexonline.php?emptyInputs");
    }
?>