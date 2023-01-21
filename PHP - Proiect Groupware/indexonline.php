<?php 
session_start();
if(isset($_SESSION["username"])){
    $now=time();
    if($_SESSION["expire"]<$now){
        session_destroy();
        //echo '<script>alert("Sesiunea a expirat!")</script>';
        header('location: index.php?expired');
    }
}
if(isset($_GET["adaugat"]))
    echo '<script>alert("Proiectul a fost adaugat cu succes!")</script>';
if(isset($_GET["emptyInputs"]))
    echo '<script>alert("Error: Toate campurile trebuie completate!")</script>';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groupware</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/indexonline.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="incipit">
            <p class="logo">Together</p>
            <form id="project_select" method="POST" action="functions/proiect.reload.php">
                <select id="project_selector" name="project_selector">
                    <option value="">Select your project</option>
                    <?php 
                    require 'functions/proiect.select.php';
                    ?>
                    <option value="adaugaProiect"> + Adauga proiect</option>
                </select>
            </form>
        </div>
        <div class="buts">
            <a href="functions/logout.php"><button class="navbarbut" id="Logout">Logout</button></a>
        </div>
    </div>
    <?php
        if(!isset($_GET["proiect"])){
            echo '<p id="welcome">BUN VENIT!</p>
            <p id="username">'.$_SESSION["username"].'</p>
            <p id="selecteaza">Te rugam sa selectezi un proiect!</p>';
        }
        else
        {
            $proiectul=$_GET["proiect"];
            require 'functions/generare.continut.php';
        }
    ?>
    <div class="adaugaProiectForm">
        <form name="adaugaProiectForm" id="adaugaProiectForm" action="functions/proiect.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga proiectul tau!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="denumire_proiect">Nume</label>
                <input type="text" id="denumire_proiect" name="denumire_proiect"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="data_finalizare"> Data finalizare</label>
                <input type="date" id="data_finalizare" name="data_finalizare"/>
            </div>
             <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="submit" type="submit" name="submit-adauga-proiect">Adauga Proiect</button>
            </div>
        </form>    
    </div>
    <div class="adaugaLista">
        <form name="adaugaLista" id="adaugaLista" action="functions/lista.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga lista!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="denumire_lista">Denumire Lista</label>
                <input type="text" id="denumire_lista" name="denumire_lista"/>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelAddLista" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-adauga-lista">Adauga Lista</button>
            </div>
        </form>    
    </div>
    <div class="stergeLista">
        <form name="stergeLista" id="stergeLista" action="functions/lista.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Sterge lista!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="selectare_lista">Selecteaza Lista</label>
                <select id="list_selector" name="list_selector">
                    <?php 
                    require 'functions/lista.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelDelLista" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-lista">Sterge Lista</button>
            </div>
        </form>    
    </div>
    <div class="adaugaSarcina">
        <form name="adaugaSarcina" id="adaugaSarcina" action="functions/sarcina.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga Sarcina!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="denumire_sarcina">Denumire Sarcina</label>
                <input type="text" id="denumire_sarcina" name="denumire_sarcina"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_lista">Selecteaza Lista</label>
                <select id="list_selector_sarcina" name="list_selector_sarcina">
                    <?php 
                    require 'functions/lista.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelAddSarcina" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-adauga-sarcina">Adauga Sarcina</button>
            </div>
        </form>    
    </div>
    <div class="stergeSarcina">
        <form name="stergeSarcina" id="stergeSarcina" action="functions/sarcina.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Sterge sarcina!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="selectare_sarcina">Selecteaza Lista</label>
                <select id="selectare_sarcina" name="selectare_sarcina">
                    <?php 
                    require 'functions/sarcina.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelDelSarcina" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-sarcina">Sterge Sarcina</button>
            </div>
        </form>    
    </div>
    <div class="adaugaMembru">
        <form name="adaugaMembru" id="adaugaMembru" action="functions/members.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga Membru!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_user">Selecteaza Utilizatorul</label>
                <select id="selectare_user" name="selectare_user">
                    <?php 
                    require 'functions/members.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelAddMember" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-adauga-membru">Adauga Membru</button>
            </div>
        </form>    
    </div>
    <div class="stergeMembru">
        <form name="stergeMembru" id="stergeMembru" action="functions/members.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Sterge Membru!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_user">Selecteaza Utilizatorul</label>
                <select id="selectare_user" name="selectare_user">
                    <?php 
                    require 'functions/members.select2.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelDelMember" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-membru">Sterge Membru</button>
            </div>
        </form>    
    </div>
    <div class="adaugaAdminSecundar">
        <form name="adaugaAdminSecundar" id="adaugaAdminSecundar" action="functions/admin.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga Admin!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_user">Selecteaza Utilizatorul</label>
                <select id="selectare_user" name="selectare_user">
                    <?php 
                    require 'functions/members.select3.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelAddAdmin" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-adauga-admin">Adauga Admin</button>
            </div>
        </form>    
    </div>
    <div class="stergeAdminSecundar">
        <form name="stergeAdminSecundar" id="stergeAdminSecundar" action="functions/admin.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Sterge Admin!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_user">Selecteaza Utilizatorul</label>
                <select id="selectare_user" name="selectare_user">
                    <?php 
                    require 'functions/members.select4.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelDelAdmin" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-admin">Sterge Admin</button>
            </div>
        </form>    
    </div>
    <div class="stergeProiect">
        <form name="stergeProiect" id="stergeProiect" action="functions/proiect.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Esti sigur ca doresti sa stergi proiectul?</p>
            <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelDelProiect" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-proiect">Sterge Proiectul</button>
            </div>
        </form>    
    </div>
    <div class="exportRaport">
        <form name="exportRaport" id="exportRaport" action="functions/export.csv.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Esti sigur ca doresti sa exporti raportul?</p>
            <?php echo '<input type="text" style="display:none" id="proiect" name="proiectul" value="'.$proiectul.'">'?>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelExpRaport" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-export-raport">Export raport</button>
            </div>
        </form>    
    </div>
</body>
</html>