<?php include('inc/header.php') ;

?>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Liste du congés</h3>
            <div class="card shadow">
              <div class="card-header py-3">
                  <?php
                    if(isset($_POST["rep"]))
                    {
                        $reponse = mysqli_real_escape_string($conn, $_POST['rep']);
                        $congeid = mysqli_real_escape_string($conn, $_POST['conid']);       
                        $updatestatus = ChangeStatuts($conn,$congeid,$reponse);
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
                  <table class="table my-0" id="dataTables">
                    <thead>
                      <tr>
                        <th>Matricule</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Cause</th>
                        <th>Réponse</th>
                        <th>La date de creation de demande</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $congedata= GetcongeList($conn); 
                        foreach($congedata as $con) {
                    
                       ?>
                        <tr>
                          <td>
                            <i class="fas fa-key"></i><?php echo $con['matricule']; ?>
                          </td>
                          <td> 
                            <i class="fas fa-calendar-week"></i> <?php echo $con['datedeb']; ?>
                          </td>
                          <td>
                            <i class="fas fa-calendar-week"></i> <?php echo $con['datefin']; ?>
                          </td>
                          <td>
                            <i class="fas fa-clipboard-list"></i> <?php echo $con['cause']; ?>
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
                            <a href="#" data-toggle="modal" data-target="#congesetting<?php echo $con['cid']; ?>">
                              modifier
                            </a>  
                          </td>
                          <td>
                            <i class="fas fa-briefcase"></i> <?php echo $con['created']; ?>
                          </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="congesetting<?php echo $con['cid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input type="hidden" value="<?php echo $con['cid']; ?>" name="conid">
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
                  </table>
                </div>
              </div>
            </div>
          </div>


<?php include('inc/footer.php'); ?>
