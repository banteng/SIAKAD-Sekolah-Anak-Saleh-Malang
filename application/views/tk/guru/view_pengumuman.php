<?php $this->load->helper('tglindo'); ?>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              PENGUMUMAN
                          </header>
                          <div class="panel-body">
                          <div class="btn-group">
                                 <a href="<?php echo base_url('guru/tambah-pengumuman.html');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
                                  </button></a>
                              </div>
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Waktu Terbit</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                        $no = 1;
                                        foreach($pengumuman as $data):
                                      ?>
                                      
                                        <tr>
                                          <td><?php echo $no++?></td>
                                          <td><?php echo $data->JUDUL;?></td>
                                          <td><?php echo format_indo($data->TANGGAL_TERBIT);?></td>
                                          <td>
                                          <a href="#" data-toggle="modal" data-target="#modal_detail<?php echo $data->ID;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>
                                            <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $data->ID;?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                          </td>
                                        </tr>

                                        <div class="modal fade" id="modal_hapus<?php echo $data->ID;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                <h3 class="modal-title" id="myModalLabel">HAPUS DATA PENGUMUMAN</h3>
                                            </div>
                                            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/home/hapusPengumuman/'.$data->ID?>">
                                                <div class="modal-body">
                                                    <h5>Apakah anda yakin akan menghapus data <b><?php echo $data->JUDUL;?></b></h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                    <button class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modal_detail<?php echo $data->ID;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                <h3 class="modal-title" id="myModalLabel">DETAIL DATA PENGUMUMAN</h3>
                                            </div>
                                            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/home/hapusPengumuman/'.$data->ID?>">
                                                <div class="modal-body">
                                                    <h5>Judul :<b><?php echo $data->JUDUL;?></b></h5><br>
                                                    <p>Isi Pengumuman</p>
                                                    <?php echo $data->PENGUMUMAN; ?><br>
                                                    <?php if($data->LAMPIRAN1){ ?>
                                                    <p>Lampiran File : </p>
                                                    <a href="<?php echo base_url();?>upload/pengumuman/<?php echo $data->LAMPIRAN1;?>" target="_blank"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <?php echo $data->LAMPIRAN1;?></button></a><br>
                                                <?php }?>
                                                    <p>Tujuan :<b><?php echo $data->SISWA;?> - <?php echo $data->NAMA_SISWA;?></b></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                   
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

  