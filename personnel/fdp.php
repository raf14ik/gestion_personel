<?php include('components/header.php') ?>
        <!-- MAIN CONTENT-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="row">
              <?php
              if(isset($_POST["datefin"]))
              {
                  $idpersonnel = mysqli_real_escape_string($conn, $_POST['personnelid']);
                  $startDate = mysqli_real_escape_string($conn, $_POST['datedeb']);
                  $finishDate = mysqli_real_escape_string($conn, $_POST['datefin']);
                  $periode = $startDate . ' vers ' . $finishDate ;
                  $finishDate = mysqli_real_escape_string($conn,$periode);

                  $updateStaff = Createfdp( $conn,$idpersonnel,$periode);
              }
              ?>
                <div class="col-md-12">
                  <!-- DATA TABLE -->
                  <h3 class="title-5 m-b-35">Les fiches de paie</h3>
                  <div class="table-data__tool">
                    <div class="table-data__tool-right">
                      <a
                        href="#"
                        data-toggle="modal"
                        data-target="#newdemande"
                        class="au-btn au-btn-icon au-btn--green au-btn--small"
                      >
                        <i class="zmdi zmdi-plus"></i>Envoyer une demande
                      </a>
                    </div>
                  </div>
                  <?php
                  if(isset($_POST["datefin"])) 
                  {
                   if ($_POST["datefin"]==NULL)
                   {
                     echo'<div class="alert alert-danger container" role="alert">
                     <strong>Il faut remplir tous les champs</strong> 
                     </div> ';
                   }
                   else
                   {
                     if($updateStaff=='success')
                     {
                       echo '<div class="alert alert-success container" role="alert">
                       <strong>Une demande est envoyé</strong> 
                       avec Succès !
                       </div> ';
                     }
                     else{
                       echo'<div class="alert alert-danger container" role="alert">
                       <strong>Vérifiez la connexion</strong> 
                       </div>';
                     }
                   }
                  }
                  ?>
                  <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                      <thead>
                        <tr>
                          <th>Periode</th>
                          <th>Réponse</th>
                          <th>Date de création</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $congedata= GetfdpList($conn,$userid); 
                        foreach($congedata as $cog) {
                    
                      ?>
                        <tr class="tr-shadow">
                          <td>
                            <span class="status--process"><?php echo $cog['periode']; ?></span>
                          </td>
                          <td>
                          <?php
                          if($cog['reponse'] ==0){
                            echo'<span class="status--process">Refusé</span>';
                          } elseif($cog['reponse'] ==1){
                            echo'<span class="status--process">En cours</span>';
                           }
                          elseif($cog['reponse'] ==2){
                            echo'<span class="status--process">Accepté</span>';
                          }
                          ?>
                            
                          </td>
                          <td>
                            <span class="status--process"><?php echo $cog['created']; ?></span>
                          </td>
                        </tr>
                        <?php } ?> 

                      </tbody>
                    </table>
                  </div>
                  <!-- END DATA TABLE -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="copyright">
                    <p>
                      Copyright © 2018 Colorlib. All rights reserved. Template
                      by <a href="https://colorlib.com">Colorlib</a>.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="newdemande"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nouvelle demande</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form
            role="form"
            action=""
            method="post"
            enctype="multipart/form-data"
          >
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fas fa-calendar-alt"></i
                    ></span>
                  </div>
                  <input
                    class="form-control"
                    name="datedeb"
                    type="date"
                    required
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fas fa-calendar-alt"></i
                    ></span>
                  </div>
                  <input
                    class="form-control"
                    name="datefin"
                    type="date"
                    required
                  />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="reset"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Annuler
              </button>
              <button type="submit" name="ajouter" class="btn btn-primary">
                Envoyer
              </button>
            </div>
            <input type="hidden" value="<?php echo $userid?>" name="personnelid">

          </form>
        </div>
      </div>
    </div>
    <?php include('components/footer.php') ?>
