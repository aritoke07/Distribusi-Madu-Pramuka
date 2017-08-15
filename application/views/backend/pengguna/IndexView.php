<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?=$this->titlePage?></h2>
            <a href="<?=site_url('app/pengguna/form')?>" class="btn btn-primary btn-xs" style="margin-left:5px;margin-top:5px;"><i class="fa fa-plus"></i> Tambah</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20px">Username</th>
                  <th>Nama</th>
                  <th>Tingkat</th>
                  <th width="200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($values as $value) {
                  echo '<tr>';
                    echo '<td>'.$value->username.'</td>';
                    echo '<td>'.$value->nama.'</td>';
                    echo '<td>'.$this->convert->PenggunaTingkat($value->tingkat).'</td>';
                    echo '<td>'.
                            anchor('app/pengguna/form/'.$value->username.'/view', '<i class="fa fa-eye"></i> Lihat', 'class="btn btn-default btn-xs"').
                            anchor('app/pengguna/form/'.$value->username, '<i class="fa fa-edit"></i> Perbarui', 'class="btn btn-warning btn-xs"').
                            anchor('app/pengguna/delete/'.$value->username, '<i class="fa fa-trash"></i> Hapus', 'class="btn btn-danger btn-xs"').
                          '</td>';
                  echo '</tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>