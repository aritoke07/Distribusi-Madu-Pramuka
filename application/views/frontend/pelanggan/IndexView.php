<div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><?php echo ucfirst($this->session->userdata("nama")) ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="<?php echo site_url('pelanggan') ?>"><i class="fa fa-list"></i> Order</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pelanggan/list_order') ?>"><i class="fa fa-hdd-o"></i> List Order</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('pelanggan/data_pengguna/'.$this->session->userdata('username')) ?>"><i class="fa fa-user"></i> Data Pengguna</a>
                                </li>
                                <li>
                                    <a href="<?=site_url("pelanggan/logout")?>"><i class="fa fa-sign-out"></i> Keluar</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Madu</th>
                                        <th>Kemasan</th>
                                        <th>Jumlah</th>
                                        <th>Kode Order</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($this->cart->contents() as $item) {
                                        echo '<tr>';
                                            echo '<td width="10px">'.$no++.'</td>';
                                            echo '<td>'.$this->db->get_where('tbl_madu', array('id_madu' => $item['name']))->row()->nama.'</td>';
                                            echo '<td>'.$item['options']['kemasan'].'</td>';
                                            echo '<td width="80px"><input type="number" id="'.$item['rowid'].'" name="'.$item['rowid'].'" value="'.$item['qty'].'" class="form-control"></td>';
                                            echo '<td>'.$this->db->get('tbl_kedai', array('id_kedai' => $item['options']['kedai']))->row()->nama.'</td>';
                                            echo '<td><input type="text" class="form-control" id="'.$item['rowid'].'" name="'.$item['rowid'].'" value="'.$this->convert->FormatRupiah($item['subtotal']).'" readonly /></td>';
                                            echo '<td width="10px">';
                                                echo anchor('cart/delete/'.$item['rowid'], 'Hapus', 'class="btn btn-danger"');
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <br>
                            <?php if ($this->cart->total()!=0): ?>
                            <table class="table table-condensed">
                                <tr>
                                    <td><b>Total Pembayaran</b></td>
                                    <td><input type="text" class="form-control" id="total_price" name="total_price" value="<?php echo $this->convert->FormatRupiah($this->cart->total()) ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td><b>Upload Gambar Pembayaran</b></td>
                                    <td>
                                        <input type="file" class="form-control" id="fileupload" name="files">
                                        <input type="hidden" id="gambar_nama" name="gambar_nama">
                                        <div id="progress" class="progress col-md-12">
                                            <div class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="button" class="btn btn-primary" id="btnCheckOut" name="btnCheckOut">Lakukan Pembayaran</button></td>
                                </tr>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
