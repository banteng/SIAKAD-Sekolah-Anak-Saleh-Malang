<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              HISTORI TAGIHAN
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                      <th>No</th>
                                      <th>NIS</th>
                                      <th>Nama Siswa</th>
                                      <th>Kelas</th>
                                      <th>Tanggal</th>
                                      <th>Pembayaran</th>
                                      <th>Jumlah</th>
                                      <th>Terbayar</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                          $no = 1;
                                          $this->load->helper('currency');
                                          foreach($laporan as $data):
                                        ?>
                                      <tr>
                                          <td><?php echo $no++;?></td>
                                          <td><?php echo $data->NIS;?></td>
                                          <td><?php echo $data->NAMA_SISWA;?></td>
                                          <td><?php echo $data->NAMA_KELAS;?></td>
                                          <td><?php echo $data->TANGGAL;?></td>
                                          <td>SYA</td>
                                          <td>Rp. <?php echo rupiah($data->NOMINAL);?></td>
                                          <td>Rp. <?php echo rupiah($data->NOMINAL);?></td>
                                      </tr><?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>      