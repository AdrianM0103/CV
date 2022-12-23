<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/edituri.css">

</head>
<body>
    <div class="container-fluid">
        <div class="row navbar">
            <a href="../index.php" class="col col-lg col-md col-xs colnav link-secondary">MyLib</a>
            <a href="lista_carti_offline.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Carti</a>
            <a href="login.php" class="btn col-lg-1 col-md-1 col-xs-1 colnav navbut">Login</a>
        </div>
    </div>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-centert align-items-center h-100 row-hidden">
      <div class="col-12 col-md-8 col-lg-6 col-xl-12">
        <div class="card bg-warning text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            
          <?php
            if(isset($_GET["carte"])){
              $id_carte = $_GET["carte"];

              $query = "SELECT * FROM carti WHERE id_carte = '".$id_carte."';";

              require_once "../db/dbconnection.php";

              $result = mysqli_query($conn, $query);

              $date_carte = mysqli_fetch_assoc($result);

              $query2 = "SELECT nume_autor FROM autori a INNER JOIN carti_autori ca ON a.id_autor = ca.id_autor AND ca.id_carte = '".$id_carte."';";

              $result = mysqli_query($conn, $query2);

              $nume_autor = mysqli_fetch_assoc($result);

              echo '<div class="row align-items-center">
              <div class="col d-flex justify-content-start">
                <img src="'.$date_carte["poza"].$date_carte["poza_suf"].'" alt="'.$date_carte["titlu"].'" style="width: 400px; height: 600px">
              </div>
              <div class="col">
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase"> '.$date_carte["titlu"].' </h2>
                  <h4> Autor: '.$nume_autor["nume_autor"].' </h4>
                </div>
  
                <h3 style="align-content: start"> Descriere </h3>
                <p>'.$date_carte["rezumat"].'</p>
                <div></div>
                <p class="fw-bold"> Numar de pagini: '.$date_carte["nr_pagini"].' </p>

                  <a href="login.php" class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit" value="1">Like</a>
                  <a href="login.php" class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit" value="2">Dislike</a>
                
              </div>
            </div>';
          }
          ?>      

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>