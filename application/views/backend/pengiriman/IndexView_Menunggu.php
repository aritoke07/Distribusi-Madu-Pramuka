<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?=$titlePage?></h2>
            <a href="<?=site_url('app/pengiriman/create')?>" class="btn btn-primary btn-xs" style="margin-left:5px;margin-top:5px;"><i class="fa fa-plus"></i> Tambah</a>
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
                    echo '<td>'.anchor('app/pengiriman/view/'.str_replace('/', '-', $value->kode_pengiriman).'/menunggu', '<i class="fa fa-eye"></i> Lihat', 'class="btn btn-default btn-xs"').'</td>';
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
