<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA RAPORT
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
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
                                        <th>Nama Siswa</th>
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
                                            <td><?php echo $data->SISWA;?></td>
                                            <td><?php echo $data->NAMA_SISWA;?></td>
                                            <td><?php echo $data->NAMA_KELAS;?></td>
                                            <td>
                                              <a href="<?php echo base_url();?>sd/guru/home/raportsiswa/<?php echo $data->SISWA;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Unggah</button></a>
                                                <?php $siswa = $this->model_guru->getPengumumanSiswa($data->SISWA);
                                                    if($siswa){?>
                                               <a href="<?php echo base_url();?>sd/guru/home/unduhRaport/<?php echo $data->SISWA;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o "></i> Unduh</button></a>
                                                    <?php } ?>
                                            </td>
                                                  
                                          </tr>
                                          
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>
