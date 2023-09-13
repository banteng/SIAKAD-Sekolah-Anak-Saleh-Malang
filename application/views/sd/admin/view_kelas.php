<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA KELAS
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('sd/admin/tambah-data-kelas');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
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
                                        <th>Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Nominal SPP</th>
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
                                            <td><?php echo $data->NAMA_KELAS;?></td>
                                            <td><?php echo $data->NAMA_WALI_KELAS;?></td>
                                            <td><?php echo $data->NOMINAL_SPP;?></td>
                                            <td>
                                              <a href="<?php echo base_url();?>sd/admin/home/detailKelas/<?php echo $data->ID;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>
                                              <a href="<?php echo base_url();?>sd/admin/home/editKelas/<?php echo $data->ID;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                              <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $data->ID;?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                            </td>
                                          </tr>
                                          
                                              <div class="modal fade" id="modal_hapus<?php echo $data->ID;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h3 class="modal-title" id="myModalLabel">HAPUS DATA KELAS</h3>
                                                </div>
                                                <form class="form-horizontal" method="post" action="<?php echo base_url().'sd/admin/home/hapusKelas/'.$data->ID?>">
                                                    <div class="modal-body">
                                                        <h5>Apakah anda yakin akan menghapus data <b><?php echo $data->NAMA_KELAS;?></b></h5> <label style="color:red;">*seluruh data akan terhapus</label>
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
