<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:26:21 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
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
		<div class="row page-header">
				<div class="col-lg-6 align-self-center ">
				  <h2>Dashboard</h2>
					<ol class="breadcrumb">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
 -->						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
				<!-- <div class="col-lg-6 align-self-center text-right">
					<a href="#" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Create New</a>
				</div> -->
		</div>
		
        <section class="main-content">
            <div class="row w-no-padding margin-b-30">
			
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Agents</h2>
								<p class="text-muted">Total Agents</p>
								<?php

$com = $db->query("SELECT COUNT(*) AS id_utilisateur FROM tbl_agent"); 
?>
<?php while ($m= $com->fetch())  {?>
								<span class="float-right text-primary widget-r-m"><?=$m['id_utilisateur'];?></span>
								
							</div>
							<div class="progress margin-b-10  progress-mini">
								<div style="width:<?=$m['id_utilisateur'];?>%;" class="progress-bar bg-primary"></div>
							</div>
							<?php } ?>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">50%</p> -->
                        </div>
                    </div>
                </div>
				
                <div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Dossiers</h2>
								<p class="text-muted">Total dossiers</p>
								<?php

$doc = $db->query("SELECT COUNT(*) AS id_fil FROM dossier"); 
?>
<?php while ($mm= $doc->fetch())  {?>
								<span class="float-right text-primary widget-r-m"><?=$mm['id_fil'];?></span>
							
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:<?=$mm['id_fil'];?>%;" class="progress-bar bg-indigo"></div>
							</div>
							<?php } ?>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">450%</p> -->
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Agents en conger</h2>
								<p class="text-muted">Conger</p>
								<?php

$cong = $db->query("SELECT COUNT(*) AS id_co FROM conger WHERE status='in'"); 
?>
<?php while ($conger= $cong->fetch())  {?>
								<span class="float-right text-primary widget-r-m"><?=$conger['id_co'];?></span>
							
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:<?=$conger['id_co'];?>%;" class="progress-bar bg-indigo"></div>
							</div>
							<?php } ?>
							
							
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">85%</p> -->
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Taches</h2>
								<p class="text-muted">Total taches</p>
								<span class="float-right text-warning widget-r-m">0</span>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:1%;" class="progress-bar bg-warning"></div>
							</div>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">38%</p> -->
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