<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?=$this->titlePage?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20px">Id</th>
                  <th>Pelanggan</th>
                  <th>Telp</th>
                  <th>Handphone</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Tanggal Bergabung</th>
                  <th>Tanggal Keluar</th>
                  <th width="200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($values as $value) {
                  echo '<tr>';
                    echo '<td>'.$value->id_pelanggan.'</td>';
                    echo '<td>'.$value->nama.'</td>';
                    echo '<td>'.$value->telp.'</td>';
                    echo '<td>'.$value->handphone.'</td>';
                    echo '<td>'.$value->email.'</td>';
                    echo '<td>'.$this->convert->PelangganStatus($value->status).'</td>';
                    echo '<td>'.$value->tanggal_bergabung.'</td>';
                    echo '<td>'.$value->tanggal_keluar.'</td>';
                    echo '<td>'.
                            anchor('app/pelanggan/form/'.$value->id_pelanggan.'/view', '<i class="fa fa-eye"></i> Lihat', 'class="btn btn-default btn-xs"').
                            anchor('app/pelanggan/form/'.$value->id_pelanggan, '<i class="fa fa-edit"></i> Perbarui', 'class="btn btn-warning btn-xs"').
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
