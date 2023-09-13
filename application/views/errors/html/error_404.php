<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .navbar {
          min-height: 80px;
        }

        .navbar-brand {
          padding: 0 15px;
          height: 80px;
          line-height: 80px;
        }

        .navbar-toggle {
          /* (80px - button height 34px) / 2 = 23px */
          margin-top: 23px;
          padding: 9px 10px !important;
        }

        @media (min-width: 768px) {
          .navbar-nav > li > a {
            /* (80px - line-height of 27px) / 2 = 26.5px */
            padding-top: 26.5px;
            padding-bottom: 26.5px;
            line-height: 27px;
          }
        }  
    </style>
    <title>404 Halaman tidak ditemukan</title>
  </head>
  <body>
    <nav class="navbar navbar-light" style="background-color: #C21807;">
      <a class="navbar-brand" style="font-color:#fff;"><?php echo "Aduh, system ada yang error";?> <?php //echo $heading; ?></a>
    </nav>
    <br><br>
    <div class="card text-center">
      <div class="card-header">
        Error Kode: <b>404</b>
      </div>
      <div class="card-body">
        <h5 class="card-title">System mengalami error</h5>
        <p class="card-text">Halaman yang dituju tidak ditemukan, silahkan hubungi administrator! <?php //echo $message; ?></p>
      </div>
    </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>