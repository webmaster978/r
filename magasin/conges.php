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

		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->
<?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $date_d = htmlspecialchars($_POST['date_d']);
    $date_f = htmlspecialchars($_POST['date_f']);
            $check_query = " SELECT * FROM demande 
            WHERE date_d=:date_d AND date_f=:date_f
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':date_d'   =>  $date_d,
             ':date_f'   =>  $date_f            
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Desoler vous ne pouvez pas demander 2 conger a la meme date!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
  $date_d = strtotime($date_d);
  $date_f = strtotime($date_f);
  $jour  = abs($date_d - $date_f);
  $diff=$jour/86400;

  $req=$db->prepare("INSERT INTO demande (id_user,motif,type,diff,date_d,date_f,status) VALUES (:id_user,:motif,:type,:diff,:date_d,:date_f,:status)");

  $res=$req->execute(array(
    'date_d' => htmlspecialchars($_POST['date_d']),
    'diff' => $diff,
    'status' => $status,
    'type' => htmlspecialchars($_POST['type']),
    'date_f' => htmlspecialchars($_POST['date_f']),
    'motif' => htmlspecialchars($_POST['motif']),
    'id_user' => $_SESSION['PROFILE']['id_utilisateur']
  ));
  if ($res) {
     echo "<script>
                        Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'demande inserer avec success',
                            showConfirmButton: false,
                             timer: 1500
                           })
    
                    </script>";
  }else{
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Demande non envoyer!',
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
			    <h2>Mes conges</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Conges
                          
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Motif</th>
                                                    <th>Type</th>
                                                    <th>Date debut</th>
                                                    <th>Date fin</th>
                                                    <th>Nombre de jour</th>
                                                   <th>Status</th>
                                                    
                                                </tr>
                                            </thead>
   <?php 
                        $service = $db->prepare("SELECT * FROM demande where id_user=:id_user AND status='1'");
$service->execute(array(
  'id_user' => $_SESSION['PROFILE']['id_utilisateur']
));

$don = $service->fetchAll(PDO::FETCH_OBJ);
foreach ($don as $s) :
         



  $val = '';
			if($s->status == "1")
			{
				$val = '<label class="badge badge-success">accepter</label>';
			}
			else if($s->status == "0")
			{
				$val = '<label class="badge badge-danger">rejetter</label>';
			}
      else{
        $val = '<label class="badge badge-primary">en attente</label>';
      }




  
    ?>

                                            
                                             
                                                <tr>
                                                    <td><?= $s->id_dem; ?></td>
                                                   <td><?= $s->motif; ?></td>
                                                   <td><?= $s->type; ?></td>
                                                   <td><?= $s->date_d; ?></td>
                                                   <td><?= $s->date_f; ?></td>
                                                   <td><?= $s->diff; ?></td>
                                                   
                                                   <td><?php echo $val; ?></td>
                                                  
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
                        <h5 class="modal-title" id="myModalLabel">Nouvelle demande de conger</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="date" name="date_d" required="">
                              </div>
                              <div class="col-md-6">
                                <input class="form-control" type="date" name="date_f" required="">
                              </div>

                          </div>
                          <br>
                          
                            <div class="row">
                              <div class="col-md-4">
                                <input class="form-control" type="text" name="type" id="" placeholder="type de conger">
                              </div>
                              <input type="hidden" name="status" value="2">
                              <div class="col-md-8">
                              <textarea class="form-control" cols="100" rows="100" name="motif" placeholder="motif" required="">
                              
                              </textarea>
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