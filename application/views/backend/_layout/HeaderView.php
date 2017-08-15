  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$this->title?></title>

    <!-- Bootstrap -->
    <link href="<?=site_url('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=site_url('assets/backend/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=site_url('assets/backend/vendors/nprogress/nprogress.css')?>" rel="stylesheet">

    <!-- Add Plugin -->
    <?php
    // add more css
    if ($addCss) {
        foreach ($addCss as $css) {
            echo '<link href="'.site_url($css).'" rel="stylesheet">';
            echo "\n";
        }
    }
    ?>

    <!-- Custom Theme Style -->
    <link href="<?=site_url('assets/backend/build/css/custom.min.css')?>" rel="stylesheet">

    <!-- Global Urls -->
    <script type="text/javascript" src="<?=site_url('public/core/GlobalUrl.js')?>"></script>

    <!-- Add Plugin -->
    <?php
    // add more js
    if ($addJs) {
        foreach ($addJs as $js) {
            echo '<script src="'.site_url($js).'"></script>';
            echo "\n";
        }
    }
    ?>
