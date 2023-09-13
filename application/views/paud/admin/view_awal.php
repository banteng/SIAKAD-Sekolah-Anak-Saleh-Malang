<div class="alert alert-success" role="alert"><h3>Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b></h3><h5>Merupakan layanan yang disediakan bagi administrator untuk mengakses seputar informasi akademik siswa. Setelah menggunakan aplikasi diharapan untuk <b>logout</b></h5></div>

<?php if($tidakadakelas != 0):?>
<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
           <i class="icon-remove"></i>
    </button>
    <strong>Warning!</strong> <br><?php echo $tidakadakelas;?> siswa tidak memiliki kelas.<br>
    <a href="#" class="btn btn-warning">Lihat Data</a>
</div>
<?php endif;?>

<div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-mail-forward"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?php echo $siswa; ?>
                              </h1>
                              <p>Jumlah Siswa</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-archive"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  <?php echo $kelas; ?>
                              </h1>
                              <p>Jumlah Kelas</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                  <?php echo $pegawai; ?>
                              </h1>
                              <p>Jumlah Pegawai</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  <?php echo $matpel; ?>
                              </h1>
                              <p>Jumlah Mata Pelajaran</p>
                          </div>
                      </section>
                  </div>
              </div>

        <div class="row">
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Transaksi terakhir
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped">
                                      <thead>
                                      <tr>
                                          <th>NIS</th>
                                          <th>Nama</th>
                                          <th>Kelas</th>
                                          <th>Bulan</th>
                                          <th>Tahun</th>
                                          <th>Tanggal Bayar</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($trans as $data):?>
                                      <tr>
                                          <td><?php echo $data->NIS;?></td>
                                          <td><?php echo $data->NAMA_SISWA;?></td>
                                          <td><?php echo $data->NAMA_KELAS;?></td>
                                          <td><?php echo $data->BULAN;?></td>
                                          <td><?php echo $data->TAHUN;?></td>
                                          <td><?php echo $data->TANGGAL;?></td>
                                      </tr>
                                     <?php endforeach;?>
                                    </table>
                                </div>
                          </div>
                      </section>
                  </div>

                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Log
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped">
                                      <thead>
                                      <tr>
                                          <th>Log Waktu</th>
                                          <th>Log Browser</th>
                                          <th>Log IP</th>
                                          <th>Status</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($log as $data):?>
                                      <tr>
                                          <td><?php echo $data->LOG_TIME;?></td>
                                          <td><?php echo $data->LOG_USER_AGENT;?></td>
                                          <td><?php echo $data->LOG_IP;?></td>
                                          <td><?php if($data->LOG_SUCCESS == 1){?><button class="btn btn-xs btn-success">Login success</button><?php }else{?> <button class="btn btn-xs btn-danger">Login failed</button><?php }?></td>
                                      </tr>
                                     <?php endforeach;?>
                                    </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>

