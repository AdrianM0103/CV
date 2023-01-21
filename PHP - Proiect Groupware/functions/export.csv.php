<?php
    require '../db/dbconnection.php';
    $queryexp="select l.IdLista,l.DenumireLista from liste l where l.IdProiect=".$_POST["proiectul"];
    $resultexp=$conn -> query($queryexp);
    $list = array();
    $count=0;
    
    $elemente=array();
    while($lista = mysqli_fetch_assoc($resultexp)){
        array_push($list,$lista["DenumireLista"]);
        $queryexp2="select s.DenumireSarcina from sarcini s where s.IdLista=".$lista["IdLista"]." limit 1 offset 0";
        $resultexp2=$conn -> query($queryexp2);
        array_push($elemente,mysqli_fetch_assoc($resultexp2)["DenumireSarcina"]);
        $count++;
    }
     $header_args = $list;
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=raport.csv');
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, $header_args);
    fputcsv($output, $elemente);
    
    for($i=1;$i<=$count;$i++){
        $elemente=array();
        $queryexp="select l.IdLista,l.DenumireLista from liste l where l.IdProiect=".$_POST["proiectul"];
        $resultexp=$conn -> query($queryexp);
        while($lista=mysqli_fetch_assoc($resultexp)){
            $queryexp2="select s.DenumireSarcina from sarcini s where s.IdLista=".$lista["IdLista"]." limit 1 offset ".$i;
            $resultexp2=$conn -> query($queryexp2);
            array_push($elemente,mysqli_fetch_assoc($resultexp2)["DenumireSarcina"]);
        }
        fputcsv($output,$elemente);
    }
        
    exit;
?>