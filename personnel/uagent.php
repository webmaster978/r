<?php 
include'../config/base.php';

if(isset($_POST['modif'])){
    extract($_POST);
    $rec=$db->prepare("UPDATE tbl_agent SET nom_complet=:nom_complet,STUDENTID=:STUDENTID,sexe=:sexe,numero_tel=:numero_tel,date_naiss=:date_naiss,adresse=:adresse,ref_domaine=:ref_domaine,ref_grade=:ref_grade,ref_niveau=:ref_niveau,mail=:mail,etat_civil=:etat_civil WHERE id_utilisateur=:id_utilisateur");
    $res=$rec->execute(array(
        'nom_complet' => $nom_complet,
        'sexe' => $sexe,
        'STUDENTID' => $STUDENTID,
        'numero_tel' => $numero_tel,
        'date_naiss' => $date_naiss,
        'adresse' => $adresse,
        'ref_domaine' => $ref_domaine,
        'ref_grade' => $ref_grade,
        'ref_niveau' => $ref_niveau,
        'mail' => $mail,
        'etat_civil' => $etat_civil,
        'id_utilisateur' => $id_utilisateur
    ));
    if($res){
        header("location:agent");
    }else{
        header("location:agent");
    }
}




?>