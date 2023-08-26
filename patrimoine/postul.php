<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Suivie</title>

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
		
        <div class="row page-header">
			<div class="col-lg-6 align-self-center ">
			    <h2>Suivie de nos candidatures</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Nos candidatures
                          <div class="col" align="right">
                          
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                        <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Agent</th>
                                                    <th>Poste</th>
                                                    <th>Fichier</th>
                                                    <th>Action</th>
                                                    <th>Designation</th>
                                                    <th>Decision</th>
                                                   
                                                    <th>Date creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                            
   <?php 
          $poste = $_GET['poste'];


                        $service = $db->prepare('SELECT * FROM candidat INNER JOIN tbl_agent ON candidat.id_user=tbl_agent.id_utilisateur WHERE poste=:poste');

                        $service->execute(array(
                            'poste' => $_GET['poste']
                          ));

    ?>
     <?php while ($g = $service->fetch()) { ?>


        <div class="modal fade bs-example-modal-lg<?= $g['id_can']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Candidature de <?= $g['nom_complet']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="upostul.php" method="POST">
                          
                          <div class="row">
                              <div class="col-md-6">
                                <label for="">Poste soliciter</label>
                                <input class="form-control" type="text" value="<?= $g['poste']; ?>" required="">
                              </div>
                              <div class="col-md-6">
                                  <label for="">Decision</label>
                                  <input type="hidden" name="id_can" value="<?= $g['id_can']; ?>">
                              <textarea class="form-control" name="decision" id="" cols="30" rows="30">

                              </textarea>
                                
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
                                                <td><?= $g['id_can']; ?></td>
                                                <td><?= $g['nom_complet']; ?></td>
                                                <td><?= $g['poste']; ?></td>
                                                   <td><?= $g['filename']; ?></td>
                                                    <td><a href="download.php?file=<?= $g['filename']; ?>">Telecharger</a><br></td>
                                                   
                                                   <td><?= $g['designation']; ?></td>
                                                   <td><?= $g['decision']; ?></td>
                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg<?= $g['id_can']; ?>"><i class="fa fa-pencil"></i></button>
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