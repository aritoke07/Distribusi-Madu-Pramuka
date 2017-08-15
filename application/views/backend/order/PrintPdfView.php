<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Print Order Madu</title>
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
        <td width="180px"><b>Kode Order</b></td>
        <td width="20px"><b>:</b></td>
        <td><?php echo $kode_order ?></td>
      </tr>
      <tr>
        <td><b>Total Pembayaran</b></td>
        <td><b>:</b></td>
        <td><?php echo $total_pembayaran ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Order</b></td>
        <td><b>:</b></td>
        <td><?php echo $tanggal_order ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Penerimaan</b></td>
        <td><b>:</b></td>
        <td><?php echo $tanggal_penerimaan ?></td>
      </tr>
      <tr>
        <td><b>Status</b></td>
        <td><b>:</b></td>
        <td><?php echo $status ?></td>
      </tr>
      <tr>
        <td><b>Pelanggan</b></td>
        <td><b>:</b></td>
        <td><?php echo $id_pelanggan ?></td>
      </tr>
      <tr>
        <td><b>Kedai</b></td>
        <td><b>:</b></td>
        <td><?php echo $id_kedai ?></td>
      </tr>
      <tr>
        <td><b>Gambar Pembayaran</b></td>
        <td><b>:</b></td>
        <td>
          <img src="<?=site_url('assets/backend/plugins/jQuery-File-Upload-master/server/php/files/'.$bukti_transfer)?>" alt="" width="50%" height="50%">
        </td>
      </tr>
    </table>

    <br>

    <table width="100%" border="1">
      <thead>
        <tr>
          <th>No.</th>
          <th>Jenis Madu</th>
          <th>Kemasan</th>
          <th>Jumlah</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        foreach ($detail as $val) {
          echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$val->id_madu.'</td>';
            echo '<td>'.$val->id_kemasan.'</td>';
            echo '<td>'.$val->jumlah.'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </body>
</html>
