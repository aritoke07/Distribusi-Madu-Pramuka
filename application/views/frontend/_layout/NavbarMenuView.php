<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="<?=site_url()?>" data-animate-hover="bounce">
                <img src="<?=site_url('assets/frontend/img/logo.png')?>" alt="Obaju logo" class="hidden-xs">
                <img src="<?=site_url('assets/frontend/img/logo-small.png')?>" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li <?php echo ($this->uri->segment(1)=="" ? 'class="active"' : null) ?>><a href="<?=site_url()?>">Home</a></li>
                <li <?php echo ($this->uri->segment(1)=="about" ? 'class="active"' : null) ?>><a href="<?=site_url("about")?>">Tentang Madu</a></li>
                <!-- <li><a href="<?=site_url("menu")?>">Menu</a></li> -->
                <li <?php echo ($this->uri->segment(1)=="lokasikedai" ? 'class="active' : ($this->uri->segment(1)=="menu") ? 'class="active"' : null) ?>><a href="<?=site_url("lokasikedai")?>">Lokasi Kedai Madu</a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="<?php echo site_url('pelanggan') ?>" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo (empty(count($this->cart->contents())) ? null : $this->cart->total_items()) ?> items in cart</span></a>
            </div>
        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
