<?php 
    require 'db/dbconnection.php';
    $query = "select l.IdLista,l.DenumireLista from liste l where l.IdProiect=".$proiectul;
    $result = $conn ->query($query);
    while($lista = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$lista["IdLista"].'">'.$lista["DenumireLista"].' </option>';
    }
?>