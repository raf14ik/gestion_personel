<?php  
  include('inc/controllers/admin.php');
  include('inc/controllers/contorllerpersonnel.php');
  include('inc/controllers/contorllerconge.php');
  include('inc/controllers/contorllerfdp.php');
  include('inc/controllers/contorllerrdv.php');
  include('inc/controllers/contorllerds.php');
  include('inc/controllers/contorllerre.php');

  include('inc/config/database.php');
  $udata = GetAdmin($conn,$adminid); 
  if($adminid==NULL)
  {
    echo"<script> window.setTimeout(function() { window.location.href = './index.php'; }, 0);</script>";
  }
  //logout
  if($_GET['logout']==1)
  {
    AdminLogout($conn);
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
    <title>Gestion - Admin</title>
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

  <body id="page-top">
    <div id="wrapper">
      <nav
        class="
          navbar navbar-dark
          align-items-start
          sidebar sidebar-dark
          accordion
          bg-gradient-primary
          p-0
        "
      >
        <div class="container-fluid d-flex flex-column p-0">
          <a
            class="
              navbar-brand
              d-flex
              justify-content-center
              align-items-center
              sidebar-brand
              m-0
            "
            href="#"
          >
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><span>Session Admin</span></div>
          </a>
          <hr class="sidebar-divider my-0" />
          <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="dashboard.php"
                ><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a
              >
            </li>

            <li class="nav-item" role="presentation">
              <a class="nav-link" href="staff.php"
                ><i class="fas fa-user"></i><span>Personnels</span></a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="conge.php"
                ><i class="fas fa-clipboard-list"></i><span>Congés</span></a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="fdp.php"
                ><i class="fas fa-clipboard-list"></i><span>Fiche de paie</span></a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="rvd.php"
                ><i class="fas fa-clipboard-list"></i><span>Rendez vous</span></a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="ds.php"
                ><i class="fas fa-clipboard-list"></i><span>Autorisations de sortie</span></a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="reclamation.php"
                ><i class="fas fa-clipboard-list"></i><span>Réclamations</span></a
              >
            </li>
          </ul>
          <div class="text-center d-none d-md-inline">
            <button
              class="btn rounded-circle border-0"
              id="sidebarToggle"
              type="button"
            ></button>
          </div>
        </div>
      </nav>
      <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
          <nav
            class="
              navbar navbar-light navbar-expand
              bg-white
              shadow
              mb-4
              topbar
              static-top
            "
          >
            <div class="container-fluid">
              <button
                class="btn btn-link d-md-none rounded-circle mr-3"
                id="sidebarToggleTop"
                type="button"
              >
                <i class="fas fa-bars"></i>
              </button>
              <form
                class="
                  form-inline
                  d-none d-sm-inline-block
                  mr-auto
                  ml-md-3
                  my-2 my-md-0
                  mw-100
                  navbar-search
                "
              >
                <div class="input-group">
                  <input
                    class="bg-light form-control border-0 small"
                    type="text"
                    placeholder="Search for ..."
                  />
                  <div class="input-group-append">
                    <button class="btn btn-primary py-0" type="button">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
              <ul class="nav navbar-nav flex-nowrap ml-auto">

                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow" role="presentation">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      data-toggle="dropdown"
                      aria-expanded="false"
                      href="#"
                      ><span class="d-none d-lg-inline mr-2 text-gray-600 small"
                        >Admin</span
                      ><img
                        class="border rounded-circle img-profile"
                        src="assets/img/avatars/avatar1.jpeg?h=0ecc82101fb9a10ca459432faa8c0656"
                    /></a>
                    <div
                      class="
                        dropdown-menu
                        shadow
                        dropdown-menu-right
                        animated--grow-in
                      "
                      role="menu"
                    >
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" role="presentation" href="?logout=1"
                        ><i
                          class="
                            fas
                            fa-sign-out-alt fa-sm fa-fw
                            mr-2
                            text-gray-400
                          "
                        ></i
                        >&nbsp;Logout</a
                      >
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>