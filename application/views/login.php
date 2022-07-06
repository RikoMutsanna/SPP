<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
   <link rel="stylesheet" type="text/css" href="\Ujikom\plugins/sweetalert2/sweetalert2.css">
    <script type="text/javascript" src="\Ujikom\plugins/sweetalert2/sweetalert2.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Pembayaran SPP</b></a>
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>
<?php if(isset($error)) { echo $error; }; ?>
    <?php
   if($this->session->flashdata('message1')){ 
  echo '<div class="alert alert-danger">'.$this->session->flashdata('message1').'</div>';
}
?>
      <form action="<?php echo base_url() ?>index.php/login" method="post">
        <div class="input-group mb-3">
       
          <input type="text" class="form-control" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Gak Boleh Kosong')" oninput="setCustomValidity('')">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <?php if(isset($error)) { echo $error; }; ?>
    <?php
   if($this->session->flashdata('message2')){ 
  echo '<div class="alert alert-danger">'.$this->session->flashdata('message2').'</div>';
}
?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Gak Boleh Kosong')" oninput="setCustomValidity('')">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="<?php echo site_url("login_siswa")?>" class="btn btn-block btn-primary">
          <i class="fas fa-users"></i> Sebagai Siswa
        </a>
      </div>
      <!-- /.social-auth-links -->

     
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php $this->load->view("admin/_partials/footer.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
