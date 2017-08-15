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
                                <li>
                                    <a href="<?php echo site_url('pelanggan') ?>"><i class="fa fa-list"></i> Order</a>
                                </li>
                                <li class="active">
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
                        <h1>List orders</h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Order</th>
                                        <th>Tanggal Order</th>
                                        <th>Tanggal Penerimaan</th>
                                        <th>Status</th>
                                        <th>Total Pembayaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($pro_order as $p_order) {
                                        echo '<tr>';
                                            echo '<td>'.$no++.'</td>';
                                            echo '<td>'.$p_order->kode_order.'</td>';
                                            echo '<td>'.$p_order->tanggal_order.'</td>';
                                            echo '<td>'.($p_order->tanggal_penerimaan==0 ? null : $p_order->tanggal_penerimaan).'</td>';
                                            echo '<td>'.$this->convert->OrderStatus($p_order->status).'</td>';
                                            echo '<td>'.$this->convert->FormatRupiah($p_order->total_pembayaran).'</td>';
                                            echo '<td>'.anchor('pelanggan/print_order/'.str_replace('/', '-', $p_order->kode_order).'/'.$p_order->id_pelanggan, '<i class="fa fa-print"> Print', 'class="btn btn-success" target="_blank"').'</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
