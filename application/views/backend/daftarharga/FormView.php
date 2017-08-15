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

                    <form class="form-horizontal form-label-left" method="post" novalidate>
                      <input type="hidden" id="id_daftarhargaitem" name="id_daftarhargaitem" value="<?=$id_daftarhargaitem?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Daftar Harga</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Daftar Harga" required="required" id="harga" name="harga" value="<?=$harga?>" <?=$hargaDisable?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Madu</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          $optionMadu[''] = '- Pilih -';
                          foreach ($valMadu as $val) {
                            $optionMadu[$val->id_madu] = ucfirst($val->nama);
                          }
                          echo form_dropdown('id_madu', $optionMadu, $id_madu, 'class="form-control col-md-7 col-xs-12" '.$id_maduDisable.' required="required"  id="id_madu"');
                          ?>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kemasan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          $optionKemasan[''] = '- Pilih -';
                          foreach ($valKemasan as $val) {
                            $optionKemasan[$val->id_kemasan] = ucfirst($val->nama);
                          }
                          echo form_dropdown('id_kemasan', $optionKemasan, $id_kemasan, 'class="form-control col-md-7 col-xs-12" '.$id_kemasanDisable.' required="required"  id="id_kemasan"');
                          ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="location.href='<?=site_url("app/daftarharga/")?>'">Kembali</button>
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
