<?php include('inc/header.php') ;
if(isset($_POST["password"]))
{
    $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);
    $fname = mysqli_real_escape_string($conn, $_POST['nom']);
    $sname = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $daten= mysqli_real_escape_string($conn, $_POST['daten']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']); 
    $datee = mysqli_real_escape_string($conn, $_POST['datee']);
    $poste = mysqli_real_escape_string($conn, $_POST['poste']);   
    $pass = mysqli_real_escape_string($conn, $_POST['password']);      
    $createStaff = CreatePersonnel( $conn,$matricule,$fname,$sname,$email,$pass,$daten,$adresse,$datee,$poste);
}
if(isset($_POST["newpassword"]))
{
    $matricule = mysqli_real_escape_string($conn, $_POST['matricule']);
    $fname = mysqli_real_escape_string($conn, $_POST['nom']);
    $sname = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $daten= mysqli_real_escape_string($conn, $_POST['daten']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']); 
    $datee = mysqli_real_escape_string($conn, $_POST['datee']);
    $poste = mysqli_real_escape_string($conn, $_POST['poste']);   
    $newpass = mysqli_real_escape_string($conn, $_POST['newpassword']); 
    $idper = mysqli_real_escape_string($conn, $_POST['perid']);      
    $updateStaff = Changepersonnel( $conn,$idper,$matricule,$fname,$sname,$email,$newpass,$daten,$adresse,$datee,$poste);
}
$delPersonnel =htmlentities($_GET['pid']);
if($delPersonnel!=NULL){
Deletepersonnel($conn,$delPersonnel); } 
?>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Liste du personnels</h3>
            <div class="card shadow">
              <div class="card-header py-3">
                  <?php
                     if(isset($_POST["password"])) 
                     {
                      if ($_POST["password"]==NULL)
                      {
                        echo'<div class="alert alert-danger container" role="alert">
                        <strong>Il faut remplir tous les champs</strong> 
                        </div> ';
                      }
                      else
                      {
                        if($createStaff=='success')
                        {
                          echo '<div class="alert alert-success container" role="alert">
                          <strong>Un nouveau personnel est ajouté</strong> 
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
                          <strong>Un personnel est modifié</strong> 
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
                  <div class="col-md-6 text-nowrap">
                  <p class="text-primary m-0 font-weight-bold">Détails</p>
                  </div>
                  <div class="col-md-6">
                    <div
                      class="text-md-right"
                    >
                    <a href="#" data-toggle="modal" data-target="#newstaff" class="btn btn-sm btn-success">
                      <i class="fas fa-plus-square"></i> Ajouter un nouveau personnel
                    </a>
                    </div>
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
                        <th>Nom Prénom</th>
                        <th>E-mail</th>
                        <th>Date de naissance</th>
                        <th>Adresse</th>
                        <th>Date d'embauche</th>
                        <th>Poste</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $persdata= GetpersonnelList($conn); 
                        foreach($persdata as $per) {
                    
                       ?>
                        <tr>
                          <td>
                            <i class="fas fa-key"></i><?php echo $per['matricule']; ?>
                          </td>
                          <td>
                            <i class="fas fa-user-circle"></i> <?php echo $per['nom']; ?> <?php echo $per['prenom']; ?>
                          </td>
                          <td> 
                            <i class="fas fa-envelope"></i> <?php echo $per['email']; ?>
                          </td>
                          <td>
                            <i class="fas fa-birthday-cake"></i> <?php echo $per['datenaissance']; ?>
                          </td>
                          <td>
                            <i class="fas fa-map-marker-alt"></i> <?php echo $per['adresse']; ?>
                          </td>
                          <td>
                            <i class="fas fa-calendar-week"></i> <?php echo $per['dateembauche']; ?>
                          </td>
                          <td>
                            <i class="fas fa-briefcase"></i> <?php echo $per['poste']; ?>
                          </td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#staffsetting<?php echo $per['pid']; ?>">
                              <i class="fas fa-edit text-secondary"></i>
                            </a>                     
                            <a href="?pid=<?php echo $per['pid']; ?>" onclick="return confirm('Êtes-vous sûr ?');">
                              <i class="fas fa-trash-alt text-danger"></i>
                            </a>
                          </td>
                        </tr>
                        <!-- Modal -->
                       <div class="modal fade" id="staffsetting<?php echo $per['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color:#4e73df;color:#fff">
                              <h5 class="modal-title" id="exampleModalLabel" >Modifier personnel</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="modal-body">  
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input  class="form-control" name="matricule" value='<?php echo $per['matricule']; ?>' type="text" required>
                                  </div>
                                </div>                           
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
                             </form>
                          </div>
                        </div>
                       </div>
                      <?php } ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <td><strong>Matricule</strong></td>
                        <td><strong>Nom Prénom</strong></td>
                        <td><strong>E-mail</strong></td>
                        <td><strong>Date de naissance</strong></td>
                        <td><strong>Adresse</strong></td>
                        <td><strong>Date d'embauche</strong></td>
                        <td><strong>Poste</strong></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
                     <!-- Modal -->
                     <div class="modal fade" id="newstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color:#4e73df;color:#fff">
                            <h5 class="modal-title" id="exampleModalLabel" >Nouveau personnel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">  
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input  class="form-control" name="matricule" placeholder="Matricle du staff"  type="text" required>
                              </div>
                            </div>                           
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input  class="form-control" name="nom" placeholder="Nom du staff"  type="text" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input  class="form-control" name="prenom" placeholder="Prénom du staff" type="text" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input  class="form-control" name="email" placeholder="Email du staff"  type="text" required>
                              </div>
                            </div> 
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"> <strong>Date de naissance</strong> </span>
                                </div>
                                <input class="form-control" name="daten" type="date" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input  class="form-control" name="adresse" placeholder="Adresse du staff"  type="text" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><strong>Date d'embauche</strong></span>
                                </div>
                                <input class="form-control" name="datee" type="date" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <input  class="form-control" name="poste" placeholder="Poste du staff"  type="text" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input  class="form-control" name="password" placeholder="Mot de passe du staff"  type="password" required>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
<?php include('inc/footer.php'); ?>
