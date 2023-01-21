<?php
if(isset($_POST["submit-adauga-membru-sarcina"])){
    if(isset($_POST["selectare_user"])){
    $membrunou=$_POST["selectare_user"];
    $sarcina = $_POST["sarcina"];
    
    require '../db/dbconnection.php';
    $sql = "insert into sarcini_utilizatori(IdUtilizator,IdSarcina) values('".$membrunou."','".$sarcina."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sarcina.php?sarcina=".$_POST["sarcina"]);}
    else
        header("location: ../indexonline.php?emptyInputs");
}
?>