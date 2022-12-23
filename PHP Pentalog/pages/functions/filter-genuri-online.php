<?php
session_start();
//se realizeaza conexiunea si query-ul pt filtrul de genuri
require_once '../../db/dbconnection.php';
$query = 'select id_gen,denumire_gen from genuri';

//se stocheaza intr-un string lista de genuri selectate in filtru
$lista_genuri = mysqli_query($conn, $query);
while($gen = mysqli_fetch_assoc($lista_genuri)){
    if($_POST[$gen["id_gen"]])
        $where=$where.$gen["id_gen"]."_";
}

//se returneaza  prin _GET lista de genuri selectate
header('Location:../lista_carti_online.php?value='.$where.'&'.$_SESSION['sendsort']);
?>