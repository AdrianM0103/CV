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
    <title>PHP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/edituri.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row navbar">
            <a href="../index-online.php" class="col col-lg col-md col-xs colnav">MyLib</a>
            <a href="pages/lista_carti_online.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Carti</a>
            <a href="pages/profil.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Profil</a>
            <a href="pages/functions/logout.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Logout</a>
        </div>
    </div>
    <div class="salut">
        <p class="h1 text-center bunvenit"> Bun venit!</p>
        <p class="h5 text-center aux"><?php echo $_SESSION["username"]?></p>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>