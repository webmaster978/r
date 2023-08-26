<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Liste des retraits</b>
			<button class="col-md-2 float-right btn btn-primary btn-sm" id="new_sales"><i class="fa fa-plus"></i> Nouveau retrait</button>
					</div>
					<div class="card-body">
						<table id="example" class="table table-striped table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Date</th>
								<th class="text-center">Reference #</th>
								<th class="text-center">Agent</th>
								<th class="text-center">Service</th>
								<th class="text-center">Action</th>
							</thead>
							<tbody>
							<?php 
								$customer = $conn->query("SELECT * FROM tbl_agent order by nom_complet asc");
								while($row=$customer->fetch_assoc()):
									$cus_arr[$row['id_agent']] = $row['nom_complet'];
								endwhile;
									$cus_arr[0] = "GUEST";

								$i = 1;
								$sales = $conn->query("SELECT * FROM sales_list INNER JOIN tbl_agent ON sales_list.customer_id=tbl_agent.id_utilisateur order by date(date_updated) desc");
								while($row=$sales->fetch_assoc()):
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo date("M d, Y",strtotime($row['date_updated'])) ?></td>
									<td class=""><?php echo $row['ref_no'] ?></td>
									<td class=""><?php echo $row['nom_complet'] ?></td>
									<td class=""><?php echo $row['service'] ?></td>
									<td class="text-center">
										<a class="btn btn-sm btn-warning" href="index.php?page=pos&id=<?php echo $row['id'] ?>">Modifier</a>
										<a class="btn btn-sm btn-danger delete_sales" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Effacer</a>
										
									</td>
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
	$('#new_sales').click(function(){
		location.href = "index.php?page=pos"
	})
	$('.delete_sales').click(function(){
		_conf("Etes vous sur de vouloir supprimer?","delete_sales",[$(this).attr('data-id')])
	})
	function delete_sales($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_sales',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Peoduits supprimer avec success",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>