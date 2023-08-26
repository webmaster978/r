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
                                                    <!-- <th>#</th> -->
                                                    <!-- <th>Agent</th> -->
                                                    <th>Poste</th>
                                                    <!-- <th>Fichier</th>
                                                    <th>Action</th>
                                                    <th>Designation</th>
                                                    <th>Decision</th> -->
                                                   
                                                    <th>Nombre de candidat</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                  <?php $c=$db->query("SELECT poste,COUNT(*) AS totalcandidat FROM candidat GROUP BY poste ORDER BY poste DESC"); ?>
                                  <?php while ($g = $c->fetch()) { ?>
                                  <tr>
                                    
                                    <td><?= $g['poste']; ?></td>
                                    <td><?= $g['totalcandidat']; ?></td>
                                    
                                    <td>
                                        <a class="btn btn-warning rond-circle" href="postul?poste=<?= $g['poste']; ?>">Voir</a>
                                    
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
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../partials/_scripto.php'; ?>

     
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>