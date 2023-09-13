<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="Sekolah Anak Saleh Malang, Sekolah Islam Malang, Sekolah Islam, Paud, Sekolah Paud, Paud Malang, PAUD Malang, Akreditasi, Soekarno Hatta">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $title;?></title>

    <link href="<?php echo base_url();?>templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>templates/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>templates/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    
    <!--<link href="<?php //echo base_url('templates/cubo/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">-->
      
    <link href="<?php echo base_url();?>templates/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/css/style-responsive.css" rel="stylesheet" />
      
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
      
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
          <a href="<?php echo base_url('paud/admin/dashboard'); ?>" class="logo"><img src="<?php echo base_url('');?>upload/cms/logo1.png" height="35px" width="35px"> Sekolah Anak Saleh Malang</a>
            <!--logo end-->
            
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username"><?php echo $this->session->userdata('nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                                <li><a href="<?php echo base_url('paud/admin/reset-password'); ?>"><i class=" icon-cog"></i>Reset Password</a></li>
                                <li><a href="#"><i class="icon-bell-alt"></i> Notifikasi</a></li>
                                <li><a href="#"><i class="icon-envelope"></i> Pesan</a></li>
                                <li><a href="<?php echo base_url('paud/admin/login/logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                                <!--<li><a href="<?php //echo base_url('admin/login/logout'); ?>"><i class="icon-key"></i> Log Out</a></li>-->
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="<?php echo base_url('paud/admin/dashboard'); ?>">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-laptop"></i>
                          <span>Data Master</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('paud/admin/pegawai'); ?>">Data Pegawai</a></li>
                          <li><a  href="<?php echo base_url('paud/admin/siswa/semua'); ?>">Data Siswa</a></li>
                          <li><a  href="<?php echo base_url('paud/admin/kelas'); ?>">Data Kelas</a></li>
                          <li><a  href="<?php echo base_url('paud/admin/mata-pelajaran'); ?>">Data Mata Pelajaran</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-archive"></i>
                          <span>Presensi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url('paud/admin/presensi-siswa'); ?>">Presensi Siswa</a></li>
                          <li><a  href="<?php echo base_url('paud/admin/presensi-manual-siswa'); ?>">Presensi Siswa Manual</a></li>
                          <li><a  href="<?php echo base_url('paud/admin/presensi-pegawai'); ?>">Presensi Pegawai</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-dollar"></i>
                          <span>Pembayaran</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>paud/admin/tagihan-spp">Tagihan SPP</a></li>
                          <!--<li><a  href="<?php echo base_url();?>paud/admin/pembayaran-lain">Biaya Lain</a></li>-->
                          <li><a  href="<?php echo base_url();?>paud/admin/kustom-spp">Kustom SPP Siswa</a></li>
                          <li><a  href="<?php echo base_url();?>paud/admin/buat-tagihan">Buat Tagihan</a></li>
                          <li><a  href="<?php echo base_url();?>paud/admin/data-tagihan">Data Tagihan</a></li>
                          <!--<li><a  href="<?php echo base_url();?>paud/admin/histori-tagihan">Histori Tagihan</a></li>-->
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-gears"></i>
                          <span>Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>paud/admin/tahun-ajaran">Tahun Ajaran</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-dollar"></i>
                          <span>Laporan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url();?>paud/admin/laporan-keuangan">Laporan Keuangan</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="<?php echo base_url('paud/admin/pengumuman'); ?>" >
                          <i class=" icon-bell-alt"></i>
                          <span>Pengumuman </span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url('paud/admin/pesan'); ?>" >
                          <i class="icon-envelope"></i>
                          <span>Pesan </span>
                      </a>
                  </li>
                  <!--<li>
                      <a href="<?php echo base_url('paud/admin/pengguna'); ?>" >
                          <i class="icon-user"></i>
                          <span>Pengguna </span>
                      </a>
                  </li>-->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <?php $this->load->view($page); ?>
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 &copy; YAYASAN PENDIDIKAN ANAK SALEH
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>templates/assets/advanced-datatable/media/js/jquery.js"></script>
    <script src="<?php echo base_url();?>templates/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url();?>templates/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url();?>templates/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>templates/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>templates/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>templates/js/respond.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript"   src="<?php echo base_url();?>templates/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/assets/bootstrap-daterangepicker/moment.min.js"></script>
    
    <script src="<?php echo base_url();?>templates/js/advanced-form-components.js"></script>
  <!--common script for all pages-->
    <script type="text/javascript" src="<?php echo base_url();?>templates/assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>templates/js/common-scripts.js"></script>
        
    <!--<script src="<?php //echo base_url('templates/cubo/jquery/jquery-2.2.3.min.js')?>"></script>  
    <script src="<?php //echo base_url('templates/cubo/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php //echo base_url('templates/cubo/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php //echo base_url('templates/cubo/datatables/js/dataTables.bootstrap.min.js')?>"></script>-->

    <script type="text/javascript">
      /* Formating function for row details */

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="<?php echo base_url();?>templates/assets/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#hidden-table-info thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#hidden-table-info tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#hidden-table-info').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#hidden-table-info tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "<?php echo base_url();?>templates/assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "<?php echo base_url();?>templates/assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
  </script>

    <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 0, "asc" ]]
              } );
          } );
      </script>

        <script>

            //owl carousel

            $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                    navigation : true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true,
                    autoPlay:true

                });
            });

            //custom select box

            $(function(){
                $('select.styled').customSelect();
            });

        </script>

        <script>
          $(function () {
          setNavigation();
          });

          function setNavigation() {
            var path = window.location.pathname;
            path = path.replace(/\/$/, "");
            path = decodeURIComponent(path);

            $(".nav a").each(function () {
                var href = $(this).attr('href');
                if (path.substring(0, href.length) === href) {
                    $(this).closest('li').addClass('active');
              }
            });
          }
        </script>

  </body>
</html>
