<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carti</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/edituri.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //salvam filtrele si sortarile
    $_SESSION['sendvalue']="value=";
    $_SESSION['sendsort']="sort=0";
    if(isset($_GET["value"]))
        $_SESSION['sendvalue']=$_SESSION['sendvalue'].$_GET["value"];
    if(isset($_GET["sort"]))
        $_SESSION['sendsort']=substr($_SESSION['sendsort'],0,-1).$_GET["sort"];
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ?>
    <div class="container-fluid">
        <div class="row navbar">
            <a href="../index.php" class="col col-lg col-md col-xs colnav link-secondary">MyLib</a>
            <a href="login.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Login</a>
            <a href="register.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Register</a>
        </div>
    </div>
    <div class="container cont">
        <div class="container cont1">
            <div class="row filtre">
                <div class="col col-xl col-md col-xs filtre">
                    <form method="POST" action="functions/filter-genuri-offline.php">
                    <p>Genuri</p>
                    <?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //realizam filtru autori
                    //realizam conexiunea
                    require '../db/dbconnection.php';
                    $query = 'select id_gen,denumire_gen from genuri';
                    $lista_genuri = mysqli_query($conn, $query);

                    //scriem elementele filtrului
                    while($gen = mysqli_fetch_assoc($lista_genuri))
                    {
                        //verificam daca exista elemente selectate deja si le bifam adevarate daca nu le scriem simplu
                        if(!isset($_GET["value"]))
                            echo '<input class="gen" type="checkbox" onchange="this.form.submit()" name="'.$gen["id_gen"].'"value="'.$gen["denumire_gen"].'"><label for="'.$gen["denumire_gen"].'">'.$gen["denumire_gen"].'</label><br>';
                        else{
                        if(str_contains($_GET["value"],$gen["id_gen"]))
                            echo '<input class="gen" type="checkbox" onchange="this.form.submit()" checked="true" name="'.$gen["id_gen"].'"value="'.$gen["denumire_gen"].'"><label for="'.$gen["denumire_gen"].'">'.$gen["denumire_gen"].'</label><br>';
                            else
                                echo '<input class="gen" type="checkbox" onchange="this.form.submit()" name="'.$gen["id_gen"].'"value="'.$gen["denumire_gen"].'"><label for="'.$gen["denumire_gen"].'">'.$gen["denumire_gen"].'</label><br>';
                        }
                    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="container cont2">
            <div class="row align-items-center">
            <div class="col sortare">
                <form method="POST" action="functions/sortare-offline.php" class="formsort">
                    <p class="text-dark"> Ordoneaza:
                    <select name="sortare" onchange="this.form.submit()">
                        <?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //realizam sortarea
                        //verificam daca exista deja o sortare existenta, daca nu punem o stare initiala
                        if(!isset($_GET["sort"])||$_GET["sort"]==0)
                        {
                            echo '<option class="btn btn-secondary dropdown-toggle" disabled selected value> -- select an option -- </option>';
                            echo '<option value="1">Dupa anul aparitiei-crescator</option>';
                            echo '<option value="2">Dupa anul aparitiei-descrescator</option>';
                            echo '<option value="3">Alfabetic-crescator</option>';
                            echo '<option value="4">Alfabetic-descrescator</option>';
                        }
                        //daca exista o sortare vor aparea ca selectate in bara de select
                        else
                        {
                            if($_GET["sort"]==1)
                            {
                                echo '<option value="1" selected value>Dupa anul aparitiei-crescator</option>';
                                echo '<option value="2">Dupa anul aparitiei-descrescator</option>';
                                echo '<option value="3">Alfabetic-crescator</option>';
                                echo '<option value="4">Alfabetic-descrescator</option>';
                            }
                            else
                            if($_GET["sort"]==2){
                                echo '<option value="1">Dupa anul aparitiei-crescator</option>';
                                echo '<option value="2" selected value>Dupa anul aparitiei-descrescator</option>';
                                echo '<option value="3">Alfabetic-crescator</option>';
                                echo '<option value="4">Alfabetic-descrescator</option>';
                            }
                            else
                            if($_GET["sort"]==3){
                                echo '<option value="1">Dupa anul aparitiei-crescator</option>';
                                echo '<option value="2">Dupa anul aparitiei-descrescator</option>';
                                echo '<option value="3" selected value>Alfabetic-crescator</option>';
                                echo '<option value="4">Alfabetic-descrescator</option>';
                            }
                            else
                            if($_GET["sort"]==4){
                                echo '<option value="1">Dupa anul aparitiei-crescator</option>';
                                echo '<option value="2">Dupa anul aparitiei-descrescator</option>';
                                echo '<option value="3">Alfabetic-crescator</option>';
                                echo '<option value="4" selected value>Alfabetic-descrescator</option>';
                            }
                        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                        
                        ?>
                    </select>
                    </p>
                </form>
            </div>
                <div class="col">
                    <form name="search" action="functions/select.php" method="GET">
                        <select class="js-example-basic-single" name="state" onchange="this.form.submit()">
                            <option> --books-- </option>
                    <?php
                        require '../db/dbconnection.php';

                        $query = 'select * from carti';

                        $result = mysqli_query($conn, $query);

                        while($carte = mysqli_fetch_assoc($result))
                        {
                            echo '<option value="'.$carte["id_carte"].'"> '.$carte["titlu"].' </option>';
                        }

                    ?>
                        </select>
                    </form>
                </div>

                <div class="col">
                    <form action="functions/search.php" method="GET">
                        <div class="input-group">
                            <input id="search" name="search" type="text" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <button id="submit" type="submit" class="btn btn-outline-primary">Search</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="lista_carti">
                <?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //generam lista de carti
                //realizam conexiunea si declaram variabilele
                require '../db/dbconnection.php';
                $query1 = "select carti.id_carte,titlu,poza,poza_suf,anul_aparitiei from carti ";
                $innerjoin="";
                $wher="";
                if(!isset($_GET["carti"])){
                //daca a fost aplicat un filtru generam stringurile $innerjoin si $wher
                if(isset($_GET["value"]))
                {
                    if($_GET["value"] === '')
                    {
                        
                    }
                    else{
                    //scriem starea initiala a $innerjoin si $wher
                    $listavalue1 = explode("_",$_GET["value"]);
                    $wher="where cg1.id_gen=";
                    $innerjoin="inner join carti_genuri cg1 on cg1.id_carte=carti.id_carte ";

                    for($i=0;$i<sizeof($listavalue1);$i++)
                    {
                        //se genereaza stringurile prin concatenare
                        $wher=$wher.$listavalue1[$i]." and cg".($i+2).".id_gen=";
                        $innerjoin=$innerjoin."inner join carti_genuri cg".($i+2)." on cg".($i+2).".id_carte=carti.id_carte ";
                    }

                    //se ajusteaza $wher si $innerjoin
                    $wher=substr($wher,0,-31);
                    $innerjoin=substr($innerjoin,0,-118);
                }
                }

                //setam order by in functie de sortarea selectata
                $orderby="";
                if(isset($_GET["sort"])){
                    if($_GET["sort"]==1)
                        $orderby= " order by 5";
                    else
                    if($_GET["sort"]==2)
                        $orderby=" order by 5 desc";
                    else
                    if($_GET["sort"]==3)
                        $orderby=" order by 2";
                    else
                    if($_GET["sort"]==4)
                        $orderby=" order by 2 desc";
                }


                //concatenam la $query1 stringurile $innerjoin si $wher;
                $query1=$query1.$innerjoin.$wher.$orderby;

                //scriem lista de carti
                $lista = mysqli_query($conn,$query1);
                $nr_carti=0;
                $ok=false;
                echo '<div class="row">';
                while($carte = mysqli_fetch_assoc($lista))
                {
                    $ok=true;
                    $nr_carti++;
                    echo '<a href="carte_offline.php?carte='.$carte["id_carte"].' " class= "btn col col-md carte"><img src='.$carte["poza"].$carte["poza_suf"].' class="img_carte"><p>'.$carte["titlu"].'</p></a>';
                    if($nr_carti==3){
                        echo '</div><div class="row">';
                        $nr_carti=0;
                    }
                }
                
                //daca nu exista elemente in urma aplicarii filtrelor scriem o coloana goala
                if($ok==false)
                    echo'<div class="col col-md emptycol"></div>';
                echo '</div>';
                }
                else{

                require '../db/dbconnection.php';
                $query1 = "select carti.id_carte,titlu,poza,poza_suf,anul_aparitiei from carti ";
                $innerjoin="";
                $wher="";
             
                //daca a fost aplicat un filtru generam stringurile $innerjoin si $wher
                if(isset($_GET["carti"]))
                {
                    if($_GET["carti"] === '')
                    {
                        
                    }
                    else{
                    //scriem starea initiala a $innerjoin si $wher
                    $listavalue1 = explode("_",$_GET["carti"]);

                    $wher = "WHERE titlu = ";

                    for($i = 0; $i < sizeof($listavalue1); $i++)
                    {
                        $wher = $wher."'".$listavalue1[$i]."' or titlu = ";
                    }

                    //se ajusteaza $wher si $innerjoin
                    $wher=substr($wher,0,-12);
                }
                }

                //setam order by in functie de sortarea selectata
                $orderby="";
                if(isset($_GET["sort"])){
                    if($_GET["sort"]==1)
                        $orderby= " order by 5";
                    else
                    if($_GET["sort"]==2)
                        $orderby=" order by 5 desc";
                    else
                    if($_GET["sort"]==3)
                        $orderby=" order by 2";
                    else
                    if($_GET["sort"]==4)
                        $orderby=" order by 2 desc";
                }


                //concatenam la $query1 stringurile $innerjoin si $wher;
                $query1=$query1.$innerjoin.$wher.$orderby;

                //scriem lista de carti
                $lista = mysqli_query($conn,$query1);
                $nr_carti=0;
                $ok=false;
                echo '<div class="row">';
                while($carte = mysqli_fetch_assoc($lista))
                {
                    $ok=true;
                    $nr_carti++;
                    echo '<a href="carte_offline.php?carte='.$carte["id_carte"].' " class= "btn col col-md carte"><img src='.$carte["poza"].$carte["poza_suf"].' class="img_carte"><p>'.$carte["titlu"].'</p></a>';
                    if($nr_carti==3){
                        echo '</div><div class="row">';
                        $nr_carti=0;
                    }
                }
                
                //daca nu exista elemente in urma aplicarii filtrelor scriem o coloana goala
                if($ok==false)
                    echo'<div class="col col-md emptycol"></div>';
                echo '</div>';
            }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
                ?>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>