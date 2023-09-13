 <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              LAPORAN KEUANGAN SPP
                          </header>
                          <!--<div class="panel-body">
                                <div class="btn-group pull-right">
                                    <a href="<?php echo base_url();?>paud/admin/home/LaporanPembayaran/<?php echo $tahun; ?>" target="_blank"><button class="btn">Export Excel</button></a>
                                </div>
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                           <tr>
                                                <th rowspan="2">No</th>
                                                <th colspan="2">Detail Informasi</th>
                                                <th colspan="12">Bulan</th>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Maret</th>
                                                <th>April</th>
                                                <th>Mei</th>
                                                <th>Juni</th>
                                                <th>Juli</th>
                                                <th>Agust</th>
                                                <th>Sept</th>
                                                <th>Okt</th>
                                                <th>Nov</th>
                                                <th>Des</th>
                                            </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          //ini_set('display_errors',0); 
                                          $no = 1;
                                          $this->load->helper('currency');
                                          foreach ($laporan as $data):
                                      ?>
                                          <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->NAMA_SISWA;?></td>  
                                            <td><?php echo $data->NAMA_KELAS;?></td> 
                                           
                                            <?php foreach($laporans as $dt): ?>
                                            <?php if($dt->STATUS == "1" && $dt->BULAN == $data->BULAN){?>
                                            <td>Success</td>
                                            <?php }?>
                                              
                                            <?php endforeach;?>
                                        </tr>
                                       
                                        <?php endforeach;?>
                          </table>
                                </div>
                                
                          </div>-->
                       <div class="panel-body">
                            <div class="btn-group pull-right">
                                    <a href="<?php echo base_url();?>paud/keuangan/home/LaporanPembayaran/<?php echo $tahun; ?>" target="_blank"><button class="btn">Export Excel</button></a>
                            </div>
                        <div class="adv-table">
                             <table  class="display table table-bordered table-striped" id="example">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                          ini_set('display_errors',0); 
                                          $no = 1;
                                          $this->load->helper('currency');
                                          foreach ($laporan as $data): 
                                      ?>
                                          <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->NIS;?></td>
                                            <td><?php echo $data->NAMA_SISWA;?></td>
                                            <td><?php echo $data->NAMA_KELAS;?></td>
                                            <td> <button type="button" data-toggle="modal" data-target="#modal_detail<?php echo $data->NIS;?>"  class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></td>
                                        </tr>
                                    
                                            <div class="modal fade" id="modal_detail<?php echo $data->NIS;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                  <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                      <h3 class="modal-title" id="myModalLabel">Detail Pembayaran</h3>
                                                  </div>
                                                      <div class="modal-body">
                                                            <div class="modal-body">
                                                              <div class="container-fluid">
                                                                  <?php //$bul = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");  ?>
                                                                  <?php foreach($bulan as $mon): ?>
                                                                  <?php $spp = $this->model_all->LaporanPembayaranSPP($data->NIS, $mon->ID);?>
                                                                <div class="row">
                                                                  <div class="col-md-4"><?php echo $mon->BULAN;?></div>
                                                                  <div class="col-md-4 ml-auto">: <?php if($spp->STATUS == "1"){ echo "Terbayar";}else{ echo "Belum ada transaksi";}?></div>
                                                                </div>
                                                                <?php endforeach;?>
                                                              </div>
                                                            </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                      </div>
                                                  </div>
                                                  </div>
                                              </div>
                                        <?php endforeach;?>
                                
                                </tbody>
                            </table>

                        </div>
                  </div>
                      </section>
                      
                  </div>
                </div>