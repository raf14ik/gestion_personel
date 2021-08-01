<?php include('components/header.php') ;
if(isset($_POST["newpassword"]))
{
    $fname = mysqli_real_escape_string($conn, $_POST['nom']);
    $sname = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $daten= mysqli_real_escape_string($conn, $_POST['daten']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']); 
    $datee = mysqli_real_escape_string($conn, $_POST['datee']);
    $poste = mysqli_real_escape_string($conn, $_POST['poste']);   
    $newpass = mysqli_real_escape_string($conn, $_POST['newpassword']); 
    $idper = mysqli_real_escape_string($conn, $userid);      
    $updateStaff = Changepersonnel( $conn,$idper,$fname,$sname,$email,$newpass,$daten,$adresse,$datee,$poste);
}
?>
        <!-- MAIN CONTENT-->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <!-- DATA TABLE -->
                  <h3 class="title-5 m-b-35">Mon compte</h3>
                  <div class="table-data__tool">

                  </div>

                  <!-- END SETTINGS ACCOUNT -->
                </div>
              </div>
                               <?php
                                   if(isset($_POST["newpassword"])) 
                                   {
                                    if ($_POST["newpassword"]==NULL)
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
                                        <strong>vos informations sont modifiés</strong> 
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
              
              <div class="row">
                <div class="col-md-12">
                <?php $persdata= GetperList($conn,$userid); 
                        foreach($persdata as $per) {
                       ?>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="modal-body">                          
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input  class="form-control" name="nom" value='<?php echo $per['nom']; ?>'  type="text" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input  class="form-control" name="prenom" value='<?php echo $per['prenom']; ?>' type="text" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input  class="form-control" name="email" value='<?php echo $per['email']; ?>' type="text" required>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"> <strong>Date de naissance</strong> </span>
                                    </div>
                                    <input class="form-control" name="daten" type="date" value='<?php echo $per['datenaissance']; ?>' required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input  class="form-control" name="adresse" value='<?php echo $per['adresse']; ?>'  type="text" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><strong>Date d'embauche</strong></span>
                                    </div>
                                    <input class="form-control" name="datee" type="date" value='<?php echo $per['dateembauche']; ?>' required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <input  class="form-control" name="poste" value='<?php echo $per['poste']; ?>' type="text" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input  class="form-control" name="newpassword" placeholder="Saisir un nouveau mot de passe de personnel"  type="password" required>
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" value="<?php echo $per['pid']; ?>" name="perid">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" name="ajouter" class="btn btn-primary">Modifier</button>
                                </div>
                          <input type="hidden" value="<?php echo $userid ?>" name="personnelid">
                        </form>
                    <?php } ?> 

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
              <div class="form-group">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"
                      ><i class="fas fa-comment-alt"></i
                    ></span>
                  </div>
                  <textarea
                    class="form-control"
                    name="cause"
                    placeholder="cause de demande"
                    type="text"
                    required
                  ></textarea>
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