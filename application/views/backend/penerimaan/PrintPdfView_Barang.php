<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Print Penerimaan Barang</title>
  </head>
  <body>
    <table width="100%" border="0">
      <tr>
        <td align="center"><img src="<?=site_url("./assets/backend/images/logo.png")?>" alt="" width="100px"></td>
        <td colspan="2" style="padding-left:120px;"><b style="font-size:20px;">Madu Pramuka</b></td>
      </tr>
      <tr>
        <td colspan="3" align="center" style="padding-top:10px;padding-bottom:0px;font-size:12px;">ISTANA LEBAH Komplek Wiladatika Cibubur Jakarta Timur, 13720 - Indonesia</td>
      </tr>
      <tr>
        <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td width="180px"><b>Kode Pengiriman</b></td>
        <td width="20px"><b>:</b></td>
        <td><?php echo $kode_pengiriman ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Pengiriman</b></td>
        <td><b>:</b></td>
        <td><?php echo $tanggal_pengiriman ?></td>
      </tr>
      <tr>
        <td><b>Status</b></td>
        <td><b>:</b></td>
        <td><?php echo $this->convert->PengirimanStatus($status) ?></td>
      </tr>
      <tr>
        <td><b>Gudang</b></td>
        <td><b>:</b></td>
        <td><?php echo $id_gudang ?></td>
      </tr>
      <tr>
        <td><b>Kedai</b></td>
        <td><b>:</b></td>
        <td><?php echo $kode_order ?></td>
      </tr>
      <tr>
        <td><b>Catatan</b></td>
        <td><b>:</b></td>
        <td><?php echo $catatan ?></td>
      </tr>
    </table>
    <br>
    <table width="100%" border="1">
      <tr>
        <th>No.</th>
        <th>Jenis Madu</th>
        <th>Kemasan</th>
        <th>Jumlah</th>
      </tr>
      <?php
      $no = 1;
      foreach ($valuesDetail as $value) {
        echo '<tr>';
          echo '<td align="center" width="50px">'.$no++.'.</td>';
          echo '<td>'.ucfirst($value->id_madu).'</td>';
          echo '<td>'.ucfirst($value->id_kemasan).'</td>';
          echo '<td>'.$value->jumlah.'</td>';
        echo '</tr>';
      }
      ?>
    </table>
  </body>
</html>
