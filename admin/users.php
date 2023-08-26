<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Utilisateurs</title>

        <!-- Common Plugins -->
       <?php include '../partials/_linko.php'; ?>
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
          .mage{
            width: 100px;
          }
        </style>
    </head>
    <body>

      <!-- ============================================================== -->
      <!--            Topbar Start              -->
      <!-- ============================================================== -->
      <div class="top-bar primary-top-bar">
      <?php include 'part/_side.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!--                        Topbar End                              -->
    <!-- ============================================================== -->
  
    <?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $ref_utilisateur = htmlspecialchars($_POST['ref_utilisateur']);
    $email = htmlspecialchars($_POST['email']);
            $check_query = " SELECT * FROM authentification 
            WHERE ref_utilisateur=:ref_utilisateur AND email=:email
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':ref_utilisateur'   =>  $ref_utilisateur,
             ':email'   =>  $email           
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "";             }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
 

  $req=$db->prepare("INSERT INTO authentification (username,email,password,ref_utilisateur) VALUES (:username,:email,:password,:ref_utilisateur)");

  $res=$req->execute(array(
    'username' => htmlspecialchars(trim($username)),
    'email' => htmlspecialchars($_POST['email']),
    'password' => sha1($password),
    'ref_utilisateur' => htmlspecialchars($_POST['ref_utilisateur'])
    
  ));
  if ($res) {
     echo "
     <script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Utilisateur inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>
     ";
  }else{
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'cas non publier!',
                         footer: ''
                          })
                  </script>";
  }
  }
  }
  }
}



 ?>
 <?php
 if(isset($_POST['del'])){
     extract($_POST);

     $delete=$db->prepare("DELETE FROM authentification WHERE id_authentification=:id_authentification");

     $red=$delete->execute(array(
         'id_authentification' => $id_authentification
     ));
     if($red){
         echo" <script>
         Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Utilisateur supprimer avec success',
             showConfirmButton: false,
              timer: 1500
            })

     </script> ";
     }else{
         echo'';
     }
 }
 
 ?>
    
    <!-- ============================================================== -->
    <!--                        Right Side Start                        -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!--                        Right Side End                          -->
    <!-- ============================================================== -->


        <!-- ============================================================== -->
    <!--            Navigation Start            -->
    <!-- ============================================================== -->
        <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
    <!--            Navigation End              -->
    <!-- ============================================================== -->


        <!-- ============================================================== -->
    <!--            Content Start             -->
    <!-- ============================================================== -->
    
        <div class="row page-header">
      <div class="col-lg-6 align-self-center ">
          <h2>Les utilisateurs</h2>
        
      </div>
    </div>

        <section class="main-content">
       

      
          <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des utilisateurs
                          <div class="col" align="right">
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM COMPLET</th>
                                                    <th>NOM D'UTILISATEUR</th>
                                                    <th>EMAIL DE CONNEXION</th>
                                                    <th>MOT DE PASSE</th>
                                                    
                                                   
                                                    
                                                    <th>DATE DE CREATION</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
<?php $rec=$db->query("SELECT * FROM authentification INNER JOIN tbl_agent ON authentification.ref_utilisateur=tbl_agent.id_utilisateur"); ?>

                                            <tbody>
                                               <?php while ($us= $rec->fetch()) { ?>
                                                <div class="modal fade bs-example-modal-lg<?= $us['id_authentification']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Modifier l'utilisateur <?= $us['nom_complet']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="upusers.php" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="hidden" name="id_authentification" value="<?= $us['id_authentification']; ?>">
                              <input class="form-control" type="text" value="<?= $us['nom_complet']; ?>" required="">
                              </div>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="email" value="<?= $us['email']; ?>" required="">
                              </div>
                              

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" style="" type="text" value="<?= $us['username']; ?>" name="username" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="text" value="<?= $us['password']; ?>" name="password" required="">
                              </div>
                             

                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div class="modal fade bs-example<?= $us['id_authentification']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Suppression de <?= $us['nom_complet']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <h3>ETES VOUS SUR DE VOULOIR SUPPRIMER <?= $us['nom_complet']; ?></h3>
                              <div class="col-md-6">
                              <input class="form-control" type="hidden" name="id_authentification" value="<?= $us['id_authentification']; ?>" required="">
                              </div>
                              
                              

                          </div>
                          <br>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuller</button>
                        <button type="submit" name="del" class="btn btn-warning">Contunier la suppression</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                                                <tr>
                                                    <td><?= $us['id_authentification']; ?></td>
                                                   <td><?= $us['nom_complet']; ?></td>
                                                   <td><?= $us['username']; ?></td>
                                                   <td><?= $us['email']; ?></td>
                                                   
                                                   <td><?= $us['password']; ?></td>
                                                  

                                                   <td><?= $us['created_at']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg<?= $us['id_authentification']; ?>"><i class="fa fa-pencil"></i></button>
                                                   <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target=".bs-example<?= $us['id_authentification']; ?>"><i class="fa fa-trash"></i></button>
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>

           

      
            

            

           <?php include '../partials/_foot.php'; ?>


        </section>
        <!-- ============================================================== -->
    <!--            Content End               -->
    <!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../partials/_scripto.php'; ?>
      


        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau utilisateur</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                               <select class="form-control" name="ref_utilisateur" required="">
                                <option>-agents-</option>
                                <?php $requete=$db->query("SELECT * FROM tbl_agent ORDER BY nom_complet ASC"); ?>
                                <?php while ($g = $requete->fetch()) { ?>
                                 <option value="<?= $g['id_utilisateur']; ?>"><?= $g['nom_complet']; ?></option>
                                 <?php } ?>
                               </select>
                              </div>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="email" placeholder="email de connexion">
                              </div>
                              

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="username" name="username" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="text" placeholder="mot de passe" name="password" required="">
                              </div>

                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     
    </body>
   

</html>