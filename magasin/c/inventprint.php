<meta content="" name="descriptison">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

<body onload="window.print();">
<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center"><b>Inventaire</b></h4>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Nom du produit</th>
								<th class="text-center">Stock Entrer</th>
								<th class="text-center">Stock Sortie</th>
								<th class="text-center">Expirer</th>
								<th class="text-center">Stock Disponible</th>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$product = $conn->query("SELECT * FROM product_list r order by name asc");
								while($row=$product->fetch_assoc()):
								$inn = $conn->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = ".$row['id']);
								$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
								$out = $conn->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = ".$row['id']);
								$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;

								$ex = $conn->query("SELECT sum(qty) as ex FROM expired_product where product_id = ".$row['id']);
								$ex = $ex && $ex->num_rows > 0 ? $ex->fetch_array()['ex'] : 0;

								$available = $inn - $out- $ex;
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo $row['name'] ?> <sup><?php echo $row['measurement'] ?></sup></td>
									<td class="text-right"><?php echo $inn > 0 ? $inn : 0 ?></td>
									<td class="text-right"><?php echo $out > 0 ? $out : 0 ?></td>
									<td class="text-right"><?php echo $ex > 0 ? $ex : 0 ?></td>
									<td class="text-right"><?php echo $available ?></td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable()
	$('#new_receiving').click(function(){
		location.href = "index.php?page=manage_receiving"
	})
	$('.delete_receiving').click(function(){
		_conf("Are you sure to delete this data?","delete_receiving",[$(this).attr('data-id')])
	})
	function delete_receiving($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_receiving',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
</body>