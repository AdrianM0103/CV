<?php 
    require 'db/dbconnection.php';
    $query = "
select u.Id, u.Username from utilizatori u inner join proiecte_utilizatori pu on pu.IdUtilizator=u.Id where pu.IdProiect=(select p.IdProiect from proiecte p inner join liste l on p.IdProiect=l.IdProiect inner join sarcini s on s.IdLista=l.IdLista where s.IdSarcina=".$_GET["sarcina"].") and u.Id not in (select su.IdUtilizator from sarcini_utilizatori su where su.IdSarcina=".$_GET["sarcina"].");";
    $result = $conn ->query($query);
    while($utilizator = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$utilizator["Id"].'">'.$utilizator["Username"].' </option>';
    }
?>