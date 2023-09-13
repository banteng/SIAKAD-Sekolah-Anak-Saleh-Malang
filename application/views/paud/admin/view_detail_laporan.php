<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              LAPORAN PEMBAYARAN SPP
                          </header>
                          <div class="panel-body">
                          
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Status</th>
                                        </tr>
                                      </thead>
                                       <tbody>
                                      <?php 
                                          //ini_set('display_errors',0); 
                                          $no = 1;
                                          foreach ($mon as $bulan): 
                                      ?>
                                          <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $bulan->BULAN;?></td>  
                                              <?php $cek = $this->model_all->cekPembayaranbyId($bulan->ID);?>
                                              <?php //echo $this->db->last_query();die; ?>
                                              <?php if($cek->STATUS == "1"){ ?>
                                             <td><button type="button" class="btn btn-success btn-sm"><i class="fa fa-trash"></i> LUNAS</button></td>
                                        </tr>
                                        <?php 
                                              }else{ ?>
                                           <td><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i> BELUM DIBAYAR</button></td>
                                             
                                        <?php 
                                              }
                                        endforeach;?>
                          </table>
                                </div>
                                
                          </div>
                      </section>
                  </div>
                </div>
            <?php foreach ($mon as $bulans): ?>
             <div class="modal fade" id="modal_bayar<?php echo $bulans->BULAN;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Nominal Pembayaran</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>paud/admin/home/bayarSPP/<?php echo $spp->NIS?>/<?php echo $bulans->BULAN?>">
                <div class="modal-body">
                    <div class="col-sm-3">
                        <section class="panel">
                            <div class="panel-body">Bulan : </div>
                        </section>
                    </div>
                    <div class="col-lg-8">
                        <section class="panel">
                            <div class="panel-body"><b><?php echo $bulans->BULAN;?></b></div>
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <section class="panel">
                            <div class="panel-body">Nominal : </div>
                        </section>
                    </div>
                    <div class="col-lg-8">
                        <section class="panel">
                            <div class="panel-body"><b><input type="text" class="form-control" name="nominal" placeholder="" required=""><b></div>
                        </section>
                    </div>
                    <br><br><br><br><br><br>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary">Bayar</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <?php endforeach;?>