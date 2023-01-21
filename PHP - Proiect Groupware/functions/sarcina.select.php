<?php 
    require 'db/dbconnection.php';
    $query = "select s.IdSarcina,s.DenumireSarcina from sarcini s inner join liste l on s.IdLista=l.IdLista where l.IdProiect=".$proiectul;
    $result = $conn ->query($query);
    while($sarcina = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$sarcina["IdSarcina"].'">'.$sarcina["DenumireSarcina"].' </option>';
    }
?>