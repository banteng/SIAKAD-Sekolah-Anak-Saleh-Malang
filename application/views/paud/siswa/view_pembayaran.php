<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA PEMBAYARAN
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                      <th>No</th>
                                        <th>Bulan / Tahun Ajaran</th>
                                        <th>Nominal SPP</th>
                                        <th>Status</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          $no = 1;
                                          foreach($siswa as $data):
                                          ?>
                                          <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data->BULAN;?> / <?php echo $data->TAHUN;?></td>
                                            <td><?php echo $data->NOMINAL;?></td>
                                            <td><?php if($data->STATUS){echo "<button class='btn btn-xs btn-success'>Terbayar</a>";}else{ echo "<button class='btn btn-xs btn-warning'>Belum Terbayar</a>";}?></td>
                                          </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>