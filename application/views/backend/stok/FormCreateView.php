<div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$this->titlePage?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method="post" id="<?=$formId?>" novalidate>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Madu</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php
                        $optionMadu[''] = '- Pilih -';
                        foreach ($valMadu as $val) {
                          $optionMadu[$val->id_madu] = ucfirst($val->nama);
                        }
                        echo form_dropdown('id_madu', $optionMadu, '', 'class="form-control col-md-7 col-xs-12" required="required"  id="id_madu"');
                        ?>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kemasan</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $inputKemasan; ?>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Harga</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo $inputHarga; ?>
                        <input type="hidden" class="form-control col-md-7 col-xs-12" id="id_daftarhargaitem" name="id_daftarhargaitem" readonly />
                      </div>
                    </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          $optionStatus = array(
                            '' => '- Pilih -',
                            '1' => 'Ada',
                            '2' => 'Tidak Ada'
                          );
                          echo form_dropdown('status', $optionStatus, '', 'class="form-control col-md-7 col-xs-12" required="required"  id="status"');
                          ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jumlah</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Jumlah" required="required" id="jumlah" name="jumlah">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="location.href='<?=site_url("app/stok/")?>'">Kembali</button>
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
