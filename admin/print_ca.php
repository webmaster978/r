<?php
include '../partials/_linko.php';

  $db=mysqli_connect("localhost","root","","rh_manager");

// if(isset($_POST["from_date"], $_POST["to_date"]))  
//  {

function generateRow($db){

       
      $contents = ''; 
      $query = "  
             SELECT * FROM tbl_agent WHERE id_utilisateur=2
      ";  
      $result = $db->query($query);
      $number=mysqli_num_rows($result);
 
      if ($number>0) {
         
        while ($row= $result->fetch_assoc()) {
           
                
                  $contents .= '
                       
                          
                          <div class="row">
                          <br>
                          <br>
                          <div class="col-md-6">
                             '.$row['nom_complet'].'
                          <br>
                          <br>
                          <br>
                         
                          Recteur
                          </div>
                          <div class="col-md-6">
                           <h4>REPUBLIQUE DEMOCRATIQUE DU CONGO</h4>
                          
                           <h2 style="text-align:center">Laissez-passer</h2>
                           <p>Les autorites tant Civils que Militaires et ce;;es de ;a police nationale sont priees d apporter leur secours au porteur de la presente en cas de necessite</p>
                          </div>
                       
                       
                        ';
                 
             
           
         }
       }

       elseif($number==0) 
            {  
                 $contents .=' 
                      <tr>  
                           <td colspan="9" style="color: red;text-align: center; ">Aucune donnees trouver</td>  
                      </tr>
                      ';  
                   
            }
       
        
      return $contents;


      } 


      require_once('../tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
     $pdf->SetTitle('FICHE ');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = ''; 

    $content .= '
                
        
         <div class="col-md-6">
                           <h4>REPUBLIQUE DEMOCRATIQUE DU CONGO</h4>
                          
                           <h2 style="text-align:center">Laissez-passer</h2>
                           <p>Les autorites tant Civils que Militaires et ce;;es de ;a police nationale sont priees d apporter leur secours au porteur de la presente en cas de necessite</p>
                          </div>
        
      ';  
    $content .= generateRow($db);  
    // $content .= '';  
    $pdf->writeHTML($content);  
    $pdf->Output('candidats.pdf', 'I');    
// }  
?>