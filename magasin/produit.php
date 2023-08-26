<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Magasin</title>

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
            <!--                        Topbar Start                            -->
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
            $nom = htmlspecialchars($_POST['nom']);
            $qte = htmlspecialchars($_POST['qte']);
            $prix = htmlspecialchars($_POST['prix']);
            $total = $prix * $qte;
            
            $check_query = "SELECT * FROM magasin WHERE nom=:nom 
            
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':nom'   =>  $nom
             
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Ce produit existe deja!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
                $req=$db->prepare('INSERT INTO magasin (nom,categorie,prix,qte,total) VALUES (:nom,:categorie,:prix,:qte,:total)');
   
                $res=$req->execute(array(
                    'nom' => $nom,
                    'categorie' => $categorie,
                    'prix' => $prix,
                    'qte' => $qte,
                    'total' => $total
                ));
                if ($res) {
                    echo "<script>
                        Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'materiel affecter avec success inserer avec success',
                            showConfirmButton: false,
                             timer: 1500
                           })
    
                    </script>";
                }else{
                     echo "<script>
                             Swal.fire({
                              icon: 'error',
                               title: 'Oops...',
                          text: 'Materiel non affecter!',
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
        <!--                        Navigation Start                        -->
        <!-- ============================================================== -->
        <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
        <!--                        Navigation End                          -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!--                        Content Start                           -->
        <!-- ============================================================== -->
        
        <div class="row page-header">
            <div class="col-lg-6 align-self-center ">
                <h2>Nos produits</h2>
                
            </div>
        </div>

        <section class="main-content">
             

            
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Nos produits en magasin
                          <div class="col" align="right">
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM</th>
                                                    <th>CATEFORIE</th>
                                                    <th>PRIX</th>
                                                    <th>QUANTITE</th>
                                                    <th>TOTAL</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM magasin"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>
                                                <tr>
                                                    <td><?= $g['id_mag']; ?></td>
                                                   <td><?= $g['nom']; ?></td>
                                                   <td><?= $g['categorie']; ?></td>
                                                   <td><?= $g['prix']; ?>$</td>
                                                   <td><?= $g['qte']; ?></td>
                                                  <td><?= $g['total']; ?>$</td>
                                                  
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
        <!--                        Content End                             -->
        <!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../partials/_scripto.php'; ?>

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau produit</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="nom" placeholder="Nom du produit" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="categorie" required="">
                                   <option>-categorie-</option>
                                   <option value="fournitur">Fourniture de bureau</option>
                                   
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="quantiter" name="qte" required="">
                              </div>
                              <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="prix" name="prix" required="">
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