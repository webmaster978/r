<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Patrimoine</title>

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
            <!--                        Topbar Start                            -->
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
            $designation = htmlspecialchars($_POST['designation']);
            $service = htmlspecialchars($_POST['service']);
            $check_query = "SELECT * FROM patrimoine WHERE designation=:designation AND service=:service 
            
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':designation'   =>  $designation,
             ':service' => $service
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Ce materiel existe deja dans ce service veuillez ajouter sa quantiter!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
                $req=$db->prepare('INSERT INTO patrimoine (designation,quantite,service,etat,observation) VALUES (:designation,:quantite,:service,:etat,:observation)');
   
                $res=$req->execute(array(
                    'designation' => $designation,
                    'quantite' => $quantite,
                    'service' => $service,
                    'etat' => $etat,
                    'observation' => $observation
                ));
                if ($res) {
                    echo "<script>
                        Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'materiel affecter avec success inserer avec success',
                            showConfirmButton: false,
                             timer: 1500
                           })
    
                    </script>";
                }else{
                     echo "<script>
                             Swal.fire({
                              icon: 'error',
                               title: 'Oops...',
                          text: 'Materiel non affecter!',
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
if (isset($_POST['up'])) {
    extract($_POST);
 
  $upp=$db->prepare("UPDATE patrimoine SET service=:service, quantite=:quantite, etat=:etat WHERE id_patri=:id_patri");

  $resultat=$upp->execute(array(
    'id_patri' => htmlspecialchars($id_patri),
    
    'service' => htmlspecialchars($_POST['service']),
    'quantite' => htmlspecialchars($quantite),
    'etat' => htmlspecialchars($etat)
    
  ));
  if ($resultat) {
     echo "
     <script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'patrimoine modifier avec success',
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
        <!--                        Navigation Start                        -->
        <!-- ============================================================== -->
        <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
        <!--                        Navigation End                          -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!--                        Content Start                           -->
        <!-- ============================================================== -->
        
        <div class="row page-header">
            <div class="col-lg-6 align-self-center ">
                <h2>Nos Patrimoine</h2>
                
            </div>
        </div>

        <section class="main-content">
             

            
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des patrimoine
                         
                          <div class="col" align="right">
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>DESIGNATION</th>
                                                    <th>NOMBRE</th>
                                                    <th>ANNE ACQUISITION</th>
                                                    <th>ETAT ACTUEL</th>
                                                    <th>SERVICE</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM patrimoine"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>
                                              
                                              
                                                    <div class="modal fade bs-example-modal<?= $g['id_patri']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Modifier le patrimoine du bureau de <?= $g['service']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="designation" value="<?= $g['designation']; ?>" placeholder="Nom du patrimoine" required="">
                                <input type="hidden" name="id_patri" value="<?= $g['id_patri']; ?>">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="text" name="service" value="<?= $g['service']; ?>" placeholder="Nom du service" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="number" value="<?= $g['quantite']; ?>" placeholder="quantiter" name="quantite" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="etat" required="">
                                   <option value="<?= $g['etat']; ?>"><?= $g['etat']; ?></option>
                                   <option value="Bonne etat">Bonne etat</option>
                                   <option value="Mauvais etat">Mauvais etat</option>
                                 </select>
                              </div>

                          </div>
                          
                          <br>
                          <textarea class="form-control" name="observation" rows="100" required="">
                            
                          </textarea>
                          
                         
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="up" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                <tr>
                                                    <td><?= $g['id_patri']; ?></td>
                                                   <td><?= $g['designation']; ?></td>
                                                   <td><?= $g['quantite']; ?></td>
                                                   <td><?= $g['created_at']; ?></td>
                                                   <td><?= $g['etat']; ?></td>
                                                  <td><?= $g['service']; ?></td>
                                                   
                                                   <td>
                                                     <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal<?= $g['id_patri']; ?>"><i class="fa fa-pencil"></i></button>
                                                     <a class="btn btn-primary" href="pt.php?service=<?= $g['service']; ?>"><i class="fa fa-eye"></i></a>
                                                     
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
        <!--                        Content End                             -->
        <!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../partials/_scripto.php'; ?>

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau patrimoine au service</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="designation" placeholder="Nom du patrimoine" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="text" name="service" placeholder="Nom du service" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="quantiter" name="quantite" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="etat" required="">
                                   <option>-etat-</option>
                                   <option value="Bonne etat">Bonne etat</option>
                                   <option value="Mauvais etat">Mauvais etat</option>
                                 </select>
                              </div>

                          </div>
                          
                          <br>
                          <textarea class="form-control" name="observation" rows="100" required="">
                            
                          </textarea>
                          
                         
                        
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

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>