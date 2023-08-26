<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cartes</title>

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
   
		<?php
 if(isset($_POST['submit'])){
     extract($_POST);

     $delete=$db->prepare("DELETE FROM card WHERE id_card=:id_card");

     $red=$delete->execute(array(
         'id_card' => $id_card
     ));
     if($red){
         echo" <script>
         Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Carte supprimer avec success',
             showConfirmButton: false,
              timer: 1500
            })

     </script> ";
     }else{
         echo'';
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
			    <h2>Nos cartes</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste de toute nos cartes
                         
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM COMPLET</th>
                                                    
                                                    <th>CODE QR</th>
                                                    <th>PHOTO</th>
                                                    <th>Date de creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM card INNER JOIN tbl_agent ON card.STUDENTID=tbl_agent.STUDENTID"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>
                                              <div class="modal fade" id="exampleModal<?= $g['id_card']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression de <?= $g['nom_complet']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        Etes vous sur de vouloir supprimer <?= $g['nom_complet']; ?>
        <input type="hidden" name="id_card" value="<?= $g['id_card']; ?>">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="submit" name="submit" class="btn btn-primary">Supprimer</button>
      </div>
      </form>
    </div>
  </div>
</div>

                                                <tr>
                                                    <td><?= $g['id_card']; ?></td>
                                                    
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   
                                                  <td><img class="mage" src="bul/codes/<?= $g['codeFile']; ?>"></td>
                                                   <td><img class="mage" src="../avatars/<?= $g['photo']; ?>"></td>

                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                   <a class="btn btn-warning" href="pcard?id_card=<?= $g['id_card']; ?>"><i class="fa fa-print"></i> Imprimer</a>
                                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $g['id_card']; ?>">    Supprimer
</button>
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>
<!-- Button trigger modal -->


<!-- Modal -->

            

            

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