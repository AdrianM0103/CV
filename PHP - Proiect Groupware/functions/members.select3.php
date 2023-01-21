<?php 
    require 'db/dbconnection.php';
    $query = "select distinct u.Id,u.Username from proiecte_utilizatori pu inner join utilizatori u on u.Id=pu.IdUtilizator where pu.IdUtilizator!=".$_SESSION["id"]." && pu.IdUtilizator not in (select u1.Id from utilizatori u1 inner join proiecte_semiadmin psa1 on u1.Id=psa1.IdUtilizator where psa1.IdProiect=".$proiectul.");";
    $result = $conn ->query($query);
    while($utilizator = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$utilizator["Id"].'">'.$utilizator["Username"].' </option>';
    }
?>