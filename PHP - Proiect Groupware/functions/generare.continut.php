<?php
    require 'db/dbconnection.php';
    
    //verificare
    $exists=false;
    $query = "select IdProiect from proiecte_utilizatori where IdUtilizator=".$_SESSION["id"];
    $result = $conn ->query($query);
    $string='<div class="container-principal">';
    while($proiect = mysqli_fetch_assoc($result))
        if($proiect["IdProiect"]==$proiectul)
            $exists= true;
        
    //generare
    if($exists==false)
        echo '<p id="welcome" style="color:darkred">Access Denied!</p>';
    else{
            require 'generare.tools.php';
            require 'generare.liste.php';
        }
    $string=$string.'</div>';
    echo $string;
?>