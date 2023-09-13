<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>PAUD - Sekolah Anak Saleh Malang</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg {
            /* The image used */
            background: url('http://ids.sekolahanaksaleh.com/upload/cms/bg02.png') no-repeat center center fixed;

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Site Heading */
        .site-heading h3 {
            font-size: 40px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .border {
            background: #e8e8e8;
            height: 1px;
            width: 40%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 45px;
            float: left;
        }

        /* Feature-CSS */

        .icon {
            color: #fff;
            padding: 15px;
            background: #323232;
            font-size: 50px;
            border-radius: 90px;
            border: 10px solid #323232;

        }

        .feature-box {
            text-align: center;
            padding: 20px;
            transition: .5s;
            margin-bottom: 30px;
            border: 1px solid #e8e8e8;
            background: #90EE90;
        }

        .feature-box:hover {

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.60);
        }

        .feature-box h4 {
            font-size: 20px;
            font-weight: 600;
            margin: 25px 0 15px;
        }

    </style>
</head>

<body>
    <div class="bg">

        <div class="Features-section paddingTB60 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 site-heading ">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <h3 style="color:#3CB371;">Sekolah Anak Saleh Malang</h3>
                                    <p style="color:#3CB371;">Be Piously Great.</p>
                                </div>
                            </div>
                        </div>



                        <div class="border"></div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-6 col-md-3">
                        <div class="col-md-12 feature-box">
                            <img src="<?php echo base_url("upload/cms/logo.png");?>" width="100px" width="100px">
                            <h4>Administrator</h4>
                            <a href="<?php echo base_url("paud/admin/login");?>"><button type="button" class="btn btn-primary site-btn"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a>

                        </div>
                    </div> <!-- End Col -->
                    
                    <div class="col-sm-6 col-md-3">
                        <div class="col-md-12 feature-box">
                            <img src="<?php echo base_url("upload/cms/logo.png");?>" width="100px" width="100px">
                            <h4>Pegawai</h4>
                            <a href="<?php echo base_url("paud/guru/login");?>"><button type="button" class="btn btn-primary site-btn"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a>
                        </div>
                    </div> <!-- End Col -->

                    <div class="col-sm-6 col-md-3">
                        <div class="feature-box">
                            <img src="<?php echo base_url("upload/cms/logo.png");?>" width="100px" width="100px">
                            <h4>Siswa</h4>
                            <a href="<?php echo base_url("paud/siswa/login");?>"><button type="button" class="btn btn-primary site-btn"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a>
                        </div>
                    </div> <!-- End Col -->
                    
                    <div class="col-sm-6 col-md-3">
                        <div class="feature-box">
                            <img src="<?php echo base_url("upload/cms/logo.png");?>" width="100px" width="100px">
                            <h4>Keuangan</h4>
                            <a href="<?php echo base_url("paud/keuangan/login");?>"><button type="button" class="btn btn-primary site-btn"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a>
                        </div>
                    </div> <!-- End Col -->
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
