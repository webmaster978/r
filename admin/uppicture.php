<?php  

if (isset($_POST['submit'])) {
   function imgup()
{
  
  $url_img=basename($_FILES['img']['name']);
  $id_utilisateur = htmlspecialchars($_POST['id_utilisateur']);
$verif_img=getimagesize($_FILES['img']['tmp_name']);

  if (isset($_FILES['img']) AND $_FILES['img']['error']== 0){
if ($_FILES['img']['size'] <= 20000000){


$infosfichier = pathinfo($_FILES['img']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['img']['tmp_name'],'../avatars/'.$url_img)){
   require '../config/base.php';
   
  
            $req=$db->prepare('UPDATE tbl_agent SET photo=:photo WHERE id_utilisateur=:id_utilisateur');
            $req->execute(array(
            'photo' => $_FILES['img']['name'],
            'id_utilisateur' => $id_utilisateur
            ));
            
        
if ($req) {
    // echo'valider';
    header('location:agent');
}else{
    // echo'err';
    header('location:agent');
}
return true;


}

}


      }

      else{

          unlink($_FILES['img']['tmp_name']);
          unset($_FILES['img']);



      }
    }


}



if(imgup()){



}
}
// var_dump($_FILES);

?>