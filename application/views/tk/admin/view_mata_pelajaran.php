<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA MATA PELAJARAN
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('admin/tambah-mata-pelajaran.html');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
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
                                        <th>ID Mata Pelajaran</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Pengajar</th>
                                        <th>KKM</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          $no = 1;
                                          foreach($matkul as $data):
                                          ?>
                                          <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data->ID_MATA_PELAJARAN;?></td>
                                            <td><?php echo $data->NAMA_MATA_PELAJARAN;?></td>
                                            <td><?php echo $data->GRADE;?> - <?php echo $data->NAMA_KELAS;?></td>
                                            <td><?php echo $data->NIP;?> - <?php echo $data->NAMA_GURU;?></td>
                                            <td><?php echo $data->KKM;?></td>
                                            <td>
                                              <a href="<?php echo base_url();?>admin/home/editMatpel/<?php echo $data->ID;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                              <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $data->ID;?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                            </td>
                                          </tr>
                                          
                                              <div class="modal fade" id="modal_hapus<?php echo $data->ID;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h3 class="modal-title" id="myModalLabel">HAPUS DATA MATA PELAJARAN</h3>
                                                </div>
                                                <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/home/hapusMatpel/'.$data->ID?>">
                                                    <div class="modal-body">
                                                        <h5>Apakah anda yakin akan menghapus data <b><?php echo $data->ID_MATA_PELAJARAN." - ".$data->NAMA_MATA_PELAJARAN;?></b></h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </form>
                                                </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>
