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
                  <th width="20px">Kode</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Tanggal Resend</th>
                  <th>Status</th>
                  <th>Kode Order</th>
                  <th width="200px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($values as $value) {
                  echo '<tr>';
                    echo '<td>'.$value->kode_pengembalian.'</td>';
                    echo '<td>'.$value->tanggal_pengembalian.'</td>';
                    echo '<td>'.$value->tanggal_resend.'</td>';
                    echo '<td>'.$this->convert->PengembalianStatus($value->status).'</td>';
                    echo '<td>'.$value->kode_order.'</td>';
                    echo '<td>'.
                            anchor('app/pengembalian/form/'.$value->kode_pengembalian.'/view', '<i class="fa fa-eye"></i> Lihat', 'class="btn btn-default btn-xs"').
                            anchor('app/pengembalian/form/'.$value->kode_pengembalian, '<i class="fa fa-edit"></i> Perbarui', 'class="btn btn-warning btn-xs"').
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
