
     <?php  

if (isset($_POST['submit'])) {
   function imgup()
{
  
  $url_img=basename($_FILES['img']['name']);
  $id_user=htmlspecialchars($_POST['id_user']);
 
$verif_img=getimagesize($_FILES['img']['tmp_name']);

  if (isset($_FILES['img']) AND $_FILES['img']['error']== 0){
if ($_FILES['img']['size'] <= 2000000){


$infosfichier = pathinfo($_FILES['img']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG','pdf');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['img']['tmp_name'],'../files/'.$url_img)){
   require '../config/base.php';
    $check_query = "SELECT * FROM dossier 
            WHERE id_user=:id_user
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':id_user'   =>  $id_user
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Ce dossier existe deja!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
  
            $req=$db->prepare('INSERT INTO dossier(id_user,photo,ida) VALUES (:id_user,:photo,:ida)');
            $req->execute(array(
            'photo' => $_FILES['img']['name'],
            'id_user' => $id_user,
            'ida' => $_SESSION['PROFILE']['nom_complet']
            
            ));
            
        
if ($req) {
  echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Agent inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
}else{
  echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'Agent non inserer!',
                     footer: ''
                      })
              </script>";
}
return true;

}
}
}
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