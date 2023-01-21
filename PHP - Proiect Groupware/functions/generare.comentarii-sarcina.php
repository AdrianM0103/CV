<?php
$string=$string.'
<div class="comentarii">
    <form class="comentariul" method="POST" action="functions/sarcina.comentariu.php">
        <input id="comentariu" name="sendcomentariu" maxlength="250" style="width:85%;height:100px; margin-left:20px;overflow-wrap: break-word;"/>
        <input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">
        <button type="submit" name="submit-comment">Trimite comentariu</button>
    </form>
    <button class="view-comentarii"  style="width:98%; margin-left:20px; position:relative; top:0px"> Vezi comentariile</button>
</div>';
?>
