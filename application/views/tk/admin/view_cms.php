<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             SETTING CMS
                          </header>
                          <div class="panel-body">
                              <form method="POST" action="<?php echo base_url();?>paud/admin/home/prosesCMS" enctype="multipart/form-data">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                                    </div>

                                <?php } else if($this->session->flashdata('error')){  ?>

                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                    </div>

                                <?php } else if($this->session->flashdata('warning')){  ?>

                                    <div class="alert alert-warning">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
                                    </div>

                                <?php } else if($this->session->flashdata('info')){  ?>

                                    <div class="alert alert-info">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                                    </div>
                                <?php }?>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Logo</label>
                                      <div class="col-sm-10">
                                        <img id="image-preview" src="<?php echo base_url();?>upload/cms/<?php echo $cms->LOGO;?>" height="150px" width="150px" alt="image preview"/>
                                        <br/><br/>
                                        <input name="logo" type="file" id="image-source" onchange="previewImage();"/><br>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Yayasan</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="yayasan" value="<?php echo $cms->NAMA_YAYASAN;?>" required=""><br>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Sekolah</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="sekolah" value="<?php echo $cms->NAMA_LENGKAP;?>" required=""><br>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control"  name="notelp" value="<?php echo $cms->NO_TELP;?>" required=""><br>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nomor Fax</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control"  name="nofax" value="<?php echo $cms->NO_FAX;?>"><br>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control"  name="alamat" value="<?php echo $cms->ALAMAT;?>" required=""><br>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Website</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control"  name="website" value="<?php echo $cms->WEBSITE;?>" required=""><br>
                                      </div>
                                  </div>
                                  <!--<div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">IP Fingerprint</label>
                                      <div class="col-sm-10">
                                         <input type="text" class="form-control"  name="ip" value="<?php //echo $ip->ALAMAT_IP;?>"><br>
                                      </div>
                                  </div>-->
                                  <button action="action" onclick="window.history.go(-1); return false;" type="submit" class="btn btn-warning">Kembali</button>
                                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </form>
                  </div>
              </div>
              

<script type="text/javascript">
 function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>