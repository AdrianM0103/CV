<?php 
    require 'db/dbconnection.php';
    $query = "select distinct u.Id,u.Username from utilizatori u inner join proiecte_utilizatori pu on pu.IdUtilizator=u.Id where pu.IdProiect=".$proiectul."&& pu.IdUtilizator !=".$_SESSION["id"];
    $result = $conn ->query($query);
    while($utilizator = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$utilizator["Id"].'">'.$utilizator["Username"].' </option>';
    }
?>