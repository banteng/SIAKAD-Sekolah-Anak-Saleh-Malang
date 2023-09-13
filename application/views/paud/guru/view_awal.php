<div class="alert alert-success" role="alert"><h3>Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b></h3><h5>Setelah menggunakan aplikasi jangan lupa untuk melakukan <b>logout</b></h5></div>
<div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-mail-forward"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  0 %
                              </h1>
                              <p>Kehadiran (%)</p>
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
                              <p>Jumlah Kelas Diampu</p>
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
                                  <?php echo $siswa; ?>
                              </h1>
                              <p>Jumlah Siswa</p>
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
                                  0
                              </h1>
                              <p>Jumlah jam mengajar</p>
                          </div>
                      </section>
                  </div>
              </div>
