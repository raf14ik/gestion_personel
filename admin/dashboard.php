<?php include('inc/header.php') ?>
          <div class="container-fluid">
            <div
              class="d-sm-flex justify-content-between align-items-center mb-4"
            >
              <h3 class="text-dark mb-0">Dashboard</h3>
             
            </div>
            <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-info py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col mr-2">
                        <div
                          class="
                            text-uppercase text-warning
                            font-weight-bold
                            text-xs
                            mb-1
                          "
                        >
                        <span>Personnel</span>
                        </div>
                        <div class="text-dark font-weight-bold h5 mb-0">
                          <?php     
                             $result=mysqli_query($conn,"SELECT * FROM `personnel`;");
                             $data=mysqli_num_rows($result);
                             echo'<span>'. $data.'</span>'; 
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-primary py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col mr-2">
                        <div
                          class="
                            text-uppercase text-primary
                            font-weight-bold
                            text-xs
                            mb-1
                          "
                        >
                          <span>Congés</span>
                        </div>
                        <div class="text-dark font-weight-bold h5 mb-0">
                          <?php     
                          $result=mysqli_query($conn,"SELECT * FROM `conge`;");
                          $data=mysqli_num_rows($result);
                          echo'<span>'. $data.'</span>'; 
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-success py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col mr-2">
                        <div
                          class="
                            text-uppercase text-success
                            font-weight-bold
                            text-xs
                            mb-1
                          "
                        >
                          <span>Fiche de paie</span>
                        </div>
                        <div class="text-dark font-weight-bold h5 mb-0">
                          <?php     
                          $result=mysqli_query($conn,"SELECT * FROM `fdp`;");
                          $data=mysqli_num_rows($result);
                          echo'<span>'. $data.'</span>'; 
                          ?>                        
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-info py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col mr-2">
                        <div
                          class="
                            text-uppercase text-info
                            font-weight-bold
                            text-xs
                            mb-1
                          "
                        >
                          <span>Autorisation de sortie</span>
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="text-dark font-weight-bold h5 mb-0 mr-3"
                            >
                             <?php     
                             $result=mysqli_query($conn,"SELECT * FROM `ds`;");
                             $data=mysqli_num_rows($result);
                             echo'<span>'. $data.'</span>'; 
                             ?>                              
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-clipboard-list fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-warning py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col mr-2">
                        <div
                          class="
                            text-uppercase text-warning
                            font-weight-bold
                            text-xs
                            mb-1
                          "
                        >
                        <span>Rendez vous</span>
                        </div>
                        <div class="text-dark font-weight-bold h5 mb-0">
                          <?php     
                             $result=mysqli_query($conn,"SELECT * FROM `rdv`;");
                             $data=mysqli_num_rows($result);
                             echo'<span>'. $data.'</span>'; 
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-danger py-2">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col mr-2">
                        <div
                          class="
                            text-uppercase text-warning
                            font-weight-bold
                            text-xs
                            mb-1
                          "
                        >
                        <span>Réclamation</span>
                        </div>
                        <div class="text-dark font-weight-bold h5 mb-0">
                          <?php     
                             $result=mysqli_query($conn,"SELECT * FROM `reclamation`;");
                             $data=mysqli_num_rows($result);
                             echo'<span>'. $data.'</span>'; 
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
<?php include('inc/footer.php') ?>