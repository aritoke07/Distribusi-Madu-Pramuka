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
                                <li>
                                    <a href="<?php echo site_url('pelanggan/list_order') ?>"><i class="fa fa-hdd-o"></i> List Order</a>
                                </li>
                                <li class="active">
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

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <h3>Change password</h3>

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">Old password</label>
                                        <input type="password" class="form-control" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">New password</label>
                                        <input type="password" class="form-control" id="password_2">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-primary" id="btnSavePassword" name="btnSavePassword"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Personal details</h3>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" value="<?php echo $row->username ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" value="<?php echo $row->nama ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat"	value="<?php echo $row->alamat ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="telp">Telp</label>
                                        <input type="text" class="form-control" id="telp" value="<?php echo $row->telp ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="handphone">Handphone</label>
                                        <input type="text" class="form-control" id="handphone" value="<?php echo $row->handphone ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" value="<?php echo $row->email ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="button" class="btn btn-primary" id="btnUpdatePelanggan"><i class="fa fa-save"></i> Save changes</button>
                                    <button type="button" class="btn btn-danger" id="btnDeletePelanggan" onclick="location.href='<?php echo site_url("pelanggan/delete/".$this->session->userdata('username')) ?>'"><i class="fa fa-ban"></i> Hapus Pengguna</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>