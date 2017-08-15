<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?=$titlePage?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php echo $this->session->flashdata('infoDetailError'); ?>
            <form class="form-horizontal form-label-left" method="post" id="<?=$formId?>" novalidate action="<?=site_url("app/pengiriman/insert")?>">
              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Pengiriman</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kode Pengiriman" required="required" id="kode_pengiriman" name="kode_pengiriman" value="<?=set_value("kode_pengiriman", $generateCode)?>" readonly>
            </div>
          </div>
          <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Pengiriman</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" class="form-control has-feedback-left" id="tanggal_pengiriman" name="tanggal_pengiriman" placeholder="Tanggal Pengiriman" aria-describedby="inputSuccess2Status3" value="<?=set_value("tanggal_pengiriman")?>" >
          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
          <span id="inputSuccess2Status3" class="sr-only">(success)</span>
        </div>
      </div>
      <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gudang</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?php
      $optionGudang[''] = '- Pilih -';
      foreach ($valGudang as $val) {
      $optionGudang[$val->id_gudang] = ucfirst($val->nama);
      }
      echo form_dropdown('id_gudang', $optionGudang, set_value('id_gudang'), 'class="form-control col-md-7 col-xs-12" required="required"  id="id_gudang"');
      ?>
    </div>
  </div>
  <div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Order</span>
</label>
<div class="col-md-6 col-sm-6 col-xs-12">
  <?php
  $optionOrder[''] = '- Pilih -';
  foreach ($valOrder as $val) {
  $optionOrder[$val->kode_order] = ucfirst($val->kode_order);
  }
  echo form_dropdown('kode_order', $optionOrder, set_value('kode_order'), 'class="form-control col-md-7 col-xs-12" required="required"  id="kode_order"');
  ?>
</div>
</div>
<div class="item form-group">
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-10">
  <table class="table table-hovered">
    <thead>
      <tr>
        <th width="10px">No.</th>
        <th width="100px">Jenis Madu</th>
        <th width="100px">Kemasan</th>
        <th width="100px">Jumlah</th>
      </tr>
    </thead>
  <tbody id="resultDataOrder"></tbody>
</table>
</div>
</div>
<div class="item form-group">
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="col-md-10">
<table class="table table-striped" id="tableDetailOne">
  <thead>
    <tr>
      <th width="120px">Jenis Madu - Kemasan</th>
      <th width="10px">Jumlah Pengiriman</th>
      <th width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <?php
        $optionStok[''] = '- Pilih -';
        foreach ($valStok as $val) {
        $optionStok[$val->id_stok] = ucfirst($val->jenis_madu.' - '.$val->kemasan);
        }
        echo form_dropdown('id_stok[]', $optionStok, '', 'class="form-control col-md-8 col-xs-12 id_stok" required="required"  id="id_stok[]"');
        ?>
      </td>
      <td>
        <input type="text" class="form-control jumlah" id="jumlah[]" name="jumlah[]">
      </td>
      <td>
        <button type="button" class="btn btn-warning btn-sm" id="btnAddRow" name="btnAddRow">Tambah Madu</button>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-md-offset-3">
<button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="location.href='<?=site_url("app/pengiriman/barang")?>'">Kembali</button>
<button type="submit" class="btn btn-success" id="_btnSubmit_" name="_btnSubmit_">Simpan</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="modalMessage" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header" id="modalHeaderColor">
<button type="button" class="close" data-dismiss="modal" id="modalClose"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="modalTitle"></h4>
</div>
<div class="modal-body" id="modalBody"></div>
</div>
</div>
</div>