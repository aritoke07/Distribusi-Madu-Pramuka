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
                      <input type="hidden" id="id_madu" name="id_madu" value="<?=$id_madu?>">
                      <input type="hidden" id="gambar_nama" name="gambar_nama">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Madu</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Nama Madu" required="required" id="nama" name="nama" value="<?=$nama?>" <?=$namaDisable?>>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar Madu</span>
                        </label>
                        <?php if ($gambar==null && $this->uri->segment(5)==null): ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="file" class="form-control col-md-3 col-xs-12" id="fileupload" name="files">
                        </div>
                        <div id="progress" class="progress col-md-3">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <?php else: ?>
                          <div class="col-md-5 col-sm-3 col-xs-12">
                            <img src="<?=site_url('assets/backend/plugins/jQuery-File-Upload-master/server/php/files/'.$gambar)?>" alt="" width="50%" height="50%">
                          </div>
                          <?php echo $buttonDeleteFile; ?>
                        <?php endif; ?>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="keterangan" name="keterangan" class="form-control" rows="10" <?=$keteranganDisable?>><?=$keterangan?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="_btnCancel_" name="_btnCancel_" onclick="location.href='<?=site_url("app/madu/")?>'">Kembali</button>
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
