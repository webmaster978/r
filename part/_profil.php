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
               
                <li class="nav-item" role="presentation"><a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-selected="false">Profile</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#securite" aria-controls="securite" role="tab" data-toggle="tab" aria-selected="false">Mot de passe</a></li>
           </ul>

            <div class="tab-content">
               
                <div role="tabpanel" class="tab-pane active" id="profile">
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