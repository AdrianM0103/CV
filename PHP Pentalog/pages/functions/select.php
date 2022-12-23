<?php

 if(isset($_GET["state"])){
    require_once "../../db/dbconnection.php";

    $query = "SELECT * FROM carti WHERE id_carte=".$_GET["state"].";";

    $result = mysqli_query($conn, $query);

    $carte = mysqli_fetch_assoc($result);

    header("location: ../carte_offline.php?carte=".$_GET["state"]);
 }