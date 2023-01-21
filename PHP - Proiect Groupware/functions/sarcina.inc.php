<?php

if(isset($_POST["submit-adauga-sarcina"])){
    
    session_start();
    require '../db/dbconnection.php';
    if($_POST["denumire_sarcina"]!=""&& isset($_POST["list_selector_sarcina"])){
    $denumire = $_POST["denumire_sarcina"];
    $lista = $_POST["list_selector_sarcina"];
    $proiectul = $_POST["proiectul"];
    
    $sql = "insert into sarcini(DenumireSarcina,DescriereSarcina,IdLista,IdAdministrator) values('".$denumire."','','".$lista."','".$_SESSION["id"]."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?proiect=".$proiectul);
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    $query10 = "select s.IdSarcina from sarcini s inner join liste l on l.IdLista=s.IdLista where s.IdAdministrator=".$_SESSION["id"]." && l.IdProiect=".$proiectul." order by 1 desc;";
    $result10 = $conn ->query($query10);
    $rezultat = mysqli_fetch_assoc($result10);
    $sql = "insert into sarcini_utilizatori(IdSarcina,IdUtilizator) values('".$rezultat["IdSarcina"]."','".$_SESSION["id"]."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?proiect=".$proiectul);
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../indexonline.php?proiect=".$proiectul);
    }
    else
    header("location: ../indexonline.php?emptyInputs");
}
?>