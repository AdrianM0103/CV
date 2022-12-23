<?php

session_start();

require_once "../../db/dbconnection.php";

if(isset($_POST["export"])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=carti.csv');
    $output= fopen("php://output","w");
    fputcsv($output,array('Carti apreciate:'));
    $query = "select titlu from carti inner join utilizatori_carti on carti.id_carte=utilizatori_carti.id_carte where utilizatori_carti.review=false and utilizatori_carti.id_utilizator=".$_SESSION["id_utilizator"];
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){
        fputcsv($output,$row);
    }
    fclose($output);
}

?>
