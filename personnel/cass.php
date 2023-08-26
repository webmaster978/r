<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cas sociaux</title>

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
    $id_agent = htmlspecialchars($_POST['id_agent']);
    $dates = htmlspecialchars($_POST['dates']);
            $check_query = " SELECT * FROM cas_sociaux 
            WHERE id_agent=:id_agent AND dates=:dates
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':id_agent'   =>  $id_agent,
             ':dates'   =>  $dates            
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "";             }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
 

  $req=$db->prepare("INSERT INTO cas_sociaux (id_agent,cas,dates,detail,id_user) VALUES (:id_agent,:cas,:dates,:detail,:id_user)");

  $res=$req->execute(array(
    'id_agent' => htmlspecialchars($_POST['id_agent']),
    'cas' => htmlspecialchars($_POST['cas']),
    'dates' => htmlspecialchars($_POST['dates']),
    'detail' => htmlspecialchars($_POST['detail']),
    'id_user' => $_SESSION['PROFILE']['nom_complet']
  ));
  if ($res) {
     echo "<script>
                      let timerInterval
Swal.fire({
  title: 'Auto close alert!',
  html: 'I will close in <b></b> milliseconds.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
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
			    <h2>Cas sociaux</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des cas sociaux
                          <div class="col" align="right">
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
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
                                                    <th> AJOUTER PAR</th>
                                                    
                                                    <th>Date de creation</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM cas_sociaux INNER JOIN tbl_agent ON cas_sociaux.id_agent=tbl_agent.id_utilisateur"); ?>

                                            <tbody>
                                               <?php while ($g = $requete->fetch()) { ?>
                                                <tr>
                                                    <td><?= $g['id_cas']; ?></td>
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?= $g['cas']; ?></td>
                                                   <td><?= $g['dates']; ?></td>
                                                   <td><?= $g['detail']; ?></td>
                                                  <td> <?= $g['id_user']; ?></td>

                                                   <td><?= $g['created_at']; ?></td>
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
      


        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau cas social</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                               <select class="form-control" name="id_agent" required="">
                                <option>-agents-</option>
                                <?php $requete=$db->query("SELECT * FROM tbl_agent ORDER BY nom_complet ASC"); ?>
                                <?php while ($g = $requete->fetch()) { ?>
                                 <option value="<?= $g['id_utilisateur']; ?>"><?= $g['nom_complet']; ?></option>
                                 <?php } ?>
                               </select>
                              </div>
                              <div class="col-md-6">
                                <input class="form-control" type="date" name="dates" required="">
                                   
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="cas" name="cas" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="text" placeholder="detail" name="detail" required="">
                              </div>

                          </div>
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
   

</html>