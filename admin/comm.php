<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/form-editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Comminiquer</title>

        <!-- Common Plugins -->
         <link rel="icon" type="img" href="../assets/img/L.png">
        <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
        <!-- Wysihtml5 and Summernote -->
        <link href="../assets/lib/wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet">
        <link href="../assets/lib/summernote/summernote.css" rel="stylesheet">
		
        <!-- Custom Css-->
        <link href="../assets/scss/style.css" rel="stylesheet">

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
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
	
        <?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $designation = htmlspecialchars_decode($_POST['designation']);
    $titre = htmlspecialchars($_POST['titre']);
            $check_query = " SELECT * FROM communiquer 
            WHERE designation=:designation AND titre=:titre
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':designation'   =>  $designation,
             ':titre'   =>  $titre            
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "";             }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
 

  $req=$db->prepare("INSERT INTO communiquer (titre,categorie,designation,id_user) VALUES (:titre,:categorie,:designation,:id_user)");

  $res=$req->execute(array(
    'titre' => htmlspecialchars($_POST['titre']),
    'categorie' => htmlspecialchars($_POST['categorie']),
    'designation' => htmlspecialchars_decode($_POST['designation']),
    
    'id_user' => $_SESSION['PROFILE']['nom_complet']
  ));
  if ($res) {
     echo "<script>
     Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Communiquer publier avec success',
        showConfirmButton: false,
        timer: 1500
      })
     
     </script>";
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
			    <h2>Nouveau communiquer</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					
					<li class="breadcrumb-item active">Communiquer</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">
            
    
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des communiques
                          <div class="col" align="right">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus"></i>
                                                        
                                                     </button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                        <table id="datatable" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>TITRE</th>
                                                    
                                                    <th>CATEGORIE</th>
                                                    <th>DESIGNATION</th>
                                                   
                                                    <th> AJOUTER PAR</th>
                                                    
                                                    <th>Date de creation</th>
                                                   
                                                </tr>
                                            </thead>
<?php $req=$db->query("SELECT * FROM communiquer"); ?>

                                            <tbody>
                                               <?php while ($cm = $req->fetch()) { ?>
                                                <tr>
                                                    <td><?= $cm['id_com']; ?></td>
                                                   <td><?= $cm['titre']; ?></td>
                                                   <td><?= $cm['categorie']; ?></td>
                                                   <td><?= $cm['designation']; ?></td>
                                                   
                                                  <td> <?= $cm['id_user']; ?></td>

                                                   <td><?= $cm['created_at']; ?></td>
                                                   
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




		 <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nouveau communiquer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
        <div class="row">
            
            <div class="col-md-6">
                <input class="form-control" type="text" name="titre" placeholder="titre du communiquer">
            </div>
            <div class="col-md-6">
                <input class="form-control" type="text" name="categorie" placeholder="categorie du communiquer">
            </div>
        </div><br>
                      
                          
                      <textarea class="summernote" name="designation" required="">
                        		
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



        <!--Common plugins-->
        <script src="../assets/lib/jquery/dist/jquery.min.js"></script>
		<script src="../assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>		
        <script src="../assets/lib/pace/pace.min.js"></script>
        <script src="../assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="../assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="../assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="../assets/js/custom.js"></script>
      
		<!-- Wysihtml5 and Summernote -->
        <script src="../assets/lib/wysihtml5/wysihtml5-0.3.0.js"></script>
        <script src="../assets/lib/wysihtml5/bootstrap-wysihtml5.js"></script>
		
        <script src="../assets/lib/summernote/summernote.js"></script>


         <!-- Datatables-->
        <script src="../assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/lib/datatables/dataTables.responsive.min.js"></script>

		<script src="../assets/lib/datatables/dataTables.buttons.min.js"></script>
		<script src="../assets/lib/datatables/jszip.min.js"></script>
		<script src="../assets/lib/datatables/pdfmake.min.js"></script>
		<script src="../assets/lib/datatables/vfs_fonts.js"></script>
		<script src="../assets/lib/datatables/buttons.html5.min.js"></script>
        <script>
             $(document).ready(function () {
                $('#datatable').dataTable();
				
				$('#datatable2').DataTable({
					 dom: 'Bfrtip',
					buttons: [
						'copyHtml5',
						'excelHtml5',
						'csvHtml5',
						'pdfHtml5'
					]
				});
				
				 $('#datatable3').DataTable( {
					"scrollY":        "400px",
					"scrollCollapse": true,
					"paging":         false
				} );
            });
        </script>
		
        <script>
            $(document).ready(function () {
                //wysihtml5
                $('#textarea').wysihtml5({
					height:'500px',
				});

                //summernote
                $(function () {

					$('.summernote').summernote({
						height:'400px',
					});
					
                    $('.summernote1').summernote({
						height:'400px',
                        toolbar: [
                            ['headline', ['style']],
                            ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
                            ['textsize', ['fontsize']],
                            ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]
                        ]
                    });

                    $('.summernote2').summernote({
                        airMode: true,
                    });

                });

            });

            
        </script>

    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/form-editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:44 GMT -->
</html>