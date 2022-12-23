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
            <div class="col col-lg col-md col-xs colnav">MyLib</div>
            <a href="lista_carti_offline.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Carti</a>
            <a href="" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Login</a>
        </div>
    </div>
    <div class="container register">
        <div class="borderinreg" >
            <div class="borderinreg">
                <div class="borderinreg">
                    <form class="inreg" method="POST" action="functions/registered.php">
                        <div class="row">
                            <div class="col date">Nume:</div><div class="col input"><input type="text" name="regnume"></div>
                        </div>
                        <div class="row">
                            <div class="col date">Prenume:</div><div class="col input"><input type="text" name="regprenume"></div>
                        </div>
                        <div class="row">
                            <div class="col date">Email:</div><div class="col input"><input type="text" name="regemail"></div>
                        </div>
                        <div class="row">
                            <div class="col date">Username:</div><div class="col input"><input type="text" name="reguser"></div>
                        </div>
                        <div class="row">
                            <div class="col date">Password:</div><div class="col input"><input type="password" name="regpass"></div>
                        </div>
                        <div class="row">
                            <div class="col date">Repeat Password:</div><div class="col input"><input type="password" name="regpassrep"></div>
                        </div>
                        <div class="row">
                            <div class="col date"></div>
                            <div class="col input"><input class="btn subreg" type="submit" name="regsubmit" value="Inregistreaza"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo '<p class="reperrortxt"> Some fields are empty</p>';
    }
    else
    if($_GET["error"]=="invalidUser"){
        echo '<p class="reperrortxt"> Invalid User</p>';
    }
    else
    if($_GET["error"]=="invalidPassword"){
        echo '<p class="reperrortxt"> Invalid Password</p>';
    }
    else
    if($_GET["error"]=="passwordMatch"){
        echo '<p class="reperrortxt"> The passwords do not match</p>';
    }
    else
    if($_GET["error"]=="stmtFailed"){
        echo '<p class="reperrortxt"> Statement failed! Server error!</p>';
    }
    else
    if($_GET["error"]=="stmtFailed1"){
        echo '<p class="reperrortxt"> Statement failed! Server error1!</p>';
    }
    else
    if($_GET["error"]=="stmtFailed2"){
        echo '<p class="reperrortxt"> Statement failed! Server error2!</p>';
    }
    else
    if($_GET["error"]=="userExists"){
        echo '<p class="reperrortxt"> This username is already used!</p>';
    }
    else
    if($_GET["error"]=="invalidName"){
        echo '<p class="reperrortxt"> Invalid nume!</p>';
    }
    else
    if($_GET["error"]=="invalidPrenume"){
        echo '<p class="reperrortxt"> Invalid prenume!</p>';
    }
    else
    if($_GET["error"]=="invalidEmail"){
        echo '<p class="reperrortxt"> Invalid email!</p>';
    }
}
?>