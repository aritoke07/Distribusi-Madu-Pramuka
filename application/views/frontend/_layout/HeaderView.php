<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <!-- <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a> -->
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                <?php if ($this->session->userdata("login")==TRUE): ?>
                <li><a href="<?=site_url("pelanggan")?>"><?php echo ucfirst($this->session->userdata("nama")) ?></a>
                </li>
                <?php endif; ?>
                <?php if ($this->session->userdata("login")!=TRUE): ?>
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Masuk</a>
                </li>
                <li><a href="<?=site_url("register")?>">Daftar</a>
                </li>
                <?php endif; ?>
                <li><a href="<?=site_url("contact")?>">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username_modal" name="username_modal" placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_modal" name="password_modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button type="button" class="btn btn-primary" id="btnLoginModal" name="btnLoginModal"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
