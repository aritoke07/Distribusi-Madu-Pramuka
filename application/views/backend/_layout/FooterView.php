<!-- jQuery -->
    <script src="<?=site_url('assets/backend/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?=site_url('assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=site_url('assets/backend/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?=site_url('assets/backend/vendors/nprogress/nprogress.js')?>"></script>
    
    <!-- Add Plugin -->
    <?php 
    if ($addJs) {
        foreach ($addJs as $js) {
            echo '<script src="'.site_url($js).'"></script>';
            echo "\n";
        }
    }
    ?>

    <!-- Custom Theme Scripts -->
    <script src="<?=site_url('assets/backend/build/js/custom.min.js')?>"></script>
    