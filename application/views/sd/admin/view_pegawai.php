          <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA PEGAWAI
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('sd/admin/tambah-pegawai');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
                                  </button></a>
                                  <a href="<?php echo base_url('admin/status-pegawai');?>"> <button class="btn green">Tambah Status Pegawai <i class="icon-plus"></i>
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
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>No. Telp</th>
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
                                          <td><?php echo $data->NIP;?></td>
                                          <td><?php echo $data->NAMA_LENGKAP;?></td>
                                          <td><?php echo $data->EMAIL;?></td>
                                          <td><?php if($data->JENIS_KELAMIN == "L"){ echo "Laki-laki"; }else{ echo "Perempuan";}?></td>
                                          <td><?php echo $data->STATUS_KEPEGAWAIAN;?></td>
                                          <td><a href="http://wa.me/<?php echo $data->NOMOR_HANDPHONE;?>&text=Hallo,%20<?php echo $data->NAMA_LENGKAP;?>&source=&data=" target="_blank"><?php echo $data->NOMOR_HANDPHONE;?></a></td>
                                          <td>
                                            <!--<a href="#"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>-->
                                            <a href="<?php echo base_url();?>sd/admin/home/editPegawai/<?php echo $data->NIP;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                            <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $data->NIP;?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                          </td>
                                        </tr>
                                        <div class="modal fade" id="modal_hapus<?php echo $data->NIP;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                          <div class="modal-dialog">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                              <h3 class="modal-title" id="myModalLabel">HAPUS DATA PEGAWAI</h3>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?php echo base_url().'sd/admin/home/hapusPengumuman/'.$data->NIP?>">
                                              <div class="modal-body">
                                                  <h5>Apakah anda yakin akan menghapus data <b><?php echo $data->NIP." - ".$data->NAMA_LENGKAP;?></b></h5>
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
                      