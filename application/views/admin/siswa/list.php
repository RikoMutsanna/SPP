<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/siswa/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nisn</th>
										<th>Nis</th>
										<th>Nama</th>
										<th>ID Kelas</th>
										<th>Nama Kelas</th>
										<th>Alamat</th>
										<th>No Telepon</th>
										<th>ID Spp</th>
										<th>Nominal</th>	
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td>
											<?php echo $product->nisn ?>
										</td>
										<td>
											<?php echo $product->nis ?>
										</td>
										<td>
											<?php echo $product->nama ?>
										</td>
										<td>
											<?php echo $product->id_kelas ?>
										</td>
										<td>
											<?php echo $product->nama_kelas ?>
										</td>
										<td>
											<?php echo $product->alamat ?>
										</td>
										<td>
											<?php echo $product->no_telp ?>
										</td>
										<td>
											<?php echo $product->id_spp ?>
										</td>
										<td>
											<?php echo $product->nominal ?>
										</td>		
										<td width="250">
											<a href="<?php echo site_url('admin/siswa/edit/'.$product->nisn) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>	/ <a onclick="deleteConfirm('<?php echo site_url('admin/siswa/delete/'.$product->nisn) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
					
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
</body>

</html>