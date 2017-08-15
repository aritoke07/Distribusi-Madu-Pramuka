<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Print Stok Madu</title>
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
        <td width="180px"><b>Madu</b></td>
        <td width="20px"><b>:</b></td>
        <td><?php echo $id_madu ?></td>
      </tr>
      <tr>
        <td><b>Kemasan</b></td>
        <td><b>:</b></td>
        <td><?php echo $id_kemasan ?></td>
      </tr>
      <tr>
        <td><b>Harga</b></td>
        <td><b>:</b></td>
        <td><?php echo $this->convert->FormatRupiah($harga) ?></td>
      </tr>
      <tr>
        <td><b>Status</b></td>
        <td><b>:</b></td>
        <td><?php echo $this->convert->StokStatus($status) ?></td>
      </tr>
      <tr>
        <td><b>Jumlah</b></td>
        <td><b>:</b></td>
        <td><?php echo $jumlah ?></td>
      </tr>
    </table>
  </body>
</html>
