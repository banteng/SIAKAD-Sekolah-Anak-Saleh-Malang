<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Login Siswa - Sekolah Anak Saleh</title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url(); ?>assets/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>
    <div class="login-form">
      <form action="<?php echo base_url('');?>siswa/login/do_login" method="post">
        <div class="top">
          <h1>Login</h1>
          <h4>Siswa</h4>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" class="form-control" name="username" placeholder="Username" required/>
            <i class="fa fa-user"></i>
            <?php echo form_error('username');?>
          </div>
          <div class="group">
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
            <i class="fa fa-key"></i>
            <?php echo form_error('password');?>
          </div><br>
          <button type="submit" name="login" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
    </div>

</body>
</html>