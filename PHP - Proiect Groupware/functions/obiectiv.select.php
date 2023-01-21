<?php 
    require 'db/dbconnection.php';
    $query = "select o.IdObiectiv,o.DenumireObiectiv from obiective o where o.IdSarcina=".$_GET["sarcina"];
    $result = $conn ->query($query);
    while($obiectiv = mysqli_fetch_assoc($result))
    {
        echo '<option value="'.$obiectiv["IdObiectiv"].'">'.$obiectiv["DenumireObiectiv"].' </option>';
    }
?>