<?php include'../config/base.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title></title>
  
  <link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="card.css">
<style type="text/css">
  body {
  display: flex;
}

@media (orientation: landscape) {
  body {
    flex-direction: row;

  }
}
</style>

</head>


<body onload="window.print(); window.close();">
  

<?php

    
    $id_card = $_GET['id_card'];
    // $req = $db->prepare('');
    // $req->execute(array($id_card));


    $card = $db->prepare("SELECT * FROM card INNER JOIN tbl_agent ON card.STUDENTID=tbl_agent.STUDENTID WHERE id_card =:id_card");
	$card->execute([
		'id_card' => $id_card
	]);
	$carte = $card->fetch(PDO::FETCH_OBJ);


    ?>

<div>
<br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

 <div class="row">
<div class="col-md-2">
<img width="100px;" src="img/L.PNG" alt="">
</div>
<div class="col-md-8">
<h1 class="text-primary text-center">UNIVERSITE DE GOMA</h1>
<h1 class="text-primary text-center">UNIGOM</h1>
<h3 class="text-center">PAX EX SCIENTIA SPLENDEAT</h3>
</div>
<div class="col-md-2">
<img width="100px;" src="img/dddd.PNG" alt="">
</div>
 </div>

 <div class="row">
   <div class="col-md-12">
       <div class="text-center">
  <h3 class="text-primary">B.P.204 Goma,Rep.Démocratique du congo</h3>
  <hr>
  </div>
  
   </div>
 </div>
 <div class="row">
   <div class="col-md-12">
    <div class="text-center">
  <h3 class="text-primary">CARTE DE SERVICE NUMERO <?=($carte->STUDENTID); ?></h3>
  </div>
   </div>
 </div>
 
 <div class="row">
 <div class="col-md-6">
 
 
 <h3> Nom complet : <?=ucwords($carte->nom_complet); ?></h3>
 <h3> Date & lieu de naissance : <?=ucwords($carte->date_naiss); ?>,<?=ucwords($carte->adresse); ?></h3>
 <h3> Service : <?=ucwords($carte->service); ?></h3>
 <h3> Fonction : <?=ucwords($carte->fonction); ?></h3>
 <h3> Grade : <?=ucwords($carte->ref_grade); ?></h3>
 
 
 <h3 style="text-align:center;"> Fait a Goma le <?=ucwords($carte->created_at); ?></h3>
 <h3 class="text_primary" style="text-align:center;"> Le secretaire Generale Administratif</h3>
 <?php $requete=$db->query("SELECT * FROM signateur"); ?>
   <?php while ($g = $requete->fetch()) { ?>
    <div class="row">
      <div class="col-md-4 offset-4">
      <img width="100px;" src="../sign/<?= $g['photo']; ?>">
      </div>
    </div>
   

    <?php } ?>
    <?php $req=$db->query("SELECT * FROM signateur INNER JOIN tbl_agent ON signateur.ref_user=tbl_agent.id_utilisateur"); ?>
   <?php while ($gage = $req->fetch()) { ?>
    <div class="row">
      <div class="col-md-12">
      <h3 class="text-primary text-center" style="text-decoration:underline" class="text_center"><?= $gage['nom_complet']; ?></h3>
        <h3 class=" text-primary text-center"><?= $gage['ref_grade']; ?></h3>
      </div>
    </div>
    <?php } ?>
 </div>
 <div class="col-md-2">
   
 </div>
 <div clas="col-md-4">
  <img width="200px;" src="../avatars/<?=($carte->photo); ?>" alt="">
   
  <h3 style="text-align:center;">Matricule</h3>
  <h3 style="text-align:center;"><?=($carte->matricule); ?></h3>
  <h5 class="text-danger text-center">Valide pour 2 ans</h5>
 </div>
 </div>
 <hr>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <div class="row">
<div class="col-md-12">
<h1 class="text-primary text-center">UNIVERSITE DE GOMA</h1>
<h1 class="text-primary text-center">www.unigom.ac.cd</h1>
<h1 class="text-primary text-center">B.P 204 Goma,Rep.Democratique du congo</h1>
<hr class="danger">

</div>
 </div>
 <div class="row">
   <br>
   <br>
   <div class="col-md-6">
   <img width="400px;" src="bul/codes/<?=($carte->codeFile); ?>">
   <br>
   <br>
   <br>
   

   </div>
   
   
   <div class="col-md-6">
    
    <br>
    <br>
    <img width="200px;" style="margin-left:200px;" src="../assets/img/L.png" alt="">
    
   </div>

 </div>
 <h1 style="font-size:90px;" class="text-danger text-center">LAISSER PASSER</h1>

 <div class="row">
   <div class="col-md-12">
 <h2 class="text-center"> LES AUTORITES TANTS CIVILES, QUE MILITAIRE SONT PRIEES D'APPORTER LEUR ASSISATNACE AU PORTEUR DE LA PRESENTE EN CAS DE NECESSITE </h2>
   </div>
 </div>

</div>

</body>
</html>