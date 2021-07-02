<?php 
      include('inc/controllers/admin.php');
      include('inc/config/database.php');
      if($adminid!=NULL)
      {
        echo"<script> window.setTimeout(function() { window.location.href = './dashboard.php'; }, 0);</script>";
      }
      ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Login - Brand</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap/css/bootstrap.min.css?h=2d7823df40dbe5df6da6a38e0e85b599"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
    />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-6 d-none d-lg-flex">
                  <div
                    class="flex-grow-1 bg-login-image"
                    style="
                      background-image: url('assets/img/dogs/image3.jpeg?h=cbc3a40dae521ddee89bf6b026abde71');
                    "
                  ></div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                      <?php
                        if (!empty($_POST))
                        {
                          $email = mysqli_real_escape_string($conn, $_POST['email']);
                          $password = mysqli_real_escape_string($conn, $_POST['password']);
                          $rem = mysqli_real_escape_string($conn, $_POST['rem']);
                          $loginnow =  AdminLogin($conn,$email,$password,$rem);
                          if($loginnow=='success')
                          {
                            echo'<div class="alert alert-success" role="alert"><strong>Connexion réussie ! </strong> Veuillez patienter</div>';
                            echo"<script> window.setTimeout(function() { window.location.href = 'dashboard.php'; }, 150);</script>";
                          } elseif($loginnow=='error')
                          {
                            echo'<div class="alert alert-warning" role="alert"><strong>Attention ! </strong> Adresse e-mail ou mot de passe incorrect </div>';
                          } else {
                            echo"<div class='alert alert-warning' role='alert'><strong>Contactez l'administration ! </strong> Votre compte n'est pas activé </div>";
                          }
                        }
                      ?>
                    <div class="text-center">
                      <h4 class="text-dark mb-4">Welcome Back!</h4>
                    </div>
                    <form class="user" role="form" action="" method="post">
                      <div class="form-group">
                        <input
                          class="form-control form-control-user"
                          type="email"
                          id="exampleInputEmail"
                          aria-describedby="emailHelp"
                          placeholder="Enter Email Address..."
                          name="email"
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
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js?h=b86d882c5039df370319ea6ca19e5689"></script>
  </body>
</html>
