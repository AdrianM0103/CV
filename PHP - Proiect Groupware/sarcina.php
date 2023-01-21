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
    <script src="/js/sarcini.js"></script>
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
        require 'functions/generare.sarcina.php';
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
    <div class="adaugaObiectiv">
        <form name="adaugaObiectiv" id="adaugaObiectiv" action="functions/obiectiv.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga obiectiv!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="denumire_obiectiv">Denumire</label>
                <input type="text" id="denumire_obiectiv" name="denumire_obiectiv"/>
            </div>
            <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelAddObiectiv" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-adauga-obiectiv">Adauga obiectiv</button>
            </div>
        </form>    
    </div>
    <div class="schimbaDenumire">
        <form name="schimbaDenumire" id="schimbaDenumire" action="functions/sarcina.denumire.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Schimba denumirea!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="denumire_sarcina">Denumire</label>
                <input type="text" id="denumire_sarcina" name="denumire_sarcina"/>
            </div>
            <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelChgDenumire" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-schimba-denumire">Schimba denumire</button>
            </div>
        </form>    
    </div>
    <div class="schimbaDescriere">
        <form name="schimbaDescriere" id="schimbaDescriere" action="functions/sarcina.descriere.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Schimba descrierea!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="denumire_descriere">Denumire</label>
                <input type="text" id="denumire_descriere" name="denumire_descriere" maxlength="250"/>
            </div>
            <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelChgDescriere" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-schimba-descriere">Schimba descriere</button>
            </div>
        </form>    
    </div>
    <div class="stergeObiectiv">
        <form name="stergeObiectiv" id="stergeObiectiv" action="functions/obiectiv.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Sterge obiectivul!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="selectare_obiectiv">Selecteaza Obiectivul</label>
                <select id="selectare_obiectiv" name="selectare_obiectiv">
                    <?php 
                    require 'functions/obiectiv.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelDelObiectiv" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-obiectiv">Sterge Obiectivul</button>
            </div>
        </form>    
    </div>
    <div class="schimbaLista">
        <form name="schimbaLista" id="schimbaLista" action="functions/sarcina.schimba.lista.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Schimba lista!</p>
            < <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="selectare_lista">Selecteaza lista noua</label>
                <select id="selectare_lista" name="selectare_lista">
                    <?php 
                    require 'functions/lista.select2.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="cancelChgList" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-schimba-lista">Schimba lista</button>
            </div>
        </form>    
    </div>
    <div class="adaugaMembru">
        <form name="adaugaMembru" id="adaugaMembru" action="functions/members.sarcina1.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Adauga Membru!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_user">Selecteaza Utilizatorul</label>
                <select id="selectare_user" name="selectare_user">
                    <?php 
                    require 'functions/members.sarcina1.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelAddMember" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-adauga-membru-sarcina">Adauga Membru</button>
            </div>
        </form>    
    </div>
    <div class="stergeMembru">
        <form name="stergeMembru" id="stergeMembru" action="functions/members.sarcina2.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Sterge Membru!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="selectare_user">Selecteaza Utilizatorul</label>
                <select id="selectare_user" name="selectare_user">
                    <?php 
                    require 'functions/members.sarcina2.select.php';
                    ?>
                </select>
                <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelDelMember" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-membru-sarcina">Sterge Membru</button>
            </div>
        </form>    
    </div>
    <div class="stergeSarcina">
        <form name="stergeSarcina" id="stergeSarcina" action="functions/sarcina2.del.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Esti sigur ca doresti sa stergi sarcina?</p>
            <?php echo '<input type="text" style="display:none" id="sarcina" name="sarcina" value="'.$_GET["sarcina"].'">'?>
            <div style="display:flex; flex-direction:row; justify-content:space-around; top:30px; position:relative;">
                <button class="cancelDelSarcina" type="button" >Cancel</button>
                <button class="submit" type="submit" name="submit-sterge-sarcina">Sterge sarcina</button>
            </div>
        </form>    
    </div>
    <div class="listComentarii">
        <button class="close-comments">X</button>
        <div class="comentariile">
        <?php
        require 'functions/comentariu.generate.php';
        ?>
        </div>
    </div>
</body>
</html>