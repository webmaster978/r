<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>agents</title>

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

        if (isset($_POST['submit'])) {
            extract($_POST);
            $cas=$case.' - '.$dates;
            
           
            $check_query = " SELECT * FROM souscrir 
            WHERE id_user=:id_user AND cas=:cas
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':id_user'   =>  $_SESSION['PROFILE']['nom_complet'],
             'cas' => $cas
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Desoler vous ne pouvez pas souscrire 2 fois sur le meme cas!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
                $req=$db->prepare('INSERT INTO souscrir (id_user,cas,montant) VALUES (:id_user,:cas,:montant)');
   
                $res=$req->execute(array(
                    'id_user' =>  $_SESSION['PROFILE']['id_utilisateur'],
                    'cas' => $cas,
                    'montant' => htmlspecialchars($_POST['montant'])
                ));
                if ($res) {
                    echo "<script>
                        Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'souscription effectuer avec success',
                            showConfirmButton: false,
                             timer: 1500
                           })
    
                    </script>";
                }else{
                     echo "<script>
                             Swal.fire({
                              icon: 'error',
                               title: 'Oops...',
                          text: 'souscription non effectuer non inserer!',
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
			    <h2>Nos agents</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des cas sociaux
                          
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM COMPLET</th>
                                                    <th>CAS SOCIAUX</th>
                                                    <th>DATE CAS</th>
                                                    <th>DETAILS</th>
                                                    
                                                    <th>Date de creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM cas_sociaux INNER JOIN tbl_agent ON cas_sociaux.id_agent=tbl_agent.id_utilisateur"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>

                                                <div class="modal fade" id="exampleModal<?= $g['id_cas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Souscrire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
      <div class="row">
         <div class="col-md-12"> 
            <h3>En faveur de <?= $g['nom_complet']; ?> qui a comme evement <?= $g['cas']; ?> en date du <?= $g['dates']; ?>  je souscris avec : </h3>
         </div>
         <input type="hidden" name="dates" value="<?= $g['dates']; ?>">
         <input type="hidden" name="case" value="<?= $g['cas']; ?>">
      </div>
      <div class="row">
         <div class="col-md-12"> 
            <input class="form-control" type="number" name="montant" placeholder="indiquer le montant de souscription" required="">
         </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="submit" name="submit" class="btn btn-primary">Je souscris</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                                <tr>
                                                    <td><?= $g['id_cas']; ?></td>
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?= $g['cas']; ?></td>
                                                   <td><?= $g['dates']; ?></td>
                                                   <td><?= $g['detail']; ?></td>
                                                  

                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?= $g['id_cas']; ?>">
Souscrire
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