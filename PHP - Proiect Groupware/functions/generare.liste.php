<?php
    require 'db/dbconnection.php';
    $query = "select * from liste where IdProiect=".$proiectul;
    $result = $conn ->query($query);
    $string = $string.'<div class="lists">';
    while($lista = mysqli_fetch_assoc($result))
    {
        $string = $string.'<div class="lista"><p class="lista-text">'.$lista["DenumireLista"].'</p>
        <div class="sarcini">';
        
        $query2 = "select * from sarcini where IdLista=".$lista["IdLista"];
        $result2 = $conn ->query($query2);
        while($sarcina = mysqli_fetch_assoc($result2)){
            $string = $string.'<a href="sarcina.php?sarcina='.$sarcina["IdSarcina"].'"><div class="sarcina"><p class="sarcina-text">'.$sarcina["DenumireSarcina"].'</p></div></a>';
        }
        $string= $string.'</div></div>';
    }
    $string = $string.'</div>';
?>