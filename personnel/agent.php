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
   function imgup()
{
  
  $url_img=basename($_FILES['img']['name']);
  $nom_complet=htmlspecialchars($_POST['nom_complet']);
  $sexe=htmlspecialchars($_POST['sexe']);
  $numero_tel=htmlspecialchars($_POST['numero_tel']);
  $date_naiss=htmlspecialchars($_POST['date_naiss']);
  $adresse=htmlspecialchars($_POST['adresse']);
  $ref_fonct=htmlspecialchars($_POST['ref_fonct']);
  $ref_domaine=htmlspecialchars($_POST['ref_domaine']);
  $domaine = htmlspecialchars($_POST['domaine']);
  $ref_grade=htmlspecialchars($_POST['ref_grade']);
  $ref_niveau=htmlspecialchars($_POST['ref_niveau']);
  $email=htmlspecialchars($_POST['email']);
  $etat_civil=htmlspecialchars($_POST['etat_civil']);
  $pre = htmlspecialchars($_POST['pre']);
  $ee = htmlspecialchars($_POST['ee']);
  $STUDENTID=$pre.''.$ee;
  $fonction = htmlspecialchars($_POST['fonction']);
  $service = htmlspecialchars($_POST['service']);
  $datee = htmlspecialchars($_POST['datee']);
  $acte = htmlspecialchars($_POST['acte']);
  $matricule = htmlspecialchars($_POST['matricule']);
  $adressel = htmlspecialchars($_POST['adressel']);
  $adresseo =htmlspecialchars($_POST['adresseo']);
  $obs = htmlspecialchars($_POST['obs']);



$verif_img=getimagesize($_FILES['img']['tmp_name']);

  if (isset($_FILES['img']) AND $_FILES['img']['error']== 0){
if ($_FILES['img']['size'] <= 2000000){


$infosfichier = pathinfo($_FILES['img']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['img']['tmp_name'],'../avatars/'.$url_img)){
   require '../config/base.php';
    $check_query = "SELECT * FROM tbl_agent 
            WHERE nom_complet=:nom_complet AND fonction=:fonction
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':nom_complet' => $nom_complet,
             ':fonction' => $fonction
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Cet agent existe deja ou cette fonction est deja prise!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
  
            $req=$db->prepare('INSERT INTO tbl_agent(nom_complet,STUDENTID,photo,sexe,numero_tel,date_naiss,adresse,ref_fonct,ref_domaine,domaine,ref_grade,ref_niveau,mail,etat_civil,fonction,service,datee,acte,matricule,adressel,adresseo,obs) VALUES (:nom_complet,:STUDENTID,:photo,:sexe,:numero_tel,:date_naiss,:adresse,:ref_fonct,:ref_domaine,:domaine,:ref_grade,:ref_niveau,:mail,:etat_civil,:fonction,:service,:datee,:acte,:matricule,:adressel,:adresseo,:obs)');
            $req->execute(array(
            'photo' => $_FILES['img']['name'],
            'nom_complet' => $nom_complet,
            'STUDENTID' => $STUDENTID,
            'sexe' => $sexe,
            'numero_tel' => $numero_tel,
            'date_naiss' => $date_naiss,
            'adresse' => $adresse,
            'ref_fonct' => $ref_fonct,
            'ref_domaine' => $ref_domaine,
            'ref_grade' => $ref_grade,
            'ref_niveau' => $ref_niveau,
            'mail' => $email,
            'etat_civil' => $etat_civil,
            'fonction' => $fonction,
            'service' => $service,
            'datee' => $datee,
            'acte' => $acte,
            'matricule' => $matricule,
            'adressel' => $adressel,
            'adresseo' => $adresseo,
            'obs' => $obs,
            'domaine' => $domaine
            ));
            
        
if ($req) {
  echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Agent inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
}else{
  echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'Agent non inserer!',
                     footer: ''
                      })
              </script>";
}
return true;

}
}
}
}

}


      }

      else{

          unlink($_FILES['img']['tmp_name']);
          unset($_FILES['img']);



      }
    }


}



if(imgup()){



}
}
// var_dump($_FILES);

?>
<?php
 if(isset($_POST['dlt'])){
     extract($_POST);

     $delete=$db->prepare("DELETE FROM tbl_agent WHERE id_utilisateur=:id_utilisateur");

     $red=$delete->execute(array(
         'id_utilisateur' => $id_utilisateur
     ));
     if($red){
         echo" <script>
         Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Agent supprimer avec success',
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
                                                    <th>MATRICULE</th>
                                                    <th>CODE</th>
                                                    <th>NIVEAU ETUDE</th>
                                                    <th>GRADE</th>
                                                    <th>DOMAINE FORMATION</th>
                                                    <th>DOMAINE DE RECHERCHE</th>                                                   
                                                    <th>LIEU NAISSANCE</th>
                                                    <th>DATE NAISSANCE</th>
                                                    <th>TELEPHONE</th>
                                                    <th>ADRESSE LOCAL</th>
                                                    <th>ADRESSE ORIGINE</th>
                                                    <th>EMAIL</th>
                                                    <th>ETAT CIVIL</th>
                                                     <th>GENRE</th>
                                                     <th>CATEGORIE</th>
                                                     <th>SERVICE</th>
                                                     <th>FONCTION</th>
                                                     <th>OBS</th>
                                                     <th>COTATION</th>
                                                    <th>PHOTO</th>
                                                    
                                                    <th>Date de creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM tbl_agent"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>


                                               


                                                <div class="modal fade bs-example-modal-lg<?= $g['id_utilisateur']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Modifier  l'agent <?= $g['nom_complet']; ?></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 offset-5">
                           <img class="rounded-circle" width="100px;" src="../avatars/<?= $g['photo']; ?>" alt="">
                           </div>
                        </div>
                        <form action="upagent.php" method="POST">
                        
                          <input type="hidden" name="id_utilisateur" value="<?= $g['id_utilisateur']; ?>">
                          <input type="hidden" name="STUDENTID" value="<?= $g['STUDENTID']; ?>">
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="nom_complet" value="<?= $g['nom_complet']; ?>" placeholder="nom complet de l'agent" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="sexe" required="">
                                   <option value="<?= $g['sexe']; ?>"><?= $g['sexe']; ?></option>
                                   <option value="Masculin">Masculin</option>
                                   <option value="Feminin">Feminin</option>
                                 </select>
                              </div>
                               
                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="number" value="<?= $g['numero_tel']; ?>" placeholder="Numero de telephone" name="numero_tel" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="date" value="<?= $g['date_naiss']; ?>" name="date_naiss" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="adresse" value="<?= $g['adresse']; ?>" placeholder="Lieu naissance" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_fonct" required="">

                                   <option value="<?= $g['ref_fonct']; ?>"><?= $g['ref_fonct']; ?></option>
                                  <?php $fat=$db->query("SELECT * FROM fonct"); ?>
                                                <?php while ($f = $fat->fetch()) { ?>
                                 
                                  <option value="<?= $f['designation']; ?>"><?= $f['designation']; ?></option>
                                  <?php } ?>
                                   
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_domaine" required="">
                                   <option value="<?= $g['ref_domaine']; ?>"><?= $g['ref_domaine']; ?></option>
                                  <?php $rdo=$db->query("SELECT * FROM domaine"); ?>
                                                <?php while ($gog = $rdo->fetch()) { ?>
                                 
                                  <option value="<?= $gog['ndomaine']; ?>"><?= $gog['ndomaine']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_grade" required="">
                                  <option value="<?= $g['ref_grade']; ?>"><?= $g['ref_grade']; ?></option>
                                   <?php $recupg=$db->query("SELECT * FROM grade"); ?>
                                                <?php while ($grad = $recupg->fetch()) { ?>
                                   
                                   <option value="<?= $grad['ngrade']; ?>"><?= $grad['ngrade']; ?></option>
                                   <?php } ?>
                                 </select>
                              </div>
                              

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_niveau" required="">
                                  <option value="<?= $g['ref_niveau']; ?>"><?= $g['ref_niveau']; ?></option>
                                  <?php $recupn=$db->query("SELECT * FROM niveau"); ?>
                                                <?php while ($ni = $recupn->fetch()) { ?>
                                  
                                  <option value="<?= $ni['nniveau']; ?>"><?= $ni['nniveau']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="email" name="mail" value="<?= $g['mail']; ?>" placeholder="Email" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="etat_civil" required="">
                                  <option value="<?= $g['etat_civil']; ?>"><?= $g['etat_civil']; ?></option>
                                  <option value="celibataire">celibataire</option>
                                  <option value="marieé">marié</option>
                                  <option value="mariee">marie</option>
                                  <option value="divorce">divorce</option>
                                  <option value="celibataire">celibataire</option>
                                  <option value="veuf">veuf</option>
                                  <option value="veuve">veuve</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                              <input class="form-control" type="text" name="adresseo" value="<?= $g['adresseo']; ?>" required="" placeholder="adresse d'origine"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="service" value="<?= $g['service']; ?>" required="" placeholder="service">
                              </div>
                              <div class="col-md-6">
                              <input class="form-control" type="text" name="fonction" value="<?= $g['fonction']; ?>" required="" placeholder="fonction"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="domaine" value="<?= $g['domaine']; ?>" required="" placeholder="domaine de recherche">
                              </div>
                             
                              <div class="col-md-6">
                                <label for="">Date engagement</label>
                              <input class="form-control" type="date" name="datee" required="" value="<?= $g['datee']; ?>" placeholder="date engagement"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <label for="">Matricule</label>
                                <input class="form-control" type="text" name="matricule" value="<?= $g['matricule']; ?>" required="" placeholder="matricule">
                              </div>
                              <div class="col-md-6">
                              <input class="form-control" type="text" name="acte" required="" value="<?= $g['acte']; ?>" placeholder="acte d'engagement"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="adressel" value="<?= $g['adressel']; ?>" required="" placeholder="adresse local">
                              </div>
                              
                              

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-12">
                                <input class="form-control" type="text" name="obs" value="<?= $g['obs']; ?>" required="" placeholder="observation">
                              </div>
                              

                          </div>
                          <br>
                           
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="upuser" class="btn btn-warning">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    <div class="modal fade" id="exampleModal<?= $g['id_utilisateur']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier la photo de <?= $g['nom_complet']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="uppicture.php" method="POST" enctype="multipart/form-data">
     <div class="modal-body">
        <input type="hidden" name="id_utilisateur" value="<?= $g['id_utilisateur']; ?>">
        <input type="file" name="img">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="submit" name="submit" class="btn btn-warning">Modifier</button>
      </div>
     </form>
    </div>
  </div>
</div>

    <div class="modal fade" id="exampleM<?= $g['id_utilisateur']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleM">Suppression de <?= $g['nom_complet']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="del.php" method="POST">
     <div class="modal-body">
        <input type="hidden" name="id_utilisateur" value="<?= $g['id_utilisateur']; ?>">
        <h2>Etes vous sur de vouloir modifier <?= $g['nom_complet']; ?> ??? </h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="submit" name="dlt" class="btn btn-warning">Supprimer</button>
      </div>
     </form>
    </div>
  </div>
</div>
 
      






                                                
                                                <tr>
                                                    <td><?= $g['id_utilisateur']; ?></td>

                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?= $g['matricule']; ?></td>
                                                   <td><?= $g['STUDENTID']; ?></td>
                                                   <td><?= $g['ref_niveau']; ?></td>
                                                   <td><?= $g['ref_grade']; ?></td>
                                                   <td><?= $g['domaine']; ?></td>
                                                   <td><?= $g['ref_domaine']; ?></td>
                                                   <td><?= $g['adresse']; ?></td>
                                                  <td><?= $g['date_naiss']; ?></td>
                                                   <td><?= $g['numero_tel']; ?></td>
                                                   <td><?= $g['adressel']; ?></td>
                                                   <td><?= $g['adresseo']; ?></td>
                                                   <td><?= $g['mail']; ?></td>
                                                   <td><?= $g['etat_civil']; ?></td>
                                                   <td><?= $g['sexe']; ?></td>
                                                   <td><?= $g['ref_fonct']; ?></td>
                                                   <td><?= $g['service']; ?></td>
                                                   <td><?= $g['fonction']; ?></td>
                                                   <td><?= $g['obs']; ?></td>
                                                   <td><?= $g['cotation']; ?></td>
                                                   <td><img class="mage" src="../avatars/<?= $g['photo']; ?>"></td>

                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                   <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg<?= $g['id_utilisateur']; ?>"><i class="fa fa-pencil"></i></button>
                                                   
                                                   <button type="button" class="btn btn btn-success" data-toggle="modal" data-target="#exampleModal<?= $g['id_utilisateur']; ?>">
<i class="fa fa-picture-o"></i>
</button>
<button type="button" class="btn btn btn-success" data-toggle="modal" data-target="#exampleM<?= $g['id_utilisateur']; ?>">
<i class="fa fa-trash"></i>
</button>
                                                        
                                                  
                                                     <a class="btn btn-primary" href="view?id_utilisateur=<?= $g['id_utilisateur']; ?>"><i class="fa fa-print"></i></a>
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

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau agent</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <?php  $pu = $db->query('SELECT COUNT(*) AS id_utilisateur FROM tbl_agent');  ?>
                  <?php while ($a= $pu->fetch())  { ?>
                    <input type="hidden" name="ee" value="<?=$a['id_utilisateur'];?>">
                  <?php  } ?>
                  <input type="hidden" name="pre" value="UNIGOM-">
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
                                  <label>Date de naissance</label>
                                 <input class="form-control" type="date" name="date_naiss" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                               
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="adresse" placeholder="Lieu naissance" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_fonct" required="">

                                   <option>-Categorie-</option>
                                  <?php $fatu=$db->query("SELECT * FROM fonct"); ?>
                                                <?php while ($ff = $fatu->fetch()) { ?>
                                 
                                  <option value="<?= $ff['designation']; ?>"><?= $ff['designation']; ?></option>
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
                                 
                                  <option value="<?= $g['ndomaine']; ?>"><?= $g['ndomaine']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_grade" required="">
                                  <option>-grade-</option>
                                   <?php $recupgrade=$db->query("SELECT * FROM grade"); ?>
                                                <?php while ($grade = $recupgrade->fetch()) { ?>
                                   
                                   <option value="<?= $grade['ngrade']; ?>"><?= $grade['ngrade']; ?></option>
                                   <?php } ?>
                                 </select>
                              </div>
                              

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_niveau" required="">
                                  <option>-niveau d'etude-</option>
                                  <?php $recupniveau=$db->query("SELECT * FROM niveau"); ?>
                                                <?php while ($niv = $recupniveau->fetch()) { ?>
                                  
                                  <option value="<?= $niv['nniveau']; ?>"><?= $niv['nniveau']; ?></option>
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
                                  <option value="marié(e)">marié(e)</option>
                                  <option value="divorcé(é)">divorcé(e)</option>
                                  <option value="celibataire">celibataire</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                              <input class="form-control" type="text" name="adresseo" required="" placeholder="adresse d'origine"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="service" required="" placeholder="service">
                              </div>
                              <div class="col-md-6">
                              <input class="form-control" type="text" name="fonction" required="" placeholder="fonction"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="domaine" placeholder="domaine de recherche">
                              </div>
                              <div class="col-md-6">
                                  <label>Date d'engagement</label>
                              <input class="form-control" type="date" name="datee" required="" placeholder="date engagement"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="matricule" required="" placeholder="matricule">
                              </div>
                              <div class="col-md-6">
                              <input class="form-control" type="text" name="acte" required="" placeholder="acte d'engagement"> 
                              </div>

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="adressel" required="" placeholder="adresse local">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" name="img" required="" >
                                 
                              </div>
                              

                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-12">
                                <input class="form-control" type="text" name="obs" placeholder="observation">
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