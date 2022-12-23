<?php
session_start();
if(isset($_POST["sortare"])){
    header("Location:../lista_carti_online.php?".$_SESSION['sendvalue']."&sort=".$_POST["sortare"]);
}
?>