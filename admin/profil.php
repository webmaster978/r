<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:26:21 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil</title>
		<?php include '../partials/_linka.php'; ?>
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
        







		 <div class="row page-header"><div class="col-lg-6 align-self-center ">
			  <h2>Profile</h2>
				<ol class="breadcrumb">
					
					<li class="breadcrumb-item active">Profile</li>
				</ol></div></div>

        <section class="main-content">

            <div class="row">
                <div class="col-md-4">
                    <div class="widget white-bg">
                        <div class="padding-20 text-center">
						 <img alt="Profile Picture" width="140" class="rounded-circle mar-btm margin-b-10 circle-border " src="../avatars/<?= $user_infos->photo; ?>">
                            <p class="lead font-500 margin-b-0"><?= ucwords($user_infos->nom_complet); ?></p>
                            <p class="text-muted"><?= ucwords($user_infos->designation); ?></p>
                            <p class="text-muted">Code :<?=($user_infos->STUDENTID); ?></p>
                            <p class="text-muted">Matricule : <?=($user_infos->matricule); ?></p>
                            <!-- <p class="text-sm margin-b-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p> -->
                            <hr>
                            <ul class="list-unstyled margin-b-0 text-center row">
                                <li class="col-4">
                                    <span class="font-600">Domaine de recherche</span>
                                    <p class="text-muted text-sm margin-b-0"><?= ucwords($user_infos->ref_domaine); ?></p>
                                </li>
                                <li class="col-4">
                                    <span class="font-600">Grade</span>
                                    <p class="text-muted text-sm margin-b-0"><?= ucwords($user_infos->ref_grade); ?></p>
                                </li>
                                <li class="col-4">
                                    <span class="font-600">Niveau</span>
                                    <p class="text-muted text-sm margin-b-0"><?= ucwords($user_infos->ref_niveau); ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="col-8">
                <div class="tabs">
						<ul class="nav nav-tabs">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab" aria-selected="true">Timeline</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-selected="false">Profile</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#securite" aria-controls="securite" role="tab" data-toggle="tab" aria-selected="false">Mot de passe</a></li>
                       </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="timeline">
                                <div class="widget white-bg">
                                    <ul class="comments-list list-unstyled clearfix">
                                        <li class="clearfix">
                                            <img src="assets/img/avtar-2.png" alt="" width="70" class="rounded-circle circle-border">
                                            <div class="content">
                                                <div class="comments-header">
                                                    <strong>John Doe</strong>
                                                    <small class="text-muted">30 Minutes Ago</small>
                                                </div>
                                                <p>Lorem ipsum industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.</p>
												<ul class="list-inline row">
                                                    <li><a href="#">
                                                            <img alt="" src="assets/img/gallery/1s.jpg" class="img-fluid rounded" width="100">
                                                        </a></li>
                                                    <li><a href="#">
                                                            <img alt="" src="assets/img/gallery/2s.jpg" class="img-fluid rounded" width="100">
                                                        </a></li>
                                                    <li><a href="#">
                                                            <img alt="" src="assets/img/gallery/3s.jpg" class="img-fluid rounded" width="100">
                                                        </a></li>
                                                </ul>
												<ul class="list-inline row">
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-comments text-primary"></i> 94</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-thumbs-up text-danger"></i> 145</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-reply text-danger"></i> Reply</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                               <div class="widget white-bg">
                                    <div class="row">
                                            <div class="col-md-6 col-xs-6 b-r"> <strong>Nom complet</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->nom_complet); ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Contact</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->numero_tel); ?></p>
                                            </div>
                                           
                                           
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?= $user_infos->mail; ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Date de naissance</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->date_naiss); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Lieu de naissance</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->adresse); ?></p>
                                    </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Etat civil</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->etat_civil); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Fonction</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->fonction); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Categorie</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->ref_fonct); ?></p>
                                    </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Genre</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->sexe); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Service</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->service); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Date engagement</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->datee); ?></p>
                                    </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Acte engagement</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->acte); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Adresse local</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->adressel); ?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Adresse d'origine</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->adresseo); ?></p>
                                    </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-md-6 col-xs-6 b-r"> <strong>Observation</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->obs); ?></p>
                                    </div>
                                    <div class="col-md-6 col-xs-6 b-r"> <strong>Cotation</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->cotation); ?></p>
                                    </div>
                                   

                                    </div>
									
							  </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="securite">
                               <div class="widget white-bg">
                               <form action="upassword.php" method="POST">
                                    <div class="row">
                                           
                                           <div class="col-md-6 col-xs-6 b-r"> <strong>ancien mot de passe</strong>
                                                <br>
                                               <input class="form-control" type="text" name="lpassword" required="">
                                            </div>
                                            <div class="col-md-6 col-xs-6 b-r"> <strong>nouveau mot de passe</strong>
                                                <br>
                                                <input class="form-control" type="text" name="npassword">
                                            </div>
                                           
                                           
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                         <input class="btn btn-warning" type="submit" name="modif" value="Modifier">
                                      </div>
                                    </div>
                                    </form>
                                    <br>
                                    <div class="row">
                                     <div class="col-md-6 col-xs-6 b-r">
                                     <img width="200px;" src="../assets/img/L.png" alt="">
                                     </div>
                                     <div class="col-md-6 col-xs-6 b-r">
                                     <p>Pour toute reclamation veuillez contacter l'administrateur <a href="mailto:info@unigom.ac.cd">admin</a></p>
                                     </div>

                                           
                                    </div>
									
							  </div>
                            </div>

                        </div>
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

		
        <!-- Common Plugins -->
       <?php include '../partials/_scripta.php'; ?>
		
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:27:14 GMT -->
</html>