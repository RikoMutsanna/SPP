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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pembayaran/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/pembayaran/edit') ?>" method="post" enctype="multipart/form-data" >

						 <input type="hidden" name="id" value="<?php echo $product->id_bayar?>" />

							<div class="form-group">
								<label for="id_petugas">ID Petugas</label>
								<select class="form-control <?php echo form_error('id_petugas') ? 'is-invalid':'' ?>"
								 type="text" name="id_petugas"   />
								 <option value ="">Choose</option>
								 <?php 
								foreach ($petugas as $prov) {
								echo "<option value='$prov[id_petugas]'>$prov[id_petugas]</option>";
								}
								?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('id_petugas') ?>
								</div>
							</div>


						<div class="form-group">
								<label for="nisn">NISN</label>
								<select class="form-control <?php echo form_error('nisn') ? 'is-invalid':'' ?>"
								 type="text" name="nisn"   />
								  <option value ="">Choose</option>
								 <?php 
								foreach ($siswa as $prov) {
								echo "<option value='$prov[nisn]'>$prov[nama]</option>";
								}
								?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('nisn') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="tgl_bayar">Tanggal Bayar</label>
								<input class="form-control <?php echo form_error('tgl_bayar') ? 'is-invalid':'' ?>"
								 type="text" name="tgl_bayar"  value="<?php echo $product->tgl_bayar?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tgl_bayar') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="bulan_dibayar">Bulan Bayar</label>
								<input class="form-control <?php echo form_error('bulan_dibayar') ? 'is-invalid':'' ?>"
								 type="text" name="bulan_dibayar"  value="<?php echo $product->bulan_dibayar?>" />
								<div class="invalid-feedback">
									<?php echo form_error('bulan_dibayar') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tahun_dibayar">Tahun Dibayar </label>
								<input class="form-control <?php echo form_error('tahun_dibayar') ? 'is-invalid':'' ?>"
								 type="text" name="tahun_dibayar"  value="<?php echo $product->tahun_dibayar?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tahun_dibayar') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="id_spp">ID SPP</label>
								<select class="form-control <?php echo form_error('id_spp') ? 'is-invalid':'' ?>"
								 type="text" name="id_spp"   />
								  <option value ="">Choose</option>
								 <?php 
								foreach ($spp as $prov) {
								echo "<option value='$prov[id_spp]'>$prov[nominal]</option>";
								}
								?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('id_spp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jumlah_bayar">Jumlah Bayar</label>
								<input class="form-control <?php echo form_error('jumlah_bayar') ? 'is-invalid':'' ?>"
								 type="text" name="jumlah_bayar"  value="<?php echo $product->jumlah_bayar?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_bayar') ?>
								</div>
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>