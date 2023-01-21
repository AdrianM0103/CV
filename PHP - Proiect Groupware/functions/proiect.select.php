
<?php 
    require 'db/dbconnection.php';
    $query = "select p.IdProiect,p.DenumireProiect from proiecte p inner join proiecte_utilizatori pu on p.IdProiect=pu.IdProiect where pu.IdUtilizator=".$_SESSION['id'];
    $result = $conn ->query($query);
    while($proiect = mysqli_fetch_assoc($result))
    {
        if(isset($_GET["proiect"]))
        {
            if($_GET["proiect"]==$proiect["IdProiect"])
                echo '<option value="'.$proiect["IdProiect"].'" selected> '.$proiect["DenumireProiect"].' </option>';
            else
                echo '<option value="'.$proiect["IdProiect"].'"> '.$proiect["DenumireProiect"].' </option>';
        }
        else
            echo '<option value="'.$proiect["IdProiect"].'"> '.$proiect["DenumireProiect"].' </option>';
    }
    ?>