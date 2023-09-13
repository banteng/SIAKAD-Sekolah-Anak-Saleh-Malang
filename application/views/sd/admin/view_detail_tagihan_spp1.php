
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              DETAIL PEMBAYARAN SPP
                          </header>
                          <div class="panel-body">
                                
                          </div>
                      </section>
                  </div>
                </div>

              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      PEMBAYARAN SPP
                  </header>
                  <div class="panel-body">
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Nominal SPP</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    //$bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    $no = 1;
                                    foreach($spp as $data):
                                    foreach ($mon as $bulans) {
                                    ?>
                                      <tr class="gradeX">
                                        <td><?php echo $no++?></td>
                                        <td><?php echo $bulans->BULAN;?></td>
                                        <td><?php echo $data->NOMINAL_SPP;?></td>
                                        <td><?php echo $data->STATUS;?></td>
                                      </tr>
                                    <?php } endforeach;?>
                                </tbody>
                            </table>

                        </div>
                  </div>
              </section>


    <script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = ' <form class="form-horizontal tasi-form" method="POST" action="<?php echo base_url();?>admin/home/bayarSPP/<?php echo $data->NIS?>/<?php echo $mon->BULAN?>" enctype="multipart/form-data">'
          sOut += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td><label class="col-sm-2 col-sm-2 control-label">Nominal</label>: </td><td><input type="text" class="form-control" name="nominal" required=""></td><td><button type="submit" class="btn btn-primary">Submit</button></td></tr>';
          sOut += '</table>';

          return sOut;
      }
    </script>