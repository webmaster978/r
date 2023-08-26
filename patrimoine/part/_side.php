<?php	
 require '../config/database.php';
 if (!isset($_SESSION['PROFILE']['id_utilisateur']) || $_SESSION['PROFILE']['designation'] != 'patrimoine') {
	header('location:../');
 }
 else {
	$recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
	$recup_informations->execute([
		'id_utilisateur' => $_SESSION['PROFILE']['id_utilisateur']
	]);
	$user_infos = $recup_informations->fetch(PDO::FETCH_OBJ);
 }

?>
<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a class="admin-logo" href="dashboard">
							<h1>
								
								<img width="40px;" src="../assets/img/L.png" class="toggle-none hidden-xs">
							</h1>
						</a>				
						<div class="left-nav-toggle" >
							<a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
						</div>
						<div class="left-nav-collapsed" >
							<a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
						</div>
						<div class="search-form hidden-xs">
							
						</div>
						<ul class="list-inline top-right-nav">
							<li class="dropdown icons-dropdown d-none-m">
								<a class="dropdown-toggle " data-toggle="dropdown" href="#"><i class="fa fa-envelope"></i> <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div></a>
								
								<ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
									<li>
										<div class="dropdown-header">
											<a class="float-right" href="#"><small>View All</small></a> Messages
										</div>
										
										<div class="scrollDiv">
											<div class="notification-list">
											
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
													<img alt="" class="rounded-circle" src="assets/img/avtar-5.png" width="50">
													</span>
													<span class="notification-title">
													Hritik Doe 
													<label class="label label-warning float-right">Support</label>
													</span>
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a>
												
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown avtar-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
									<img alt="" class="rounded-circle" src="../avatars/<?= $user_infos->photo; ?>" width="30">
									<?= ucwords($user_infos->nom_complet); ?>
								</a>
								<ul class="dropdown-menu top-dropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 60px, 0px); top: 0px; left: 0px; will-change: transform;">
									
									<li>
										<a class="dropdown-item" href="profil"><i class="icon-user"></i> Profile</a>
									</li>
									
									<li class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item" href="../logout.php"><i class="icon-logout"></i> Deconnexion</a>
									</li>
								</ul>
							</li>
							
							
							
						</ul>
					</div>
				</div>
			</div>