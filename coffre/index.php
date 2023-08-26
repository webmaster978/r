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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
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
								<h2 class="margin-b-5">Mes taches</h2>
								<p class="text-muted">Total taches</p>
								<span class="float-right text-primary widget-r-m">0</span>
							</div>
							<div class="progress margin-b-10  progress-mini">
								<div style="width:0%;" class="progress-bar bg-primary"></div>
							</div>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">50%</p> -->
                        </div>
                    </div>
                </div>
				
                <div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Mes presences</h2>
								<p class="text-muted">Total presences</p>
								<span class="float-right text-indigo widget-r-m">0</span>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:0%;" class="progress-bar bg-indigo"></div>
							</div>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">450%</p> -->
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Mes conges</h2>
								<p class="text-muted">Total conger</p>
								<span class="float-right text-success widget-r-m">0</span>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:0%;" class="progress-bar bg-success"></div>
							</div>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">85%</p> -->
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">Demandes produits</h2>
								<p class="text-muted">Total demande produits</p>
								<span class="float-right text-warning widget-r-m">0</span>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:0%;" class="progress-bar bg-warning"></div>
							</div>
						<!-- 	<p class="text-muted float-left margin-b-0">Change</p>
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