<?php
$query6="select count(IdObiectiv) as Count from obiective where IdSarcina=".$_GET["sarcina"];
$result6 = $conn->query($query6);
$maxim= mysqli_fetch_assoc($result6);

$query7="select count(IdObiectiv) as Count from obiective where IdSarcina=".$_GET["sarcina"]." and Indeplinit=true";
$result7 = $conn->query($query7);
$value= mysqli_fetch_assoc($result7);

$string=$string.
'<div class="obiective"><p style="font-size:20px;">Obiective</p>
    <label for="progress-bar">Progres: </label>
    <progress max='.$maxim["Count"].' value='.$value["Count"].' style="width:400px" name="progress-bar"></progress>'.$value["Count"].'/'.$maxim["Count"].'<div class="lista-obiective">';

$query8="select * from obiective where IdSarcina=".$_GET["sarcina"];
$result8 = $conn->query($query8);
while($obiectiv = mysqli_fetch_assoc($result8)){
    if($obiectiv["Indeplinit"]==false)
    $string=$string.'<form method="POST" action="functions/obiectiv.indeplinire.php"><div style="display:flex;flex-direction:row"><input type="checkbox" name="'.$obiectiv["IdObiectiv"].' value="'.$obiectiv["IdObiectiv"].'" class="obiectivul"><label for="'.$obiectiv["IdObiectiv"].'">'.$obiectiv["DenumireObiectiv"].'</label></div><input type="text" name="sarcina" style="display:none" value="'.$_GET["sarcina"].'"><input type="text" name="obiectivv" style="display:none" value="'.$obiectiv["IdObiectiv"].'"></form>';
    else
    $string=$string.'<form method="POST" action="functions/obiectiv.neindeplinire.php"><div style="display:flex;flex-direction:row"><input type="checkbox" name="'.$obiectiv["IdObiectiv"].' value="'.$obiectiv["IdObiectiv"].'" checked class="obiectivul"><label for="'.$obiectiv["IdObiectiv"].'">'.$obiectiv["DenumireObiectiv"].'</label></div><input type="text" name="sarcina" style="display:none" value="'.$_GET["sarcina"].'"><input type="text" name="obiectivv" style="display:none" value="'.$obiectiv["IdObiectiv"].'"></form>';
}

$string=$string.'</div></div>';
?>