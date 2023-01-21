<?php

    require 'db/dbconnection.php';
    $query100 = "select c.IdComentariu,c.Comentariu,u.Username from comentarii c inner join utilizatori u on u.Id=c.IdAutor where c.IdSarcina=".$_GET["sarcina"];
    $result100 = $conn ->query($query100);
    while($comentariu = mysqli_fetch_assoc($result100))
    {
        echo 
        '<div class="comentariu">
        <p class="autor">'.$comentariu["Username"].'</p>
        <p class="comentariu-singur">'.$comentariu["Comentariu"].'</p>
        </div>';
    }
    

?>