<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?=$titlePage?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20px">No.</th>
                  <th width="20px">Kode</th>
                  <th>Tanggal Pengiriman</th>
                  <th>Status</th>
                  <th>Gudang</th>
                  <th>Kode Order</th>
                  <th width="50px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($values as $value) {
                  echo '<tr>';
                    echo '<td>'.$no++.'</td>';
                    echo '<td>'.$value->kode_pengiriman.'</td>';
                    echo '<td>'.$value->tanggal_pengiriman.'</td>';
                    echo '<td>'.$this->convert->PengirimanStatus($value->status).'</td>';
                    echo '<td>'.$value->id_gudang.'</td>';
                    echo '<td>'.$value->kode_order.'</td>';
                    echo '<td>';
                      echo anchor('app/penerimaan/view/'.str_replace('/', '-', $value->kode_pengiriman), '<i class="fa fa-eye"></i> Lihat', 'class="btn btn-default btn-xs"');
                      if ($value->status!="2") {
                        echo anchor('app/penerimaan/edit_retur/'.str_replace('/', '-', $value->kode_pengiriman), '<i class="fa fa-edit"></i> Perbarui', 'class="btn btn-warning btn-xs"');
                      }
                    echo '</td>';
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
