<?php

$query3='select * from sarcini s where IdSarcina='.$_GET["sarcina"];
$result3 = $conn ->query($query3);
$sarcina= mysqli_fetch_assoc($result3);
$string=$string.'
<div class="descriere">
    <p class="titlu-sarcina">'.$sarcina["DenumireSarcina"].'</p>
    <p class="descriere-sarcina">'.$sarcina["DescriereSarcina"].'</p>
</div>';
?>