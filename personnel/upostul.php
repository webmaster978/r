<?php 
include'../config/base.php';

if(isset($_POST['submit'])){
    extract($_POST);
    $rec=$db->prepare("UPDATE candidat SET decision=:decision WHERE id_can=:id_can");
    $res=$rec->execute(array(
        'id_can' => $id_can,
        'decision' => $decision
        
    ));
    if($res){
        header("location:candidat");
    }else{
        echo'err';
         header("location:candidat");
    }
}




?>