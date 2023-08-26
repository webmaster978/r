<?php 
include'../config/base.php';

if(isset($_POST['submit'])){
    extract($_POST);
    $rec=$db->prepare("UPDATE souscrir SET observation=:observation WHERE id_souscrit=:id_souscrit");
    $res=$rec->execute(array(
        'id_souscrit' => $id_souscrit,
        'observation' => $observation
        
    ));
    if($res){
        header("location:souscrit");
    }else{
        echo'err';
         header("location:souscrit");
    }
}




?>