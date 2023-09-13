<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Pegawai - Sekolah Anak Saleh</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>templates/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>templates/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="<?php echo base_url('');?>paud/guru/login/do_login" method="post">
        <h2 class="form-signin-heading">MASUK</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="NIP"  name="username" required autofocus>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
             <label class="checkbox">
                
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>
      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>templates/js/jquery.js"></script>
    <script src="<?php echo base_url();?>templates/js/bootstrap.min.js"></script>


  </body>
</html>
