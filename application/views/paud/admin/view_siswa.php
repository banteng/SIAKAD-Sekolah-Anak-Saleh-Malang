 <link href="<?php echo base_url('backup/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
<script src="<?php echo base_url('backup/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('backup/datatables/js/dataTables.bootstrap.min.js')?>"></script>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DATA SISWA
                          </header>
                          <div class="panel-body">
                          <?php echo $this->session->flashdata('notif') ?>
                          <div class="btn-group">
                                 <a href="<?php echo base_url('paud/admin/tambah-siswa');?>"> <button class="btn green"><i class="icon-plus"></i> Tambah Data
                                  </button></a>
                                 <a href="<?php echo base_url('paud/admin/import-siswa');?>"> <button class="btn green">Import Data <i class="icon-paper"></i>
                                  </button></a>
                              </div>
                              <div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Import Data</a></li>
                                      <li><a href="#">Export Data</a></li>
                                      <li><a href="#">Unduh template data</a></li>
                                  </ul>
                              </div>
                                    <div class="panel-body">
                                        <form id="form-filter" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                                                <div class="col-sm-4">
                                                     <select name="mapel" id="pilihmapel" class="form-control">
                                                         <option>Pilih Kelas...</option>
                                                         <option value="semua">Semua</option>
                                                            <?php foreach ($kelas as $pm) { ?>
                                                         <option value="<?php echo $pm->ID;?>"><?php echo $pm->NAMA_KELAS;?></option>
                                                         <?php } ?>
                                                     </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
           
                                <div class="adv-table" id="hasiltabel">
                                    <table class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                      </tr>
                                      </thead>
                                      <tbody id="cobat">
                                     <?php 
                                        $no = 1;
                                        foreach($siswa as $data):
                                      ?>
                                        <tr>
                                          <td><?php echo $no++?></td>
                                          <td><?php echo $data->NIS;?></td>
                                          <td><?php echo $data->NISN;?></td>
                                          <td><?php echo $data->NAMA_SISWA;?></td>
                                          <td><?php echo $data->NAMA_KELAS;?></td>
                                          <td><?php if($data->JENIS_KELAMIN == "LAKI-LAKI"){ echo "Laki-laki"; }else{ echo "Perempuan";}?></td>
                                          <td>
                                            <!--<a href="#"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye "></i> Detail</button></a>-->
                                            <a href="<?php echo base_url();?>paud/admin/home/editSiswa/<?php echo $data->NIS;?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o "></i> Edit</button></a>
                                            <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $data->NIS;?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a></td>
                                        </tr>
                                        <div class="modal fade" id="modal_hapus<?php echo $data->NIS;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                          <div class="modal-dialog">
                                          <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                              <h3 class="modal-title" id="myModalLabel">HAPUS DATA SISWA</h3>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?php echo base_url().'paud/admin/home/hapusSiswa/'.$data->NIS?>">
                                              <div class="modal-body">
                                                  <h5>Apakah anda yakin akan menghapus data <b><?php echo $data->NIS. " - ". $data->NAMA_SISWA;?></b></h5><label style="color:red;">*seluruh data akan terhapus</label>
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
                                      </tbody>
                                   </table>
                                </div>
                                
                          </div>
                      </section>
                  </div>
                </div>

<script>
$(document).ready(function(){
    $('#pilihmapel').on('change', function(){
        var id = $(this).val();
        location.href = '<?php echo base_url("paud/admin/siswa/");?>'+id;
    })
    $('#tabelSoal').DataTable();
})
</script>

