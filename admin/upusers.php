<?php 
include'../config/base.php';

if(isset($_POST['submit'])){
    extract($_POST);
    $rec=$db->prepare("UPDATE authentification SET username=:username,password=:password,email=:email WHERE id_authentification=:id_authentification");
    $res=$rec->execute(array(
        'id_authentification' => $id_authentification,
        'password' => $password,
        'email' => $email,
        'username' => $username
        
    ));
    if($res){
        
        header("location:user");
    }else{
        echo'err';

         header("location:user");
    }
}




?>