<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$title.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
      <thead>
           <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Status Presensi</th>
                <th>Keterangan</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
           </tr>
      </thead>
 
      <tbody>
           <?php $i=1; foreach($absensi as $data) { ?>
           <tr>
                <td><?php echo $data->NIS; ?></td>
                <td><?php echo $data->NAMA_LENGKAP; ?></td>
                <td><?php echo $data->GRADE; ?> - <?php echo $data->NAMA_KELAS; ?></td>
                <td><?php echo $data->TANGGAL; ?></td>
                <td><?php if($data->STATUS_PRESENSI == 1){ echo "Hadir"; }else if($data->STATUS_PRESENSI == 2){ echo "Izin"; }else if($data->STATUS_PRESENSI ==3){ echo "Sakit";}?></td>
                <td><?php echo $data->JAM_MASUK; ?></td>
                <td><?php echo $data->JAM_KELUAR; ?></td>
           </tr>
           <?php $i++; } ?>
      </tbody>
 </table>