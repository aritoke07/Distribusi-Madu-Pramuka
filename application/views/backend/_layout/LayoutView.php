<!DOCTYPE html>
<html lang="en">
  <head>

  <?php if ($Header): echo $Header; endif; ?>
</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <?php if ($SideMenu): echo $SideMenu; endif; ?>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="<?=site_url('assets/backend/images/img.jpg')?>" alt=""> -->
                    <?=ucfirst($this->session->userdata("nama"))?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perbarui Password</a></li>
                    <li><a href="<?=site_url('app/pengguna/keluar')?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <?php if ($Content): echo $Content; endif; ?>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php if ($Footer): echo $Footer; endif; ?>
</body>
</html>
