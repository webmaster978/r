<?php 
if (isset($_POST['submit'])) {
    extract($_POST);
    $lpassword = sha1($_POST['lpassword']);
    $npassword = htmlspecialchars($_POST['npassword']);
    
    
            $check_query = " SELECT * FROM authentification 
            WHERE password=:lpassword
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':lpassword'   =>  sha1($lpassword)
                        
          );
           if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
               $req=$db->prepare("UPDATE authentification SET password=:npassword WHERE ref_utilisateur=:ref_utilisateur");
               $res=$req->execute(array(
                   'npassword' => $npassword,
                   'ref_utilisateur' => $_SESSION['PROFILE']['id_utilisateur']
               ));
             }
        
          else
            {
            if ($statement->rowCount() == 0 ) {
  
 
  
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Mot de passe non changer!',
                         footer: ''
                          })
                  </script>";
  
  }
  }
  }
}



 ?>