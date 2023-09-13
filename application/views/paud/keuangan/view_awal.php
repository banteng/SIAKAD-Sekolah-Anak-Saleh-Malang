<div class="alert alert-success" role="alert"><h3>Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b></h3><h5>Setelah menggunakan aplikasi jangan lupa untuk melakukan <b>logout</b></h5></div>
<div class="row state-overview">
                  <div class="col-lg-5 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-usd"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                 Rp. <?php echo $masuk['NOMINAL']; ?>
                              </h1>
                              <p>Dana Masuk</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-5 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-usd"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                 Rp. 0
                              </h1>
                              <p>Dana Keluar</p>
                          </div>
                      </section>
                  </div>