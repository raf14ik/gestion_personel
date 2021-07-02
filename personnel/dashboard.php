<?php include('components/header.php') ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Vos données</h2>                                
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                        <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `conge` where pid=$userid;");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Congés total</h6>
                                            </div>

                                        <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `conge` where pid=$userid and reponse='0';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Congés en cours</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `conge` where pid=$userid and reponse='1';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Congés refusés</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `conge` where pid=$userid and reponse='2';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Congés acceptés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid;");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Réclamations total</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid and reponse='0';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Réclamations en cours</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid and reponse='1';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Réclamations refusés</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid and reponse='2';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Réclamations acceptés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3" >
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid;");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>fiches de paie total</h6>
                                            </div>
                                            
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid and reponse='0';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>fiches de paie en cours</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid and reponse='1';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>fiches de paie refusés</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `reclamation` where pid=$userid and reponse='2';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>fiches de paie acceptés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `rdv` where pid=$userid;");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Rendez-vous total</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `rdv` where pid=$userid and reponse='0';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Rendez-vous en cours</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `rdv` where pid=$userid and reponse='1';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Rendez-vous refusés</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `rdv` where pid=$userid and reponse='2';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Rendez-vous acceptés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c5" style="  
                                background-image: -moz-linear-gradient(90deg, #7045b6 0%, #f2f2f2 100%);
                                background-image: -webkit-linear-gradient(90deg, #7045b6 0%, #f2f2f2 100%);
                                background-image: -ms-linear-gradient(90deg, #7045b6 0%, #f2f2f2 100%);">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `ds` where pid=$userid;");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Autorisations de sortie total</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `ds` where pid=$userid and reponse='0';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Autorisations de sortie en cours</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `ds` where pid=$userid and reponse='1';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Autorisations de sortie refusés</h6>
                                            </div>
                                            <div class="text">
                                                    <?php     
                                                    $result=mysqli_query($conn,"SELECT * FROM `ds` where pid=$userid and reponse='2';");
                                                    $data=mysqli_num_rows($result);
                                                    echo'<h2>'. $data.'</h2>'; 
                                                    ?>
                                                <h6>Autorisations de sortie acceptés</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
<?php include('components/footer.php') ?>

