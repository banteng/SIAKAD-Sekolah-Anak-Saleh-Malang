<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Admin Panel - Login</title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url(); ?>assets/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>
    <div class="login-form">
      <form action="<?php echo base_url();?>index.php/login/login" method="post" name="login">
        <div class="top">
          <h1>Login</h1>
          <h4>Admin Panel</h4>
          <?php if($this->session->flashdata('status')): ?>
                    <div class="alert alert-<?php echo $this->session->flashdata('clr');?>" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo $this->session->flashdata('status');?>
                        </div>
                    <?php endif; ?>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" class="form-control" name="username" placeholder="Username" required/>
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
            <i class="fa fa-key"></i>
          </div><br>
          <button type="submit" name="login" value="Login" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
    </div>

</body>
</html>