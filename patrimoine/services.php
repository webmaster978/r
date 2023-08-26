<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Services</title>

        <!-- Common Plugins -->
       <?php include '../partials/_linko.php'; ?>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
            $designation = htmlspecialchars($_POST['designation']);
            $check_query = " SELECT * FROM service 
            WHERE designation=:designation
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':designation'   =>  $designation
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Ce service existe deja!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
                $req=$db->prepare('INSERT INTO service (designation) VALUES (:designation)');
   
                $res=$req->execute(array(
                    'designation' => $designation
                ));
                if ($res) {
                    echo "<script>
                        Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'service inserer avec success',
                            showConfirmButton: false,
                             timer: 1500
                           })
    
                    </script>";
                }else{
                     echo "<script>
                             Swal.fire({
                              icon: 'error',
                               title: 'Oops...',
                          text: 'service non inserer!',
                             footer: ''
                              })
                      </script>";
    
                }
                }
            }
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
			    <h2>Nos services</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des services
                          <div class="col" align="right">
                                   
                          <button type="button" class="btn btn-primary margin-r-5" data-toggle="modal" data-target=".bs-example"><i class="fa fa-plus"></i></i></button>  
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom du service</th>
                                                    
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php $recupniveau=$db->query("SELECT * FROM service"); ?>
                                                <?php while ($niv = $recupniveau->fetch()) { ?>

                                                <tr>
                                                    <td><?= $niv['id_serv']; ?></td>
                                                   <td><?= $niv['designation']; ?></td>
                                                  
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>


               <!-- <h1>Modal niveau</h1> -->
               <div class="modal fade bs-example" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="mySmallModalLabel">Nouveau service</h5>
                    </div>
                    <div class="modal-body">
                        <form action="config" method="post">
                            <input class="form-control" type="text" name="designation" id="" placeholder="nom du service" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <!-- <h1>fin modal niveau</h1> -->

            

			
            

            

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