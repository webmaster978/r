<?php 
include'../config/base.php';

if(isset($_POST['modif'])){
    extract($_POST);
    $rec=$db->prepare("UPDATE demande SET status=:status WHERE id_dem=:id_dem");
    $res=$rec->execute(array(
        'status' => $status,
        'id_dem' => $id_dem
        
    ));
    if($res){
        $requete=$db->prepare("");
    }else{
        echo'err';
        header("location:demande");
    }
}




?>