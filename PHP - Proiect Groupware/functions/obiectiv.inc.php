<?php
    if(isset($_POST["submit-adauga-obiectiv"])){
        if(!isset($_POST["denumire_obiectiv"]))
            header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        else
        {
        require '../db/dbconnection.php';
        $sql = "insert into obiective (DenumireObiectiv,Indeplinit,IdSarcina) values('".$_POST["denumire_obiectiv"]."',false,'".$_POST["sarcina"]."');";
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