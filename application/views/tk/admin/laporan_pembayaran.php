<?php
$tanggal = date("d-M-Y");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_pembayaran_TK_".$tanggal.".xls");
?>

<h3>Data Pembayaran SPP TK</h3>
    
<table border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Bulan</th>
    <th>Tahun</th>
    <th>Total Bayar</th>
    <th>Status</th>
  </tr>
 
 <?php 
  $no = 1; 
  foreach($spp as $data){
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$data->NIS."</td>";
    echo "<td>".$data->NAMA_SISWA."</td>";
    echo "<td>".$data->BULAN."</td>";
    echo "<td>".$data->TAHUN."</td>";
    echo "<td>".$data->NOMINAL."</td>";
    echo "<td>Lunas</td>";
    echo "</tr>";
    
    $no++;
  }
  ?>
</table>