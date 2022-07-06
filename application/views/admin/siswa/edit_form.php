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
						<a href="<?php echo site_url('admin/siswa/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/spp/add') ?>" method="post" enctype="multipart/form-data" >

							 <input type="hidden" name="id" value="<?php echo $product->nisn?>" />


						<div class="form-group">
								<label for="nis">Nis</label>
								<input class="form-control <?php echo form_error('nis') ? 'is-invalid':'' ?>"
								 type="text" name="nis"  value="<?php echo $product->nis?>"  />
								<div class="invalid-feedback">
									<?php echo form_error('nis') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama"  value="<?php echo $product->nama?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="id_kelas">ID Kelas</label>
								<select class="form-control <?php echo form_error('id_kelas') ? 'is-invalid':'' ?>"
								 type="text" name="id_kelas"   />
								  <option value ="">Choose</option>
								 <?php 
								foreach ($kelas as $prov) {
								echo "<option value='$prov[id_kelas]'>$prov[nama_kelas]</option>";
								}
								?>
								 </select>
								<div class="invalid-feedback">
									<?php echo form_error('id_kelas') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat"  value="<?php echo $product->alamat?>"  />
								
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="no_telp">Nomor Telepon</label>
								<input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>"
								 type="number" name="no_telp"  value="<?php echo $product->no_telp?>"  />
								
								<div class="invalid-feedback">
									<?php echo form_error('no_telp') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="id_spp">ID SPP</label>
								<select class="form-control <?php echo form_error('id_spp') ? 'is-invalid':'' ?>"
								 type="text" name="id_spp"  />
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