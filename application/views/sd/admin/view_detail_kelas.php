<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA KELAS
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('paud/admin/siswa-kelas.html');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
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
                                      <th>NIS</th>
                                      <th>Nama Lengkap</th>
                                      <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                          $no = 1;
                                          foreach($kelas as $data):
                                        ?>
                                          <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data->SISWA;?></td>
                                            <td><?php echo $data->NAMA_SISWA;?></td>
                                            <td>
                                              <a href="<?php echo base_url();?>paud/admin/home/hapusSiswaKelas/<?php echo $data->ID;?>">Hapus </a>
                                            </td>
                                          </tr>
                                          <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>      