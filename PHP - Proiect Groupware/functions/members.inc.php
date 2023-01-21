<?php
if(isset($_POST["submit-adauga-membru"])){
    if(isset($_POST["selectare_user"])){
    $membrunou=$_POST["selectare_user"];
    $proiectul = $_POST["proiectul"];
    
    require '../db/dbconnection.php';
    $sql = "insert into proiecte_utilizatori(IdUtilizator,IdProiect) values('".$membrunou."','".$proiectul."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?proiect=".$proiectul);
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../indexonline.php?proiect=".$proiectul);}
    else
        header("location: ../indexonline.php?emptyInputs");
}
?>