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

                    <form class="form-horizontal form-label-left" method="post" novalidate>
                      <input type="hidden" id="kode_order" name="kode_order" value="<?=$kode_order?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Order</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kode Order" id="kode_order" name="kode_order" value="<?=$kode_order?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Pembayaran</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Total Pembayaran" id="total_pembayaran" name="total_pembayaran" value="<?=$total_pembayaran?>" disabled>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Order</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Tanggal Order" id="tanggal_order" name="tanggal_order" value="<?=$tanggal_order?>" disabled>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Penerimaan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Tanggal Penerimaan" id="tanggal_penerimaan" name="tanggal_penerimaan" value="<?=$tanggal_penerimaan?>" disabled>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          switch ($status) {
                            case '1':
                              $optionStatus = array(
                                '' => '- Pilih -',
                                '1' => 'Menunggu',
                                '2' => 'Sedang Diproses'
                              );
                              echo form_dropdown('status', $optionStatus, (int)$status, 'class="form-control col-md-7 col-xs-12" '.$statusDisable.' required="required"  id="status"');
                              break;

                            case '2':
                              $optionStatus = array(
                                '' => '- Pilih -',
                                '2' => 'Sedang Diproses'
                              );
                              echo form_dropdown('status', $optionStatus, (int)$status, 'class="form-control col-md-7 col-xs-12" '.$statusDisable.' required="required"  id="status"');
                              break;

                            case '3':
                                $optionStatus = array(
                                '' => '- Pilih -',
                                '1' => 'Menunggu',
                                '2' => 'Sedang Diproses',
                                '3' => 'Sudah Diterima'
                              );
                              echo form_dropdown('status', $optionStatus, (int)$status, 'class="form-control col-md-7 col-xs-12" '.$statusDisable.' required="required"  id="status"');
                              break;
                            
                            default:
                              echo 'no defined';
                              break;
                          }
                          ?>
                        </div>
                      </div>                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pelanggan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Pelanggan" id="id_pelanggan" name="id_pelanggan" value="<?=$id_pelanggan?>" disabled>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kedai</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kedai" id="id_kedai" name="id_kedai" value="<?=$id_kedai?>" disabled>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar Pembayaran</span>
                        </label>
                        <div class="col-md-5 col-sm-3 col-xs-12">
                          <img src="<?=site_url('assets/backend/plugins/jQuery-File-Upload-master/server/php/files/'.$bukti_transfer)?>" alt="" width="50%" height="50%">
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                          <table class="table table-hovered">
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
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="location.href='<?=site_url("app/order/pelanggan")?>'">Kembali</button>
                          <?php echo $btnAction ?>
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
