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
						<a href="<?php echo site_url('admin/pembayaran/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										
										<th>ID Petugas</th>
										<th>Nama Petugas</th>
										<th>NISN</th>
										<th>Nama</th>
										<th>Tanggal Bayar</th>
										<th>Bulan Bayar</th>
										<th>Tahun Bayar</th>
										<th>ID SPP</th>
										<th>Nominal</th>
										<th>Jumlah Bayar</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td>
											<?php echo $product->id_petugas ?>
										</td>
										<td>
											<?php echo $product->nama_petugas ?>
										</td>
										<td>
											<?php echo $product->nisn ?>
										</td>
										<td>
											<?php echo $product->nama ?>
										</td>
										<td>
											<?php echo $product->tgl_bayar ?>
											</td>
										<td class="small">
											<?php echo $product->bulan_dibayar ?>
											</td>
											<td>
												<?php echo $product->tahun_dibayar ?>
											</td>
											<td>
												<?php echo $product->id_spp ?>
											</td>
											<td>
												<?php echo $product->nominal ?>
											</td>
											<td>
												<?php echo $product->jumlah_bayar ?>
											</td>
											
										<td width="250">
											<a href="<?php echo site_url('admin/pembayaran/edit/'.$product->id_bayar) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>	/ <a onclick="deleteConfirm('<?php echo site_url('admin/pembayaran/delete/'.$product->id_bayar) ?>')"
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