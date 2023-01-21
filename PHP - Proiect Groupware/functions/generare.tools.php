<?php
    $query51="select IdAdministrator from proiecte where IdProiect=".$proiectul."&& IdAdministrator=". $_SESSION["id"];
    $result51= $conn -> query($query51);
    $administrator1= mysqli_fetch_assoc($result51);
    if($administrator1["IdAdministrator"]==$_SESSION["id"]){
        $string=$string.
    '<div class="tools">
        <button class="tool-but" id="addLista">Adauga lista</button>
        <button class="tool-but" id="delLista">Sterge lista</button>
        <button class="tool-but" id="addSarcina">Adauga sarcina</button>
        <button class="tool-but" id="delSarcina">Sterge sarcina</button>
        <button class="tool-but" id="addMembru">Adauga membrii</button>
        <button class="tool-but" id="delMembru">Sterge membrii</button>
        <button class="tool-but" id="addSemiAdm">Adauga admin secundar</button>
        <button class="tool-but" id="delSemiAdm">Sterge admin secundar</button>
        <button class="tool-but" id="exportCSV">Export raport</button>
        <button class="tool-but" id="delProiect">Sterge proiectul</button>
    </div>';
    }
    else{
    $query52="select IdUtilizator from proiecte_semiadmin where IdProiect=".$proiectul."&& IdUtilizator=". $_SESSION["id"];
    $result52= $conn -> query($query52);
    $administrator2=mysqli_fetch_assoc($result52);
    if($administrator2["IdUtilizator"]==$_SESSION["id"])
    $string=$string.
    '<div class="tools">
        <button class="tool-but" id="addLista">Adauga lista</button>
        <button class="tool-but" id="delLista">Sterge lista</button>
        <button class="tool-but" id="addSarcina">Adauga sarcina</button>
        <button class="tool-but" id="delSarcina">Sterge sarcina</button>
    </div>';
    }
    
?>