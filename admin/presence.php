<?php $date = date('Y-m-d'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta http-equiv="refresh" content="1"> -->
        <title>Rapport de presence du <?php echo "$date"; ?> </title>

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
			<?php 
        
      include 'part/_side.php'; 

       
      ?>
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
			    <h2>Presnces journalieres</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des presences du <?php echo "$date"; ?>
                          
                        </div>
                         
                         <a class="btn btn-primary" href="r.php">Voir le rapport</a>
                                    
                               
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>NOM COMPLET</th>
                                                    <th>STATUS</th>
                                                    <th>HEURE ARRIVE</th>
                                                    <th>HEURE SORTIE</th>
                                                    <th>DATE </th>
                                                    <!-- <th>DATE </th> -->
                                                    
                                                    
                                                    <th>PHOTO</th>
                                                    
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php

 $requete=$db->query("SELECT * FROM attendance LEFT JOIN tbl_agent ON attendance.STUDENTID=tbl_agent.STUDENTID WHERE LOGDATE='$date' ORDER BY TIMEOUT desc"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) {
                                                
                                                $val = '';
                                                if($g['TIMEIN'] == "")
                                                {
                                                  $val = '<label class="badge badge-danger">absent</label>';
                                                }
                                                else if($g['TIMEOUT'] == "")
                                                {
                                                  $val = '<label class="badge badge-danger">absent</label>';
                                                }else{
                                                  $val = '<label class="badge badge-success">present</label>';
                                                }
                                               
                                                
                                                ?>
                                                
                                                <tr>
                                                    
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?php echo $val; ?></td>
                                                  <td><?= $g['TIMEIN']; ?></td>
                                                   <td><?= $g['TIMEOUT']; ?></td>
                                                   
                                                   
                                                   <td><?= $g['LOGDATE']; ?></td> 
                                                   <!-- <td><?= $g['sexe']; ?></td> -->
                                                   <td><img class="mage" src="../avatars/<?= $g['photo']; ?>"></td>

                                                   
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

      
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>