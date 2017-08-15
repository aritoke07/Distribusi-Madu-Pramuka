<meta charset="utf-8">
<meta name="robots" content="all,follow">
<meta name="googlebot" content="index,follow,snippet,archive">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Obaju e-commerce template">
<meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
<meta name="keywords" content="">

<title>
    <?=$this->title?>
</title>

<meta name="keywords" content="">

<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

<!-- styles -->
<link href="<?=site_url('assets/frontend/css/font-awesome.css')?>" rel="stylesheet">
<link href="<?=site_url('assets/frontend/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?=site_url('assets/frontend/css/animate.min.css')?>" rel="stylesheet">
<link href="<?=site_url('assets/frontend/css/owl.carousel.css')?>" rel="stylesheet">
<link href="<?=site_url('assets/frontend/css/owl.theme.css')?>" rel="stylesheet">

<!-- theme stylesheet -->
<link href="<?=site_url('assets/frontend/css/style.default.css')?>" rel="stylesheet" id="theme-stylesheet">

<!-- your stylesheet with modifications -->
<link href="<?=site_url('assets/frontend/css/custom.css')?>" rel="stylesheet">

<?php
// add more css
if ($addCss) {
    foreach ($addCss as $css) {
        echo '<link href="'.site_url($css).'" rel="stylesheet">';
        echo "\n";
    }
}
?>

<script src="<?=site_url('assets/frontend/js/respond.min.js')?>"></script>
<script src="<?=site_url('public/core/GlobalUrl.js')?>"></script>

<link rel="shortcut icon" href="<?=site_url('assets/frontend/img/favicon.png')?>">

<?php
// add more js
if ($addJs) {
    foreach ($addJs as $js) {
        echo '<script src="'.site_url($js).'"></script>';
        echo "\n";
    }
}
?>
