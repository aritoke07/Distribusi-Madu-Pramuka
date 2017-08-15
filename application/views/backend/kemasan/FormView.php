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
                      <input type="hidden" id="id_kemasan" name="id_kemasan" value="<?=$id_kemasan?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Kemasan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Nama Kemasan" required="required" id="nama" name="nama" value="<?=$nama?>" <?=$namaDisable?>>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="location.href='<?=site_url("app/kemasan/")?>'">Kembali</button>
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
