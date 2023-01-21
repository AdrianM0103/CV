<?php 
    require 'db/dbconnection.php';
    $query = "select distinct u.Id,u.Username from utilizatori u where u.Id not in (select u1.Id from utilizatori u1 inner join proiecte_utilizatori pu1 on u1.Id=pu1.IdUtilizator where pu1.IdProiect=".$proiectul.");";
    $result = $conn ->query($query);
    while($utilizator = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$utilizator["Id"].'">'.$utilizator["Username"].' </option>';
    }
?>