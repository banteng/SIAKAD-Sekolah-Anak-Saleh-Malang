<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              ABSENSI
                          </header>
                          <div class="panel-body">
                         
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Tanggal</th>
                                          <th>Jam Masuk</th>
                                          <th>Jam Keluar</th>
                                          <th>Keterangan</th>
                                          <th>Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                        $no = 1;
                                        foreach($absensi as $data):
                                      ?>
                                        <tr>
                                          <td><?php echo $no++?></td>
                                          <td><?php echo $data->TANGGAL;?></td>
                                          <td><?php echo $data->JAM_MASUK;?></td>
                                          <td><?php echo $data->JAM_KELUAR;?></td>
                                          <td><?php echo $data->KETERANGAN;?></td>
                                          <td><?php if($data->STATUS_PRESENSI == 1){ echo "<button class='btn btn-xs btn-success'>HADIR</a>"; }else if($data->STATUS_PRESENSI == 2){ echo "<button class='btn btn-xs btn-warning'>IZIN</a>"; }else if($data->STATUS_PRESENSI ==3){ echo "<button class='btn btn-xs btn-danger'>SAKIT</a>";}?></td>
                                       
                                        </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>