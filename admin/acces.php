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
 
  $req=$db->prepare("UPDATE tbl_agent SET ref_fonction=:ref_fonction WHERE id_utilisateur=:id_utilisateur");

  $res=$req->execute(array(
    'ref_fonction' => htmlspecialchars($ref_fonction),
    
    'id_utilisateur' => htmlspecialchars($_POST['id_utilisateur'])
    
  ));
  if ($res) {
     echo "
     <script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Access modifier avec success',
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
                      text: 'Access non modifier!',
                         footer: ''
                          })
                  </script>";
  
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
          <h2>Les access</h2>
        
      </div>
    </div>

        <section class="main-content">
       

      
          <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste access des agents
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
                                                    <th>NIVEAU D'ACCESS</th>
                                                    
                                                    
                                                   
                                                    
                                                    
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
<?php $rec=$db->query("SELECT * FROM tbl_agent INNER JOIN fonction ON tbl_agent.ref_fonction=fonction.id_fonction"); ?>

                                            <tbody>
                                               <?php while ($us= $rec->fetch()) { ?>
                                                <div class="modal fade bs-example-modal-lg<?= $us['id_utilisateur']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Modifier l'accees de <?= $us['nom_complet']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                              <input class="form-control" type="text" value="<?= $us['nom_complet']; ?>" required="">
                              <input type="hidden" name="id_utilisateur" value="<?= $us['id_utilisateur']; ?>">
                              </div>
                              <div class="col-md-6">
                              <select class="form-control" name="ref_fonction" required="">
                                <option><?= $us['designation']; ?></option>
                                <?php $requete=$db->query("SELECT * FROM fonction"); ?>
                                <?php while ($g = $requete->fetch()) { ?>
                                 <option value="<?= $g['id_fonction']; ?>"><?= $g['designation']; ?></option>
                                 <?php } ?>
                               </select>
                              </div>
                              

                          </div>
                          <br>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                                                <tr>
                                                    <td><?= $us['id_utilisateur']; ?></td>
                                                   <td><?= $us['nom_complet']; ?></td>
                                                   <td><?= $us['designation']; ?></td>
                                                   
                                                   <td>
                                                   <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg<?= $us['id_utilisateur']; ?>"><i class="fa fa-pencil"></i></button>
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
      


        <!-- <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
        </div> -->

     
    </body>
   

</html>