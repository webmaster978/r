<?php include'../config/base.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/bootstrap.css">
   <style>
      
@import url('https://fonts.googleapis.com/css?family=Abel');

body {
   
background: #FCEEB5;
font-family: Abel, Arial, Verdana, sans-serif;
}
   </style>
</head>
<body onload="window.print(); window.close();">
<?php

    
$id_utilisateur = $_GET['id_utilisateur'];
// $req = $db->prepare('');
// $req->execute(array($id_card));


$card = $db->prepare("SELECT * FROM tbl_agent WHERE id_utilisateur =:id_utilisateur");
$card->execute([
    'id_utilisateur' => $id_utilisateur
]);
$carte = $card->fetch(PDO::FETCH_OBJ);


?>



 <div class="container">
     <div class="row">
        <div class="col-md-3">
           <img width="100px;" src="../assets/img/L.PNG" alt="">
        </div>
        <div class="col-md-6">
          <h1 class="text-primary text-center">UNIVERSITE DE GOMA</h1>
          <h1 class="text-primary text-center">UNIGOM</h1>
          <h1 class="text-primary text-center">B.P 204 GOMA</h1>
        </div>
        <div class="col-md-3">
        <img width="100px;" src="../assets/img/L.PNG" alt="">
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           <h1 class="text-center">Fiche de renseignement de l'agent</h1>
           <hr>
        </div>
     </div>
    
     
     <div class="row">
        <div class="col-md-8">
           <br>
           <br>
        <h2>NOMS : <?=ucwords($carte->nom_complet); ?></h2> <br>
       <h2>ETAT CIVIL : <?=ucwords($carte->etat_civil); ?></h2> <br>
       <h2>GENRE : <?=ucwords($carte->sexe); ?></h2> <br>
       <h2>LIEU DE NAISSANCE : <?=ucwords($carte->adresse); ?></h2> <br>
       <h2>DATE DE NAISSANCE : <?=ucwords($carte->date_naiss); ?></h2>

        </div>
        
        <div class="col-md-4">
            
        <img width="250px;" src="../avatars/<?=($carte->photo); ?>" alt="">
           <h2 style="text-align:center;">CODE : <?=($carte->STUDENTID); ?> </h2>
           <h2 style="text-align:center;">MATRICULE : <?=($carte->matricule); ?> </h2>
            
        </div>
     </div>
     <br>
     <div class="row">
        <div class="col-md-6">
        <h2>DOMAINE DE RECHERCHE : <?=ucwords($carte->ref_domaine); ?></h2> <br>
        <h2>DOAMINE DE FORMATION : <?=ucwords($carte->domaine); ?></h2> <br>
        <h2>CATEGORIE : <?=ucwords($carte->ref_fonct); ?></h2> <br>
        <h2>GRADE : <?=ucwords($carte->ref_grade); ?></h2> <br>
        <h2>NIVEAU ETUDE : <?=ucwords($carte->ref_niveau); ?></h2> <br>
        <h2>SERVICE : <?=ucwords($carte->service); ?></h2> <br>
        <h2>FONCTION : <?=ucwords($carte->fonction); ?></h2> <br>
        </div>
        
        <div class="col-md-6">
        <b> <h2>ADRESSE MAIL : <?=ucwords($carte->mail); ?></h2> <br>
        <h2>NUMERO DE TELEPHONE : <?=ucwords($carte->numero_tel); ?></h2> <br>
        <h2>ADRESSE D'ORIGINE : <?=ucwords($carte->adresseo); ?></h2> <br>
        <h2>ADRESSE LOCALE : <?=ucwords($carte->adressel); ?></h2> <br>
        <h2>DATE ANGAGEMENT : <?=ucwords($carte->datee); ?></h2> <br>
        <h2>ACTE ENGAGEMENT : <?=ucwords($carte->acte); ?></h2> <br>
        <h2>DATE ENREGISTREMENT : <?=ucwords($carte->created_at); ?></h2> <br>
</b>
        
            
        </div>
       
     </div>
     <div class="row">
        <div class="col-md-12">
        <h2>Observation : <?=ucwords($carte->obs); ?></h2> <br>
        </div>
     </div>

 </div>

 


    
</body>
</html>