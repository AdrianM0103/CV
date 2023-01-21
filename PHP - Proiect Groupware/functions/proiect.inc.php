<?php
if(isset($_POST["submit-adauga-proiect"])){

    require_once '../db/dbconnection.php';
    
    $denumireProiect=$_POST["denumire_proiect"];
    $dataFinalizare=$_POST["data_finalizare"];
    if($denumireProiect == "" || $dataFinalizare == ""){
        header("location: ../indexonline.php?emptyInputs");
        exit();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se verifica daca exista un proiect cu acelasi nume in baza de date

    $sql = "select * from proiecte where DenumireProiect = '".$denumireProiect."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?error=stmtFailedLogin");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if($row){
        header("location: ../indexonline.php?error=usedNameProiect");
        exit();
    }
    mysqli_stmt_close($stmt);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //se adauga in proiecte
    session_start();
    $sql = "insert into proiecte(DenumireProiect,DataFinalizare,IdAdministrator) values('".$denumireProiect."','".$dataFinalizare."','".$_SESSION['id']."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?error=stmtFailed1");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //se adauga in proiecte_utilizator
    $sql = "select * from proiecte where DenumireProiect = '".$denumireProiect."';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?error=stmtFailedLogin");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    $sql2 = "insert into proiecte_utilizatori(IdProiect,IdUtilizator) values('".$row["IdProiect"]."','".$_SESSION['id']."');";
    if(!mysqli_stmt_prepare($stmt,$sql2)){
        header("location: ../indexonline.php?error=stmtFailed4");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    //se adauga in liste
    $sql = "insert into liste(DenumireLista,IdProiect) values('To Do','".$row["IdProiect"]."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?error=stmtFailed5");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    $sql = "insert into liste(DenumireLista,IdProiect) values('Doing','".$row["IdProiect"]."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?error=stmtFailed5");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "insert into liste(DenumireLista,IdProiect) values('Done','".$row["IdProiect"]."');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../indexonline.php?error=stmtFailed5");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../indexonline.php?adaugat");
}

?>