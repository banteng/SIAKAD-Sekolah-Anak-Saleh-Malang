<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA PRESENSI MANUAL SISWA
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                          <?php date_default_timezone_set('Asia/Jakarta');?>
                          <b><?php $datee = date('Y-m-d'); echo format_indo($date);?> <?php $date = date('H:i:s'); echo $date;?></b>
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
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $no = 1;
                                      foreach($siswa as $data):
                                    ?>
                                      <tr>
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $data->NIS;?></td>
                                        <td><?php echo $data->NAMA_SISWA;?></td>
                                        <td><?php echo $data->NAMA_KELAS;?></td>
                                       
                                      <td>
                                          <?php $siswaa = $this->model_all->cekPresensiSiswa($data->NIS);?>
                                          
                                          <?php if($siswaa->STATUS_PRESENSI == 1 && $datee == date('Y-m-d')){ ?>
                                          <a href="<?php echo base_url();?>admin/home/presensiPulang/<?php echo $data->NIS; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-check "></i> Pulang</button></a>
                                          
                                          <?php }else if($siswaa->STATUS_PRESENSI == 2 && $datee == date('Y-m-d')){ ?>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-check "></i> SAKIT</button>
                                          
                                          <?php }else if($siswaa->STATUS_PRESENSI == 3 && $datee == date('Y-m-d')){ ?>
                                          <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-check "></i> IZIN</button>
                                          
                                          <?php }else{?>
                                           <a href="<?php echo base_url();?>admin/home/presensiMasuk/<?php echo $data->NIS; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-check "></i> Masuk</button></a>
                                          <a href="<?php echo base_url();?>admin/home/presensiIzin/<?php echo $data->NIS; ?>"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-info-circle "></i> Izin</button></a>
                                          <a href="<?php echo base_url();?>admin/home/presensiSakit/<?php echo $data->NIS; ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-bed "></i> Sakit</button></a>
                                          <?php }?>
                                      </td>
                                      </tr>
                                      <?php endforeach;?>
                                    </tbody>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>