<?php
    require 'db/dbconnection.php';
    $query = "select pu.IdUtilizator from sarcini s inner join liste l on s.IdLista=l.IdLista inner join proiecte p on p.IdProiect=l.IdProiect inner join proiecte_utilizatori pu on pu.IdProiect=p.IdProiect where s.IdSarcina=".$_GET["sarcina"]." and pu.IdUtilizator=".$_SESSION["id"];
    $result = $conn ->query($query);
    $access = mysqli_fetch_assoc($result);
    if($access==$_SESSION["id"])
        header("location: indexonline.php");
?>