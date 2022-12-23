<?php 

session_start();
if(isset($_SESSION["username"])){
    $now=time();
    if($_SESSION["expire"]<$now){
        session_destroy();
        echo '<script>alert("Sesiunea a expirat!")</script>';
        header('location: ../index.php');
    }
}
else
    header('location:../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/edituri.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row navbar">
            <a href="../index-online.php" class="col col-lg col-md col-xs colnav">MyLib</a>
            <a href="lista_carti_online.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Carti</a>
            <a href="functions/logout.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Logout</a>
        </div>
    </div>
    <div class="container persdatecont">
        <div class="row persdata">
            <div class="col col-md-6 pozapers">
                <?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //se genereaza poza de profil
                    require_once "../db/dbconnection.php";
                    $query ="select poza_user,poza_user_suf from utilizatori where username='".$_SESSION["username"]."'";
                    $poza=mysqli_query($conn, $query);
                    $pozaadev= mysqli_fetch_assoc($poza);
                    echo '<img src="../images/userpic/'.$pozaadev["poza_user"].$pozaadev["poza_user_suf"].'" class="profilepic">';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                ?>
            </div>
            <div class="col col-md detalpers">
            <?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                 //se genereaza date personale
                require_once "../db/dbconnection.php";
                $query ="select username,nume,prenume,email from utilizatori where username='".$_SESSION["username"]."'";
                $date=mysqli_query($conn, $query);
                $datepers= mysqli_fetch_assoc($date);
                echo '<p class="textdtpers"> Username: '.$datepers["username"].'</p><p class="textdtpers">Nume: '.$datepers["nume"].' '.$datepers["prenume"].'</p><p class="textdtpers">Email: '.$datepers["email"].'</p>';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ?>
            </div>
        </div>
    </div>
    <div class="container cartiapreciate">
        <div class="row">
            <div class="col col-md col1">
                <p class="textlistap">Lista de carti apreciate:</p>
                <?php
                require_once "../db/dbconnection.php";
                $nr=0;
                $query1 = "select carti.id_carte,titlu,poza,poza_suf,anul_aparitiei from carti
                    inner join utilizatori_carti on utilizatori_carti.id_carte=carti.id_carte 
                    where utilizatori_carti.review=true and utilizatori_carti.id_utilizator=".$_SESSION["id_utilizator"];
                $lista=mysqli_query($conn,$query1);
                while($carte = mysqli_fetch_assoc($lista))
                {
                    echo '<a href="carte_online.php?carte='.$carte["id_carte"].'"><div class="row carte_profil">
                    <div class="col col-md date_carti_profil"><p>'.$carte["titlu"].'</p></div>
                    <div class="col col-md-3 img_carti_prof"><img src="'.$carte["poza"].$carte["poza_suf"].'" class="img_carti_profil"></div>
                    </div></a>';
                    $nr++;
                }
                if($nr==0){
                    echo '<div class="carte_profil_2"><div class="col date_carti_profil">Nu exista carti apreciate</div></div>
                    <div class="csv"><button class="btn btn-secondary" id="csv" disabled>Export CSV</button></div>';  
                }
                else
                echo '<form action="functions/exporting_like.php" method="POST" class="csv">
                    <input type="submit" name="export" class="btn btn-info" value="Export CSV">;
                </form>';
                ?>
            </div>
            <div class="col col-md col2">
                <p class="textlistap">Lista de carti neapreciate:</p>
                <?php
                require_once "../db/dbconnection.php";
                $nr=0;
                $query1 = "select carti.id_carte, titlu,poza,poza_suf,anul_aparitiei from carti
                    inner join utilizatori_carti on utilizatori_carti.id_carte=carti.id_carte 
                    where utilizatori_carti.review=false and utilizatori_carti.id_utilizator=".$_SESSION["id_utilizator"];
                $lista=mysqli_query($conn,$query1);
                while($carte = mysqli_fetch_assoc($lista))
                {
                    echo '<a href="carte_online.php?carte='.$carte["id_carte"].'"><div class="row carte_profil">
                    <div class="col col-md date_carti_profil"><p>'.$carte["titlu"].'</p></div>
                    <div class="col col-md-3 img_carti_prof"><img src="'.$carte["poza"].$carte["poza_suf"].'" class="img_carti_profil"></div>
                    </div></a>';
                    $nr++;
                }
                if($nr==0){
                    echo '<div class="carte_profil_2"><div class="col date_carti_profil"><p class="nu">Nu exista carti neapreciate</p></div></div>
                        <div class="csv"><button class="btn btn-secondary" disabled>Export CSV</button></div>'; 
                }else
                echo '
                <form action="functionS/exporting_dislike.php" method="POST" class="csv">
                    <input type="submit" name="export" class="btn btn-info" value="Export CSV">;
                </form>'
                ?>
            </div>
        </div>
    </div>
</body>
</html>