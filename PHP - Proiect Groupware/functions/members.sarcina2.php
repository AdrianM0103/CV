<?php
    if(isset($_POST["submit-sterge-membru-sarcina"])){
        require '../db/dbconnection.php';
        if(isset($_POST["selectare_user"])){
        $sarcina = $_POST["sarcina"];
        $query = "delete from sarcini_utilizatori where IdSarcina=".$sarcina." and IdUtilizator=".$_POST["selectare_user"];
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query)){
            header("location: ../sarcina.php?sarcina=".$sarcina);
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location: ../sarcina.php?sarcina='.$sarcina);}
        else
            header("location: ../indexonline.php?emptyInputs");
    }
?>