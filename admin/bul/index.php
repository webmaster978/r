<?php 
include('header.php');
?>
<title>Carte</title>
<link rel="stylesheet" href="css/style.css">
<script src="script/ajax_generate_code.js"></script>
<?php include('container.php');?>
	<div class="container">		
		<div class="row">
		<h2></div>
			<div class="col-md-3">
		        <form class="form-horizontal" method="post" id="codeForm" action="generate_code.php" onsubmit="return false">
		            <div class="form-group">
		            	<label class="control-label">Selectionner un agent : </label>
		            	<?php 
       include '../../config/database.php';
$requete=$db->query("SELECT * FROM tbl_agent"); ?>

                                            
		            	<select class="form-control" id="content" name="content">
		            		<?php while ($g = $requete->fetch()) { ?>  
		            		<option value="<?= $g['STUDENTID']; ?>"><?= $g['nom_complet']; ?></option>
							
		            		
		            		<?php } ?>
		            	</select>
		            	
		            </div>
		            <div class="form-group">
		            	<label class="control-label">Taille : </label>
		            	<select class="form-control col-xs-10" id="ecc">
		            		<option value="H">H - best</option>
		            		<option value="M">M</option>
		            		<option value="Q">Q</option>
		            		<option value="L">L - smallest</option>       		            
		            	</select>
		            </div>
		            <div class="form-group">
		            	<label class="control-label">Grandeur : </label>
		            	<input type="number" min="1" max="10" step="1" class="form-control col-xs-10" id="size" value="5">
		            </div>
		            <div class="form-group">
		            	<label class="control-label"></label>
		            	<input type="submit" name="submit" id="submit" class="btn btn-success" value="Generer">
		            </div>
		        </form>
	    	</div>
	    	<div class="col-md-6">
	    		<div class="showQRCode"></div>
	    	</div>
    	</div>
    
    	
    </div>
</div>	
<?php include('footer.php');?>
