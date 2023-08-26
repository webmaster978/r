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
                          Liste des agents
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
                                                    <th>NIVEAU ETUDE</th>
                                                    <th>GRADE</th>
                                                    <th>DOMAINE FORMATION</th>
                                                    <th>DATE NAISSANCE</th>
                                                    <th>LIEU NAISSANCE</th>
                                                    <th>TELEPHONE</th>
                                                    <th>EMAIL</th>
                                                    <th>ETAT CIVIL</th>
                                                     <th>GENRE</th>
                                                    <th>PHOTO</th>
                                                    <th>Date de creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM tbl_agent INNER JOIN fonct ON tbl_agent.ref_fonction=fonct.id_fonction INNER JOIN domaine ON tbl_agent.ref_domaine=domaine.id_d INNER JOIN niveau ON tbl_agent.ref_niveau=niveau.id_n INNER JOIN grade ON tbl_agent.ref_grade=grade.id_g") ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>
                                                <tr>
                                                    <td><?= $g['id_d']; ?></td>
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?= $g['nniveau']; ?></td>
                                                   <td><?= $g['ngrade']; ?></td>
                                                   <td><?= $g['ndomaine']; ?></td>
                                                  <td><?= $g['date_naiss']; ?></td>
                                                   <td><?= $g['adresse']; ?></td>
                                                   <td><?= $g['numero_tel']; ?></td>
                                                   <td><?= $g['email']; ?></td>
                                                   <td><?= $g['etat_civil']; ?></td>
                                                   <td><?= $g['sexe']; ?></td>
                                                   <td><img class="mage" src="avatars/<?= $g['photo']; ?>"></td>

                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                     <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                                     <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
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

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau agent</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="nom_complet" placeholder="nom complet de l'agent" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="sexe" required="">
                                   <option value="Masculin">Masculin</option>
                                   <option value="Feminin">Feminin</option>
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="Numero de telephone" name="numero_tel" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="date" name="date_naiss" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="adresse" placeholder="Lieu naissance" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_fonction" required="">

                                   <option>-domaine-</option>
                                  <?php $fatu=$db->query("SELECT * FROM fonct"); ?>
                                                <?php while ($ff = $fatu->fetch()) { ?>
                                 
                                  <option value="<?= $ff['id_fonction']; ?>"><?= $ff['designation']; ?></option>
                                  <?php } ?>
                                   
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_domaine" required="">
                                   <option>-domaine-</option>
                                  <?php $rdom=$db->query("SELECT * FROM domaine"); ?>
                                                <?php while ($g = $rdom->fetch()) { ?>
                                 
                                  <option value="<?= $g['id_d']; ?>"><?= $g['ndomaine']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_grade" required="">
                                  <option>-grade-</option>
                                   <?php $recupgrade=$db->query("SELECT * FROM grade"); ?>
                                                <?php while ($grade = $recupgrade->fetch()) { ?>
                                   
                                   <option value="<?= $grade['id_g']; ?>"><?= $grade['ngrade']; ?></option>
                                   <?php } ?>
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_niveau" required="">
                                  <option>-niveau-</option>
                                  <?php $recupniveau=$db->query("SELECT * FROM niveau"); ?>
                                                <?php while ($niv = $recupniveau->fetch()) { ?>
                                  
                                  <option value="<?= $niv['id_n']; ?>"><?= $niv['nniveau']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="email" name="email" placeholder="Email" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="etat_civil" required="">
                                  <option>-etat civil-</option>
                                  <option value="celibataire">celibataire</option>
                                  <option value="mariee">mariee</option>
                                  <option value="divorce">divorce</option>
                                  <option value="">celibataire</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" name="img" required="" >
                                 
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