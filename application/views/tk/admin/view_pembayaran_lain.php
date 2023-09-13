<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              PEMBAYARAN LAINNYA
                          </header>
                          <div class="panel-body">
                              <div class="btn-group">
                                <a href="<?php echo base_url('admin/tambah-pembayaran-lain');?>"> <button class="btn green">Tambah Data <i class="icon-plus"></i>
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
                                        <th>Nama</th>
                                        <th>Nominal</th>
                                        <th>Batas Pembayaran</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                        $no = 1;
                                        foreach($lain as $data):
                                      ?>
                                        <tr>
                                          <td><?php echo $no++?></td>
                                          <td><?php echo $data->NAMA_KEGIATAN;?></td>
                                          <td><?php echo $data->JUMLAH_BIAYA;?></td>
                                          <td><?php echo $data->BATAS_BAYAR;?></td>
                                          <td><?php echo $data->KETERANGAN;?></td>
                                          <td>
                                            <a href="<?php echo base_url();?>admin/home/detailBayarLain/<?php echo $data->ID;?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>
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