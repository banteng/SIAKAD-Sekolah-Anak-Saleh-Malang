<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             RESET PASSWORD
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>guru/home/resetPassword" enctype="multipart/form-data">
                
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
                                      <div class="col-sm-10">
                                      <input type="text" class="form-control" name="passbaru" required=""> 
                                      </div>
                                  </div>

                                  <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                  </div>
              </div>
