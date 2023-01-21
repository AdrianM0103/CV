<?php 
    require 'db/dbconnection.php';
    $query = "select distinct u.Id,u.Username from proiecte_semiadmin psa inner join utilizatori u on u.Id=psa.IdUtilizator where psa.IdProiect=".$proiectul;
    $result = $conn ->query($query);
    while($utilizator = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$utilizator["Id"].'">'.$utilizator["Username"].' </option>';
    }
?>