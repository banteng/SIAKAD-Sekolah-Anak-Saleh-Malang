<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA PRESENSI PEGAWAI
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('sd/admin/tambah-presensi-pegawai');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
                                  </button></a>
                              </div>
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>
                                      <li><a href="#">Export to Excel</a></li>
                                  </ul>
                              </div>
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>NUPTK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $no = 1;
                                      foreach($siswa as $data):
                                    ?>
                                      <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data->NUPTK;?></td>
                                        <td><?php echo $data->NAMA_LENGKAP;?></td>
                                        <td><?php echo $data->JABATAN;?></td>
                                        <td><?php echo $data->TANGGAL;?></td>
                                        <td><?php echo $data->JAM_MASUK;?></td>
                                        <td><?php echo $data->JAM_KELUAR;?></td>
                                        <td><?php if($data->STATUS_PRESENSI == 1){ echo "<button class='btn btn-xs btn-success'>HADIR</a>"; }else if($data->STATUS_PRESENSI == 2){ echo "<button class='btn btn-xs btn-warning'>IZIN</a>"; }else if($data->STATUS_PRESENSI ==3){ echo "<button class='btn btn-xs btn-danger'>SAKIT</a>";}?></td>
                                      </tr>
                                      <?php endforeach;?>
                                    </tbody>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>