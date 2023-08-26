<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/form-editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Offre</title>

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
		
	
      



		

        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
       <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->
        <?php
    $conn = mysqli_connect('localhost','root','','rh_manager');
    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $id_user = $_SESSION['PROFILE']['id_utilisateur'];
        $designation = htmlspecialchars($_POST['designation']);
        $id_o = htmlspecialchars($_POST['id_o']);
        $poste = htmlspecialchars($_POST['poste']);
        $path = "../candi/".$fileName;
        
        $query = "INSERT INTO candidat(id_user,filename,designation,poste,id_o) VALUES ('$id_user','$fileName','$designation','$poste','$id_o')";
        $run = mysqli_query($conn,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Candidature soumis avec success',
                showConfirmButton: false,
                timer: 1500
              })
            </script>";
           
        }
        else{
            echo "error".mysqli_error($conn);
        }
        
    }
    
    ?>

        <!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		           
        <div class="row page-header">
			<div class="col-lg-6 align-self-center ">
			    <h2>Offres d'emploie</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					
					<li class="breadcrumb-item active">Nos offres</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">
            
    
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des offres d'emploie
                        
                        </div>
                        
                        <div class="card-body">
                         <div class="row">
                         <?php

   
    $id_o = $_GET['id'];
    $req = $db->prepare('SELECT * FROM offres WHERE id_o = ?');
    $req->execute(array($id_o));


    ?>
                         <?php while ($g = $req->fetch()) { ?>
                           <div class="col-md-12">
                           <div class="card text-center">
                             <div class="card-header">
                                 Status :
                             <?php
  $d = date("Y-m-d");
  $dd = $g['datef'];
   if($dd > $d){
       echo'<span class="badge badge-primary"> en cours</span>';
   }else{
    echo'<span class="badge badge-danger"> expirer</span>';
   }
?>
                               <p>Date publication<?= $g['created_at']; ?></p>  
                             offre numero <?= $g['id_o']; ?> / <?php $d = date('Y');  echo $d;?>
                             
                                 </div>
  <div class="card-body">
    <h5 class="card-title">Poste : <?= $g['poste']; ?></h5>
   <p>
   <?= $g['designation']; ?> 
   </p>
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Postuler</button>
  </div>
  <div class="card-footer text-muted">
  
  Offre disponible jusqu au : <?= $g['datef']; ?>
  </div>
</div>



<!-- modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Postuler</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                          
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="">Un petit text</label>
                                <textarea name="designation" id="" cols="30" rows="10">

                                </textarea>
                              </div>
                              <input type="hidden" name="id_o" value="<?= $g['id_o']; ?>">
                              <input type="hidden" name="poste" value="<?= $g['poste']; ?>">
                              <div class="col-md-6">
                                  <label for="">Mon dossier</label>
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

<!-- end modal -->
                           </div>
                           <?php } ?>
                         </div>









                       

                        </div>
                    </div>
                </div>
            </div>
            

           

         

           
            

            <?php include '../partials/_foot.php'; ?>


        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->




		 
       



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