<?php include('components/header.php') ?>
        <!-- MAIN CONTENT-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="row">
              <?php
              if(isset($_POST["sujet"]))
              {
                  $idpersonnel = mysqli_real_escape_string($conn, $_POST['personnelid']);
                  $sujet = mysqli_real_escape_string($conn, $_POST['sujet']);
                  $updateStaff = Createrdv( $conn,$idpersonnel,$sujet);
              }
              ?>
                <div class="col-md-12">
                  <!-- DATA TABLE -->
                  <h3 class="title-5 m-b-35">Les rendez-vous</h3>
                  <div class="table-data__tool">
                    <div class="table-data__tool-right">
                      <a
                        href="#"
                        data-toggle="modal"
                        data-target="#newdemande"
                        class="au-btn au-btn-icon au-btn--green au-btn--small"
                      >
                        <i class="zmdi zmdi-plus"></i>Envoyer une demande de rendez-vous
                      </a>
                    </div>
                  </div>
                  <?php
                  if(isset($_POST["sujet"])) 
                  {
                   if ($_POST["sujet"]==NULL)
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
                       <strong>Une demande est envoyée</strong> 
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
                          <th>Sujet</th>
                          <th>Réponse</th>
                          <th>Date de création</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $congedata= GetrdvList($conn,$userid); 
                        foreach($congedata as $cog) {
                    
                      ?>
                        <tr class="tr-shadow">
                          <td>
                            <span class="status--process"><?php echo $cog['sujet']; ?></span>
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
                      Copyright © Gestion Personnels 2021
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
            <h5 class="modal-title" id="exampleModalLabel">Nouvelle demande de rendez-vous</h5>
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
                    <span class="input-group-text">
                       <i class="fas fa-paper-plane"></i>
                    </span>
                  </div>
                  <input
                    class="form-control"
                    name="sujet"
                    type="input"
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
            <input type="hidden" value="<?php echo $userid ?>" name="personnelid">

          </form>
        </div>
      </div>
    </div>
    <?php include('components/footer.php') ?>
