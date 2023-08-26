<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dossiers</title>

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
			    <h2>Communiquer</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Nos comminiques
                          <div class="col" align="right">
                          <!-- <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button> -->
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                        <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>TITRE</th>
                                                    <th>CATEGORIE</th>
                                                    <th>COMMUNIQUER</th>
                                                    <th>AJOUTER PAR</th>
                                                   
                                                    <th>DATE CREATION</th>
                                                </tr>
                                            </thead>
   <?php 
                        $service = $db->query('SELECT * FROM communiquer');


$don = $service->fetchAll(PDO::FETCH_OBJ);
foreach ($don as $s) :
    ?>

                                            
                                             
                                                <tr>
                                                <td><?= $s->titre; ?></td>
                                                   <td><?= $s->categorie; ?></td>
                                                   <td><?= $s->designation; ?></td>
                                                   
                                                   <td><?= $s->id_user; ?></td>
                                                   <td><?= $s->created_at; ?></td>
                                                   
                                                  
                                                </tr>
                                                <?php
endforeach;


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

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau dossier</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                          
                          <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="id_user" required="">
                                <option>-agents-</option>
                                <?php $requete=$db->query("SELECT * FROM tbl_agent ORDER BY nom_complet ASC"); ?>
                                <?php while ($g = $requete->fetch()) { ?>
                                 <option value="<?= $g['id_utilisateur']; ?>"><?= $g['nom_complet']; ?></option>
                                 <?php } ?>
                               </select>
                              </div>
                              <div class="col-md-6">
                               <input class="form-control" type="file" name="file" required="" >
                                
                              </div>

                          </div>
                         
                    
                          
                           
                          
                          <br>

                        
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