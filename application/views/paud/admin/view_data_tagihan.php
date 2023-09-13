<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA TAGIHAN
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                      <th>No</th>
                                      <th>Nama Siswa</th>
                                      <th>Kelas</th>
                                      <th>Kode Transaksi</th>
                                      <th>Jumlah</th>
                                      <th>Bulan Tagihan</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                          $this->load->helper('currency');
                                          $no = 1;
                                          foreach($spp as $data):
                                        ?>
                                      <tr>
                                          <td><?php echo $no++;?></td>
                                          <td><?php echo $data->NAMA_SISWA; ?></td>
                                          <td><?php echo $data->NAMA_KELAS; ?></td>
                                          <td><?php echo $data->KODE_TAGIHAN; ?></td>
                                          <td>Rp. <?php echo rupiah($data->NOMINAL_SPP) ?></td>
                                          <td><?php echo $data->BULAN_TAGIHAN; ?> / <?php echo $data->TAHUN_TAGIHAN; ?></td>
                                      </tr>
                                          <?php endforeach; ?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>      