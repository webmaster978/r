<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

		<a href="../../admin/" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span> Retour</a>
				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span> Inventaire</a>
				<a href="index.php?page=sales" class="nav-item nav-sales"><span class='icon-field'><i class="fa fa-coins"></i></span> Retrait</a>
				<a href="index.php?page=receiving" class="nav-item nav-receiving nav-manage_receiving "><span class='icon-field'><i class="fa fa-file-alt"></i></span> Stock</a>
				<a href="index.php?page=categories" class="nav-item nav-categories "><span class='icon-field'><i class="fa fa-list"></i></span> Categorie</a>
				<a href="index.php?page=types" class="nav-item nav-types "><span class='icon-field'><i class="fa fa-th-list"></i></span> Types</a>
				<a href="index.php?page=product" class="nav-item nav-product "><span class='icon-field'><i class="fa fa-boxes"></i></span> Produits</a>
				<a href="index.php?page=expired_product" class="nav-item nav-expired_product "><span class='icon-field'><i class="fa fa-list"></i></span>Produits expirer</a>
				<a href="index.php?page=supplier" class="nav-item nav- "><span class='icon-field'><i class="fa fa-truck-loading"></i></span> Fournisseur</a>
				
				
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
