<?php
session_start();

require_once "../../db/dbconnection.php";

if(isset($_POST["like"])) {

    $verify = "SELECT * FROM utilizatori_carti WHERE id_utilizator='".$_SESSION["id_utilizator"]."' AND id_carte='".$_POST["like"]."';";

    $query = mysqli_query($conn, $verify);

    $result = mysqli_fetch_assoc($query);

    if(!$result){

        $insert = "Insert into utilizatori_carti(id_carte, id_utilizator, review) values('".$_POST["like"]."','".$_SESSION["id_utilizator"]."',true)";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$insert)){
            header("location: ../carte_online.php?error=problema");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../carte_online.php?carte=".$_POST["like"]);
    }
    else if($result["review"] == false){
        $update = "update utilizatori_carti set review=true where id_utilizator=".$_SESSION["id_utilizator"]." and id_carte=".$_POST["like"].";";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$update)){
            header("location: ../carte_online.php?error=problema");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../carte_online.php?carte=".$_POST["like"]);

    }
}

if(isset($_POST["dislike"])) {

    $verify = "SELECT * FROM utilizatori_carti WHERE id_utilizator=".$_SESSION["id_utilizator"]." AND id_carte=".$_POST["dislike"].";";

    $query = mysqli_query($conn, $verify);

    $result = mysqli_fetch_assoc($query);

    if(!$result){
        $insert = "Insert into utilizatori_carti values('".$_POST["dislike"]."','".$_SESSION["id_utilizator"]."',false)";

        require_once "../../db/dbconnection.php";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$insert)){
            header("location: ../carte_online.php?error=problema");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../carte_online.php?carte=".$_POST["dislike"]);
    }
    else if($result["review"] == true){
        $update = "update utilizatori_carti set review=false where id_utilizator=".$_SESSION["id_utilizator"]." and id_carte=".$_POST["dislike"].";";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$update)){
            header("location: ../carte_online.php?error=problema");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../carte_online.php?carte=".$_POST["dislike"]);
    }
}

if(isset($_POST["unlike"])){
    $delete="delete from utilizatori_carti where id_utilizator=".$_SESSION["id_utilizator"]." and id_carte=".$_POST["unlike"].";";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$delete)){
        header("location: ../carte_online.php?error=problema");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../carte_online.php?carte=".$_POST["unlike"]);
}

if(isset($_POST["undislike"])){
    $delete="delete from utilizatori_carti where id_utilizator=".$_SESSION["id_utilizator"]." and id_carte=".$_POST["undislike"].";";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$delete)){
        header("location: ../carte_online.php?error=problema");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../carte_online.php?carte=".$_POST["undislike"]);
}


?>