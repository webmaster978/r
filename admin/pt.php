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
           <h1 class="text-center">
                <?php

    
$service = $_GET['service'];
echo "$service";




?>

           </h1>
           <hr>
        </div>
     </div>
    
     
     <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th> Nom du Patrimoine</th>
                    <th> Quantite</th>
                    <th> Etat</th>
                    <th> Anne d'acquisition</th>
                </tr>
                <tbody>
                    <?php

    
$service = $_GET['service'];
// $req = $db->prepare('');
// $req->execute(array($id_card));


$card = $db->prepare("SELECT * FROM patrimoine WHERE service =:service");
$card->execute([
    'service' => $service
]);
$carte = $card->fetchAll(PDO::FETCH_OBJ);

foreach($carte as $s): 

?>
                <tr>
                    <td><?=$s->designation;?></td>
                    <td><?=$s->quantite;?></td>
                    <td><?=$s->etat;?></td>
                    <td><?=$s->created_at;?></td>
                </tr>
                <?php
                   endforeach;


                      ?>
                </tbody>
                
            </table>
           
        

        </div>
        
        
     </div>
     <br>
     
     

 </div>

 


    
</body>
</html>