<?php

    if(isset($_GET["search"])){
        
        require_once "../../db/dbconnection.php";

        $query = "SELECT * FROM carti WHERE titlu like '%".$_GET["search"]."%';";

        $result = mysqli_query($conn, $query);

        $carti = "";

        while($carte = mysqli_fetch_assoc($result)){
            $carti = $carti.$carte["titlu"]."_";
        }

        header("location: ../lista_carti_online.php?carti=".$carti);
    }