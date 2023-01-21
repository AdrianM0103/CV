<?php
    //verificare
    require 'db/dbconnection.php';
    $query = "select su.IdUtilizator from sarcini s inner join sarcini_utilizatori su on su.IdSarcina=s.IdSarcina where su.IdSarcina=".$_GET["sarcina"]." and su.IdUtilizator=".$_SESSION["id"];
    $result = $conn ->query($query);
    $access = mysqli_fetch_assoc($result);
    //generare
    if($access["IdUtilizator"]!=$_SESSION["id"])
        echo '<p id="welcome" style="color:darkred">Access Denied!</p>';
    else{
         $query2 = "select s.IdAdministrator from sarcini s where s.IdSarcina=".$_GET["sarcina"];
         $result2 = $conn ->query($query2);
         $proiect2 = mysqli_fetch_assoc($result2);
         $string='<div class="sarcina-container"><div class="rand">';
         if($_SESSION["id"]!=$proiect2["IdAdministrator"])
         {
             require 'generare.descriere-sarcina.php';
             $string=$string.'</div><div class="rand"><div class="column">';
             require 'generare.obiective-sarcina.php';
             require 'generare.comentarii-sarcina.php';
             $string=$string.'</div>';
             require 'generare.members-sarcina.php';
             $string=$string.'</div>';
         }
         else{
             require 'generare.descriere-sarcina.php';
             require 'generare.tools-sarcina.php';
             $string=$string.'</div><div class="rand"><div class="column">';
             require 'generare.obiective-sarcina.php';
             require 'generare.comentarii-sarcina.php';
             $string=$string.'</div>';
             require 'generare.members-sarcina.php';
             $string=$string.'</div>';
         }
         $string=$string.'</div>';
         echo $string;
    }
?>