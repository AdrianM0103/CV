<?php 
    require 'db/dbconnection.php';
    $query = "
 select u.Id, u.Username from utilizatori u inner join sarcini_utilizatori su on su.IdUtilizator=u.Id where su.IdSarcina=".$_GET["sarcina"].' and u.Id !='.$_SESSION["id"];
    $result = $conn ->query($query);
    while($utilizator = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$utilizator["Id"].'">'.$utilizator["Username"].' </option>';
    }
?>