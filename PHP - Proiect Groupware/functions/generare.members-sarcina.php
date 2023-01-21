<?php

$string = $string.
'<div class="lista_membrii">
    <p>Membrii:</p>
    <ul>';

$query5 = "select Username from sarcini_utilizatori inner join utilizatori on IdUtilizator = Id where IdSarcina=".$_GET["sarcina"];
$result5 = $conn->query($query5);
while($membru = mysqli_fetch_assoc($result5)){
    $string=$string."<li>".$membru["Username"]."</li>";
}
$string=$string.'
    </ul>
</div>';
?>