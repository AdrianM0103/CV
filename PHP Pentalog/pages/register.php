<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <div class="row d-flex justify-content-center align-items-center h-100 row-hidden">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-warning text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-dark-50 mb-5">Enter your credentials to change create a new account!</p>
            <form name="register" id="register" action="functions/registered.php" method="POST">
            
              <div class="form-outline form-white mb-4">
                <input type="text" id="regnume" name="regnume" class="form-control form-control-lg"/>
                <label class="form-label" for="regnume">Nume</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" id="regprenume" name="regprenume" class="form-control form-control-lg" />
                <label class="form-label" for="regprenume">Prenume</label>
              </div>

              <div class="form-outline form-white mb-4">  
                <input type="email" id="regemail" name="regemail" class="form-control form-control-lg" />
                <label class="form-label" for="regemail">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" id="reguser" name="reguser" class="form-control form-control-lg" />
                <label class="form-label" for="reguser">Username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="regpass" name="regpass" class="form-control form-control-lg" />
                <label class="form-label" for="regpass">Password</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="regpassrep" name="regpassrep" class="form-control form-control-lg" />
                <label class="form-label" for="regpassrep">Repeat Password</label>
              </div>

              <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="regsubmit">Register</button>
              

            </form>
            </div>

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
                if($_GET["error"]=="emailExists"){
                    echo '<p class="reperrortxt"> This email is already used!</p>';
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

            <div>
              <p class="mb-0">Already have an account?? <a href="login.php" class="text-primary-50 fw-bold">Log In</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>