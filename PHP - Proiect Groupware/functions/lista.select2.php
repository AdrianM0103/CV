<?php 
    require 'db/dbconnection.php';
    $query = "select l.IdLista,l.DenumireLista from liste l where l.IdProiect=(select p.IdProiect from proiecte p inner join liste l on p.IdProiect=l.IdProiect inner join sarcini s on s.IdLista=l.IdLista where s.IdSarcina=".$_GET["sarcina"].")";
    $result = $conn ->query($query);
    while($lista = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$lista["IdLista"].'">'.$lista["DenumireLista"].' </option>';
    }
?>