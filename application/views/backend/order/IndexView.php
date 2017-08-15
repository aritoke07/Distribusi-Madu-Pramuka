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
            <table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kode Order</th>
                  <th>Total Pembayaran</th>
                  <th width="50px">Tanggal Order</th>
                  <th width="50px">Tanggal Penerimanaan</th>
                  <th width="80px">Status</th>
                  <th>Pelanggan</th>
                  <th>Kedai</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($values as $value) {
                  echo '<tr>';
                    echo '<td>'.$value->kode_order.'</td>';
                    echo '<td>'.$this->convert->FormatRupiah($value->total_pembayaran).'</td>';
                    echo '<td>'.$value->tanggal_order.'</td>';
                    echo '<td>'.($value->tanggal_penerimaan==0 ? null : $value->tanggal_penerimaan).'</td>';
                    echo '<td>'.$this->convert->OrderStatus($value->status).'</td>';
                    echo '<td>'.$value->id_pelanggan.'</td>';
                    echo '<td>'.$value->id_kedai.'</td>';
                    echo '<td>';
                      echo anchor('app/order/form/'.str_replace('/', '-', $value->kode_order).'/view', '<i class="fa fa-eye"></i> Lihat', 'class="btn btn-default btn-xs"');
                      if ($this->session->userdata('tingkat')=="2") {
                        echo anchor('app/order/form/'.str_replace('/', '-', $value->kode_order), '<i class="fa fa-edit"></i> Perbarui', 'class="btn btn-warning btn-xs"');
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
