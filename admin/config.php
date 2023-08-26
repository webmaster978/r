<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Configuration</title>

        <!-- Common Plugins -->
       <?php include '../partials/_linko.php'; ?>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
    </head>
    <body>

			<!-- ============================================================== -->
			<!-- 						Topbar Start 							-->
			<!-- ============================================================== -->
			<div class="top-bar primary-top-bar">
			<?php include 'part/_side.php'; ?>
		</div>
        <?php 

        if (isset($_POST['dom'])) {
            extract($_POST);
            $ndomaine = htmlspecialchars($_POST['ndomaine']);
            $check_query = " SELECT * FROM domaine 
            WHERE ndomaine=:ndomaine
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':ndomaine'   =>  $ndomaine
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Ce domaine existe deja!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
                $req=$db->prepare('INSERT INTO domaine (ndomaine) VALUES (:ndomaine)');
   
                $res=$req->execute(array(
                    'ndomaine' => $ndomaine
                ));
                if ($res) {
                    echo "<script>
                        Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'domaine inserer avec success',
                            showConfirmButton: false,
                             timer: 1500
                           })
    
                    </script>";
                }else{
                     echo "<script>
                             Swal.fire({
                              icon: 'error',
                               title: 'Oops...',
                          text: 'Domaine non inserer!',
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

if (isset($_POST['grad'])) {
    extract($_POST);
    $ngrade = htmlspecialchars($_POST['ngrade']);
    $check_query = " SELECT * FROM grade 
    WHERE ngrade=:ngrade
   ";
  $statement = $db->prepare($check_query);
  $check_data = array(
     ':ngrade'   =>  $ngrade
     
  );
  if($statement->execute($check_data))  
 {
    if($statement->rowCount() > 0)
     {
        echo "<script>
                 Swal.fire({
                  icon: 'error',
                   title: 'Oops...',
              text: 'Ce grade existe deja!',
                 footer: ''
                  })
          </script>";
     }

  else
  {
    if ($statement->rowCount() == 0 ) {
        $requete=$db->prepare('INSERT INTO grade (ngrade) VALUES (:ngrade)');

        $resultat=$requete->execute(array(
            'ngrade' => $ngrade
        ));
        if ($resultat) {
            echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'grade inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
        }else{
             echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'Grade non inserer!',
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

if (isset($_POST['niv'])) {
    extract($_POST);
    $nniveau = htmlspecialchars($_POST['nniveau']);
    $check_query = " SELECT * FROM niveau 
    WHERE nniveau=:nniveau
   ";
  $statement = $db->prepare($check_query);
  $check_data = array(
     ':nniveau'   =>  $nniveau
     
  );
  if($statement->execute($check_data))  
 {
    if($statement->rowCount() > 0)
     {
        echo "<script>
                 Swal.fire({
                  icon: 'error',
                   title: 'Oops...',
              text: 'Ce Niveau existe deja!',
                 footer: ''
                  })
          </script>";
     }

  else
  {
    if ($statement->rowCount() == 0 ) {
        $rre=$db->prepare('INSERT INTO niveau (nniveau) VALUES (:nniveau)');

        $resulta=$rre->execute(array(
            'nniveau' => $nniveau
        ));
        if ($resulta) {
            echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Niveau inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
        }else{
             echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'Niveau non inserer!',
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


if(isset($_POST['md'])){
    extract($_POST);
    $rec=$db->prepare("UPDATE domaine SET ndomaine=:ndomaine WHERE id_d=:id_d");
    $res=$rec->execute(array(
        'id_d' => $id_d,
        'ndomaine' => $ndomaine
        
    ));
    if($res){
        echo "<script>
        Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Modifier avec success',
            showConfirmButton: false,
             timer: 1500
           })

    </script>";
    }else{
       
    }
}

?>
<?php 


if(isset($_POST['mg'])){
    extract($_POST);
    $regrade=$db->prepare("UPDATE grade SET ngrade=:ngrade WHERE id_g=:id_g");
    $resg=$regrade->execute(array(
        'id_g' => $id_g,
        'ngrade' => $ngrade
        
    ));
    if($resg){
        echo "<script>
        Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Modifier avec success',
            showConfirmButton: false,
             timer: 1500
           })

    </script>";
    }else{
       
    }
}

?>

<?php 


if(isset($_POST['bntn'])){
    extract($_POST);
    $reniveau=$db->prepare("UPDATE niveau SET nniveau=:nniveau WHERE id_n=:id_n");
    $resn=$reniveau->execute(array(
        'id_n' => $id_n,
        'nniveau' => $nniveau
        
    ));
    if($resn){
        echo "<script>
        Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Niveau Modifier avec success',
            showConfirmButton: false,
             timer: 1500
           })

    </script>";
    }else{
       
    }
}

?>


<?php 

if (isset($_POST['typep'])) {
    extract($_POST);
    $type_p = htmlspecialchars($_POST['type_p']);
    $check_query = " SELECT * FROM type 
    WHERE type_p=:type_p
   ";
  $statement = $db->prepare($check_query);
  $check_data = array(
     ':type_p'   =>  $type_p
     
  );
  if($statement->execute($check_data))  
 {
    if($statement->rowCount() > 0)
     {
        echo "<script>
                 Swal.fire({
                  icon: 'error',
                   title: 'Oops...',
              text: 'Ce type existe deja!',
                 footer: ''
                  })
          </script>";
     }

  else
  {
    if ($statement->rowCount() == 0 ) {
        $per=$db->prepare('INSERT INTO type (type_p) VALUES (:type_p)');

        $perma=$per->execute(array(
            'type_p' => $type_p
        ));
        if ($perma) {
            echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Type inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
        }else{
             echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'Type non inserer!',
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


if(isset($_POST['utype'])){
    extract($_POST);
    $ut=$db->prepare("UPDATE type SET type_p=:type_p WHERE id_perm=:id_perm");
    $utc=$ut->execute(array(
        'id_perm' => $id_perm,
        'type_p' => $type_p
        
    ));
    if($utc){
        echo "<script>
        Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Type modifier avec success',
            showConfirmButton: false,
             timer: 1500
           })

    </script>";
    }else{
       
    }
}

?>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->


        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
        <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->


        <!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		
        <div class="row page-header">
			<div class="col-lg-6 align-self-center ">
			    <h2>Configuration</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des domaines
                          <div class="col" align="right">
                                   
                          <button type="button" class="btn btn-indigo margin-r-5" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></i></button>
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM DU DOMAINE</th>
                                                    <th>ACTION</th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $rdom=$db->query("SELECT * FROM domaine"); ?>
                                                <?php while ($g = $rdom->fetch()) { ?>

                                                    <div class="modal fade bs-example-modal-sm<?= $g['id_d']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Modifier le domaine <?= $g['ndomaine']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input type="hidden" name="id_d" value="<?= $g['id_d']; ?>">
                            <input class="form-control" type="text" name="ndomaine" value="<?= $g['ndomaine']; ?>" placeholder="nom du domaine" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="md" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                                                <tr>
                                                    <td><?= $g['id_d']; ?></td>
                                                   <td><?= $g['ndomaine']; ?></td>
                                                  <td> <button type="button" class="btn btn-warning margin-r-5" data-toggle="modal" data-target=".bs-example-modal-sm<?= $g['id_d']; ?>"><i class="fa fa-pencil"></i></i></button></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des grades
                          <div class="col" align="right">
                                   
                          <button type="button" class="btn btn-indigo margin-r-5" data-toggle="modal" data-target=".bs-example-modal"><i class="fa fa-plus"></i></i></button> 
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM DU GRADE</th>
                                                    <th>ACTION</th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php $recupgrade=$db->query("SELECT * FROM grade"); ?>
                                                <?php while ($grade = $recupgrade->fetch()) { ?>
                                                    <div class="modal fade bs-example-modal<?= $grade['id_g']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Modifier le grade de <?= $grade['ngrade']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                        <input type="hidden" name="id_g" value="<?= $grade['id_g']; ?>">
                            <input class="form-control" type="text" name="ngrade" value="<?= $grade['ngrade']; ?>" placeholder="nom du grade" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="mg" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                                                <tr>
                                                    <td><?= $grade['id_g']; ?></td>
                                                   <td><?= $grade['ngrade']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning margin-r-5" data-toggle="modal" data-target=".bs-example-modal<?= $grade['id_g']; ?>"><i class="fa fa-pencil"></i></i></button>  
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des niveaux
                          <div class="col" align="right">
                                   
                          <button type="button" class="btn btn-primary margin-r-5" data-toggle="modal" data-target=".bs-example"><i class="fa fa-plus"></i></i></button>  
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM DU NIVEAU</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php $recupniveau=$db->query("SELECT * FROM niveau"); ?>
                                                <?php while ($niv = $recupniveau->fetch()) { ?>
                                                    <div class="modal fade bs-example<?= $niv['id_n']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Modifier le niveau de <?= $niv['nniveau']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input type="hidden" name="id_n" value="<?= $niv['id_n']; ?>">
                            <input class="form-control" type="text" name="nniveau" value="<?= $niv['nniveau']; ?>" placeholder="nom du niveau" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="bntn" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                                                <tr>
                                                    <td><?= $niv['id_n']; ?></td>
                                                   <td><?= $niv['nniveau']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning margin-r-5" data-toggle="modal" data-target=".bs-example<?= $niv['id_n']; ?>"><i class="fa fa-pencil"></i></i></button>
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>
            
            
            
                            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-default">
                          Type de permanance
                          <div class="col" align="right">
                                   
                          <button type="button" class="btn btn-primary margin-r-5" data-toggle="modal" data-target=".bs-exampl"><i class="fa fa-plus"></i></i></button>  
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM DU NIVEAU</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php $recuper=$db->query("SELECT * FROM type"); ?>
                                                <?php while ($perm = $recuper->fetch()) { ?>
                                                    <div class="modal fade bs-exampl<?= $perm['id_perm']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Modifier le type <?= $perm['type_p']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input type="hidden" name="id_perm" value="<?= $perm['id_perm']; ?>">
                            <input class="form-control" type="text" name="type_p" value="<?= $perm['type_p']; ?>" placeholder="nom du niveau" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="utype" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                                                <tr>
                                                    <td><?= $perm['id_perm']; ?></td>
                                                   <td><?= $perm['type_p']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning margin-r-5" data-toggle="modal" data-target=".bs-exampl<?= $perm['id_perm']; ?>"><i class="fa fa-pencil"></i></i></button>
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>
            
            

            <!-- <h1>Modal ajout domaine debut</h1> -->
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Nouveau domaine</h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input class="form-control" type="text" name="ndomaine" id="" placeholder="nom du domaine" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="dom" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <!-- <h1>fin modal domaine</h1> -->
              <!-- <h1>Modal grade</h1> -->
              <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Nouveau grade</h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input class="form-control" type="text" name="ngrade" id="" placeholder="nom du grade" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="grad" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <!-- <h1>fin modal grade</h1> -->
               <!-- <h1>Modal niveau</h1> -->
               <div class="modal fade bs-example" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Nouveau niveau</h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input class="form-control" type="text" name="nniveau" id="" placeholder="nom du niveau" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="niv" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <!-- <h1>fin modal niveau</h1> -->
                           <!-- <h1>Modal type</h1> -->
               <div class="modal fade bs-exampl" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Nouveau type de permanence</h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input class="form-control" type="text" name="type_p" id="" placeholder="Type de permanence" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="typep" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <!-- <h1>fin modal type</h1> -->

            

			
            

            

           <?php include '../partials/_foot.php'; ?>


        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../partials/_scripto.php'; ?>
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>