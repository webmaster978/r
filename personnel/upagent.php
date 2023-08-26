<?php 
include'../config/base.php';
if(isset($_POST['upuser'])){
    extract($_POST);
    
    
    $rec=$db->prepare("UPDATE tbl_agent SET nom_complet=:nom_complet,STUDENTID=:STUDENTID,sexe=:sexe,numero_tel=:numero_tel,date_naiss=:date_naiss,adresse=:adresse,ref_domaine=:ref_domaine,ref_fonct=:ref_fonct,domaine=:domaine,ref_grade=:ref_grade,ref_niveau=:ref_niveau,mail=:mail,etat_civil=:etat_civil,fonction=:fonction,service=:service,datee=:datee,acte=:acte,matricule=:matricule,adressel=:adressel,adresseo=:adresseo,obs=:obs WHERE id_utilisateur=:id_utilisateur");
    
    $res=$rec->execute(array(
    'nom_complet' => $nom_complet,
     'sexe' => $sexe,
     'numero_tel' => $numero_tel,
     'date_naiss' => $date_naiss,
     'ref_domaine' => $ref_domaine,
     'ref_grade' => $ref_grade,
     'ref_niveau' => $ref_niveau,
     'mail' => $mail,
     'domaine' => $domaine,
     'etat_civil' => $etat_civil,
     'ref_fonct' => $ref_fonct,
     'fonction' => $fonction,
     'service' => $service,
     'datee' => $datee,
     'acte' => $acte,
     'adresse' => $adresse,
     'matricule' => $matricule,
     'adressel' => $adressel,
     'adresseo' => $adresseo,
     'obs'=> $obs,
     'id_utilisateur' =>$id_utilisateur,
     'STUDENTID' => $STUDENTID
        
    ));
   
    
    if($res){
        
        header("location:agent");
    }else{
       
         header("location:agent");
    }
}
