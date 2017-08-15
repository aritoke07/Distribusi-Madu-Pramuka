<script src="<?=site_url('assets/frontend/js/jquery-1.11.0.min.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/bootstrap.min.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/jquery.cookie.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/waypoints.min.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/modernizr.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/bootstrap-hover-dropdown.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/owl.carousel.min.js')?>"></script>
<script src="<?=site_url('assets/frontend/js/front.js')?>"></script>
<script src="<?=site_url('public/master/frontend/Custome.js')?>"></script>

<?php
if ($addJs) {
    foreach ($addJs as $js) {
        echo '<script src="'.site_url($js).'"></script>';
        echo "\n";
    }
}
?>
