<?php include('inc/header.php') ;

?>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Liste du Rendez-vous</h3>
            <div class="card shadow">
              <div class="card-header py-3">
                  <?php
                    if(isset($_POST["rep"]))
                    {
                        $reponse = mysqli_real_escape_string($conn, $_POST['rep']);
                        $rvid = mysqli_real_escape_string($conn, $_POST['rdvid']);       
                        $updatestatus = ChangeSt($conn,$rvid,$reponse);
                        $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);       
                            if($updatestatus='success' )
                            {
                                echo '<div class="alert alert-success container" role="alert">
                                Le réponse de matricule <strong style="color:black;"> '.$matricule.'</strong> est modifié 
                                avec Succès !
                                </div> ';
                            }
                    }
                  ?>
                <div class="row">
                  <div class="col-md-6 text-nowrap">
                  <p class="text-primary m-0 font-weight-bold">Détails</p>
                  </div>
                  <div class="col-md-6">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div
                  class="table-responsive table mt-2"
                  id="dataTable"
                  role="grid"
                  aria-describedby="dataTable_info">
                  <table class="table my-0" id="dataTable"
                  style="-moz-user-select: none; 
                  -webkit-user-select: none; 
                  -ms-user-select:none; 
                  user-select:none;
                  -o-user-select:none;" 
                  unselectable="on"
                  onselectstart="return false;" 
                  onmousedown="return false;">
                    <thead>
                      <tr>
                        <th>Matricule</th>
                        <th>Sujet</th>
                        <th>Réponse</th>
                        <th>La date de creation de demande</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $rdvdata= GetrdvList($conn); 
                        foreach($rdvdata as $con) {
                    
                       ?>
                        <tr>
                          <td>
                            <i class="fas fa-key"></i><?php echo $con['matricule']; ?>
                          </td>
                          <td>
                            <i class="fas fa-clipboard-list"></i> <?php echo $con['sujet']; ?>
                          </td>
                          <td>
                            <?php 
                           if($con['reponse']==1)
                           {
                               echo 'en cours';
                           } else if ($con['reponse']==0)
                           {
                             echo 'Refusé';
                           }
                           else {
                               echo 'Accepter';
                           }
                            ?> 
                            <a href="#" data-toggle="modal" data-target="#rdvsetting<?php echo $con['rdvid']; ?>">
                              <i class="fas fa-edit text-danger"></i>
                            </a>  
                          </td>
                          <td>
                            <i class="fas fa-briefcase"></i> <?php echo $con['created']; ?>
                          </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="rdvsetting<?php echo $con['rdvid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color:#4e73df;color:#fff">
                              <h5 class="modal-title" id="exampleModalLabel" >Changer la réponse</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="modal-body">  
                              <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-lock-circle-open">Changer la réponse de matricule  <?php echo $con['matricule']?> :</i></span>
                                    </div>
                                      <div class="modal-body">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" name="rep" type="radio" id="flexRadioDefault1" value="2" <?php if($con['reponse']==2){echo 'checked';}?>
                                          <label class="form-check-label" for="flexRadioDefault1">Accepter</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" name="rep" type="radio" id="flexRadioDefault2" value="0" <?php if($con['reponse']==0){echo 'checked';}?>
                                          <label class="form-check-label" for="flexRadioDefault2">Refuser</label>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" value="<?php echo $con['rdvid']; ?>" name="rdvid">
                              <input type="hidden" value="<?php echo $con['matricule']; ?>" name="matricule">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" name="ajouter" class="btn btn-primary">Modifier</button>
                                </div>
                             </form>
                          </div>
                        </div>
                       </div>
                      <?php } ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td><strong>Matricule</strong></td>
                        <td><strong>Sujet</strong></td>
                        <td><strong>Réponse</strong></td>
                        <td><strong>La date de creation de demande</strong></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>

<?php include('inc/footer.php'); ?>
