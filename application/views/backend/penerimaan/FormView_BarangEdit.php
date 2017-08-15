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
                    <form class="form-horizontal form-label-left" method="post" validate action="<?=site_url("app/penerimaan/update")?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Pengiriman</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kode Pengiriman" required="required" id="kode_pengiriman" name="kode_pengiriman" value="<?=$kode_pengiriman?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Pengiriman</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="tanggal_pengiriman" name="tanggal_pengiriman" placeholder="Tanggal Pengiriman" aria-describedby="inputSuccess2Status3" value="<?=$tanggal_pengiriman?>" disabled>
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status3" class="sr-only">(success)</span>
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
                                '2' => 'Sudah Diterima',
                                '3' => 'Retur'
                              );
                              echo form_dropdown('status', $optionStatus, (int)$status, 'class="form-control col-md-7 col-xs-12" required="required" id="status"');
                              break;

                            case '2':
                              $optionStatus = array(
                                '' => '- Pilih -',
                                '2' => 'Sudah Diterima'
                              );
                              echo form_dropdown('status', $optionStatus, (int)$status, 'class="form-control col-md-7 col-xs-12" required="required" id="status"');
                              break;

                            case '3': 
                            case '4':
                              $optionStatus = array(
                                '' => '- Pilih -',
                                '2' => 'Sudah Diterima',
                                '3' => 'Retur',
                                '4' => 'Resend'
                              );
                              echo form_dropdown('status', $optionStatus, (int)$status, 'class="form-control col-md-7 col-xs-12" required="required" id="status"');
                              break;
                            
                            default:
                              echo 'No defined';
                              break;
                          }
                          ?>
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
                          echo form_dropdown('id_gudang', $optionGudang, $id_gudang, 'class="form-control col-md-7 col-xs-12" required="required" disabled id="id_gudang"');
                          ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Order</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Kode Order" required="required" id="kode_order" name="kode_order" value="<?=$kode_order?>" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                        <div class="col-md-7">
                          <table class="table table-hovered" id="tableDetailOne">
                            <thead>
                              <tr>
                                <th width="200px">Madu</th>
                                <th width="50px">Kemasan</th>
                                <th width="100px">Jumlah</th>
                                <th width="10px">Action</th>
                                <th width="100px">Jumlah Retur</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($valuesDetail as $valDetail) {
                                echo '<tr>';
                                  echo '<td>'.$valDetail->id_madu.'</td>';
                                  echo '<td>'.$valDetail->id_kemasan.'</td>';
                                  echo '<td>'.$valDetail->jumlah.'</td>';
                                  echo '<td><input type="checkbox" id="'.$valDetail->id_pengirimanitem.'" name="checkbox" disabled></td>';
                                  echo '<td>
                                          <input type="hidden" id="id_pengirimanitem" name="id_pengirimanitem[]" value="'.$valDetail->id_pengirimanitem.'" />
                                          <input type="hidden" id="jumlah_'.$valDetail->id_pengirimanitem.'" name="jumlah[]" value="'.$valDetail->jumlah.'" />
                                          <input type="text" class="form-control" id="jumlahretur_'.$valDetail->id_pengirimanitem.'" name="jumlahretur[]" value="'.(empty($valDetail->id_pengembaliam_item) ? 0 : $valDetail->id_pengembaliam_item).'" readonly />
                                        </td>';
                                echo '</tr>';
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Catatan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="3" id="catatan" name="catatan"><?php echo $catatan ?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="window.history.back()">Kembali</button>
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
