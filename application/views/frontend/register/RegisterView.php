<div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="<?=site_url()?>">Home</a>
                        </li>
                        <li>Daftar / Masuk</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Daftar</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>

                        <hr>

                        <form action="<?=site_url("register/process")?>" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"  value="<?=set_value("name")?>">
                                <span style="color:red;"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?=set_value("email")?>">
                                <span style="color:red;"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Username</label>
                                <input type="text" class="form-control" id="username" name="username"  value="<?=set_value("username")?>">
                                <span style="color:red;"><?php echo form_error('username'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <span style="color:red;"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Masuk</h1>

                        <p class="lead">Already our customer?</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                            mi vitae est. Mauris placerat eleifend leo.</p>

                        <hr>

                        <?php echo $this->session->flashdata('notifWrongUserPass'); ?>

                        <form action="<?=site_url("pelanggan/process")?>" method="post">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input type="text" class="form-control" id="username_login" name="username_login" required>
                                <span style="color:red;"><?php echo form_error('username_login'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password_login" name="password_login" required>
                                <span style="color:red;"><?php echo form_error('password_login'); ?></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
