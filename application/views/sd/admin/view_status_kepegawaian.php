<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              STATUS KEPEGAWAIAN
                          </header>
                          <div class="panel-body">
                              
                              <?php if($this->session->flashdata('status')): ?>
                                <div class="alert alert-<?php echo $this->session->flashdata('clr');?>" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $this->session->flashdata('status');?>
                                    </div>
                              <?php endif; ?>
                          <div class="btn-group">
                                 <a href="#" data-toggle="modal" data-target="#modal_tambah"><button class="btn green">Tambah Data <i class="icon-plus"></i>
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
                                        <th>Status Kepegawaian</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php 
                                          $no = 1;
                                          foreach($status as $data):
                                          ?>
                                          <tr>
                                            <td><?php echo $no++?></td>
                                            <td><?php echo $data->STATUS_KEPEGAWAIAN;?></td>
                                            <td>
                                              <a href="<?php echo base_url();?>paud/admin/home/editStatusPeg/<?php echo $data->ID;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                              <a href="#" data-toggle="modal" data-target="#myModal3"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                          </tr>
                                        <?php endforeach;?>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
                </div>

 <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                          <div class="modal-dialog">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                              <h3 class="modal-title" id="myModalLabel">TAMBAH DATA STATUS KEPEGAWAIAN</h3>
                                          </div>
<form class="form-horizontal" method="post" action="<?php echo base_url('paud/admin/home/prosesStatusPeg/')?>">
                                              <div class="modal-body">
                                                   <div class="form-group">
                                                      <label class="col-sm-2 col-sm-2 control-label">Status Kepegawaian</label>
                                                      <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="status" required=""> 
                                                      </div>
                                                   </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                  <button class="btn btn-primary">Submit</button>
                                              </div>
                                          </form>
                                          </div>
                                          </div>
                                      </div>