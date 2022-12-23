<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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

              <h2 class="fw-bold mb-2 text-uppercase">Change Password</h2>
              <p class="text-dark-50 mb-5">Enter your credentials to change password!</p>

            <form name="change-password" id="change"password" action="functions/change-password.inc.php" method="post">
              <div class="form-outline form-white mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="current_pwd" name="current_pwd" class="form-control form-control-lg" />
                <label class="form-label" for="current_pwd">Current Password</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="new_pwd" name="new_pwd" class="form-control form-control-lg" />
                <label class="form-label" for="new_pwd">New Password</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="new_pwdrepeat" name="new_pwdrepeat" class="form-control form-control-lg" />
                <label class="form-label" for="new_pwdrepeat">Repeat New Password</label>
              </div>

              <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">ChangePassword</button>
            </form>
            </div>

            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all inputs</p>";
                    }
                    if($_GET["error"] == "wrongcredentials"){
                         echo "<p>Invalid username or password</p>";
                     }
                    if($_GET["error"] == "passwordsdontmatch"){
                         echo "<p>Passwords dont match</p>";
                    }
                    if($_GET["error"] == "stmtfailed"){
                        echo "<p>Something went wrong</p>";
                    }
                    if($_GET["error"] == "none"){
                        echo "<p>Succesfully changed password</p>";
                    }
                }

            ?>

            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-primary-50 fw-bold">Sign Up</a>
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