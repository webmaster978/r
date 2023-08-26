<?php $cas = $_GET['cas']; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Souscripteur <?php echo"$cas"; ?></title>

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
			<!-- 						Topbar Start 							-->
			<!-- ============================================================== -->
			<div class="top-bar primary-top-bar">
			<?php include 'part/_side.php'; ?>
		</div>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->

		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->

    <?php
    $conn = mysqli_connect('localhost','root','','rh_manager');
    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $id_user = $_POST['id_user'];
        $ida = $_SESSION['PROFILE']['nom_complet'];
        $path = "../files/".$fileName;
        
        $query = "INSERT INTO dossier(filename,id_user,ida) VALUES ('$fileName','$id_user','$ida')";
        $run = mysqli_query($conn,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error".mysqli_error($conn);
        }
        
    }
    
    ?>

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
		
    

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Les souscripteurs pour le cas de <?php echo "$cas" ?>
                          <div class="col" align="right">
                          
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                        <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom de l'agent </th>
                                                    
                                                    <th>Montant</th>
                                                    
                                                   <th>Observation</th>
                                                    <th>Date creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                            
   <?php 
          


                        $service = $db->prepare('SELECT * FROM souscrir INNER JOIN tbl_agent ON souscrir.id_user=tbl_agent.id_utilisateur WHERE cas=:cas');

                        $service->execute(array(
                            'cas' => $_GET['cas']
                          ));

    ?>
     <?php while ($g = $service->fetch()) { ?>


        <div class="modal fade bs-example-modal-lg<?= $g['id_souscrit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Souscription de <?= $g['nom_complet']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="upcas.php" method="POST">
                          
                          <div class="row">
                              <div class="col-md-6">
                                <label for="">Montant</label>
                                <input class="form-control" type="text" value="<?= $g['montant']; ?> $" required="">
                              </div>
                              <div class="col-md-6">
                                  <label for="">Observation</label>
                                  <input type="hidden" name="id_souscrit" value="<?= $g['id_souscrit']; ?>">
                              <input class="form-control" type="text" name="observation">
                                
                              </div>

                          </div>
                         
                    
                          
                           
                          
                         

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-warning">Decider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                                            
                                             
                                                <tr>
                                                <td>#</td>
                                                <td><?= $g['nom_complet']; ?></td>
                                                <td><?= $g['montant']; ?></td>
                                                  <td><?= $g['observation']; ?></td>
                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg<?= $g['id_souscrit']; ?>"><i class="fa fa-pencil"></i></button>
                                                   </td>
                                                   
                                                  
                                                </tr>
                                                <?php

     }

?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>

			
            

            

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