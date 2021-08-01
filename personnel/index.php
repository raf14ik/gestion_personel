<?php 
      include('inc/user.php');
      include('inc/config.php');
      if($adminid!=NULL)
      {
        echo"<script> window.setTimeout(function() { window.location.href = './dashboard.php'; }, 0);</script>";
      }
      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="au theme template" />
    <meta name="author" content="Hau Nguyen" />
    <meta name="keywords" content="au theme template" />

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all" />
    <link
      href="vendor/font-awesome-4.7/css/font-awesome.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="vendor/font-awesome-5/css/fontawesome-all.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="vendor/mdi-font/css/material-design-iconic-font.min.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Bootstrap CSS-->
    <link
      href="vendor/bootstrap-4.1/bootstrap.min.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Vendor CSS-->
    <link
      href="vendor/animsition/animsition.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
      rel="stylesheet"
      media="all"
    />
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all" />
    <link
      href="vendor/css-hamburgers/hamburgers.min.css"
      rel="stylesheet"
      media="all"
    />
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all" />
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link
      href="vendor/perfect-scrollbar/perfect-scrollbar.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all" />
  </head>

  <body class="animsition">
    <div class="page-wrapper">
      <div class="page-content--bge5">
        <div class="container">
          <div class="login-wrap">
            <div class="login-content">
            <?php
                        if (!empty($_POST))
                        {
                          $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);
                          $password = mysqli_real_escape_string($conn, $_POST['password']);
                          $rem = mysqli_real_escape_string($conn, $_POST['rem']);
                          $loginnow =   personnelLogin($conn,$matricule,$password,$rem);
                          if($loginnow=='success')
                          {
                            echo'<div class="alert alert-success" role="alert"><strong>Connexion réussie ! </strong> Veuillez patienter</div>';
                            echo"<script> window.setTimeout(function() { window.location.href = 'dashboard.php'; }, 150);</script>";
                          } elseif($loginnow=='error')
                          {
                            echo'<div class="alert alert-warning" role="alert"><strong>Attention ! </strong> Matricule ou mot de passe incorrect </div>';
                          } else {
                            echo"<div class='alert alert-warning' role='alert'><strong>Contactez l'administration ! </strong> Votre compte n'est pas activé </div>";
                          }
                        }
                      ?>
              <div class="login-logo">
                <a href="#">
                  <img src="images/icon/logo1.png" alt="CoolAdmin" />
                </a>
              </div>
              <div class="login-form">
              <form class="user" role="form" action="" method="post">
                      <div class="form-group">
                        <input
                          class="form-control form-control-user"
                          type="number"
                          placeholder="Matricule"
                          name="matricule"
                          required="required"
                        />
                      </div>
                      <div class="form-group">
                        
                        <input
                          class="form-control form-control-user"
                          type="password"
                          id="exampleInputPassword"
                          placeholder="Password"
                          name="password"
                          required="required"
                        />
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <div class="form-check">
                            <input
                              class="form-check-input custom-control-input"
                              name="rem"
                              type="checkbox"
                              id="formCheck-1"
                            /><label
                              class="form-check-label custom-control-label"
                              for="formCheck-1"
                              >Remember Me</label
                            >
                          </div>
                        </div>
                      </div>
                      <button
                        class="btn btn-primary btn-block text-white btn-user"
                        type="submit"
                      >
                        Login
                      </button>
                      <hr />
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
  </body>
</html>
<!-- end document-->
