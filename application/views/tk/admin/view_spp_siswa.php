<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA TAGIHAN SPP
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
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Besar Tagihan SPP</th>
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
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                          <td><?php echo $data->NAMA_KELAS;?></td>
                                          <td><?php echo $data->NISN;?></td>
                                          <td>
                                          <a href="#"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>
                                            <a href="<?php echo base_url();?>paud/admin/home/editSiswa/<?php echo $data->NIS;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                            <a href="#" data-toggle="modal" data-target="#myModal3"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                          </td>
                                        </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>