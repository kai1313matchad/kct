<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <meta name="description" content="PT Kreasi Cipta Tritunggal is a company focused on the field of construction, furniture, and advertising">
    <meta name="keywords" content="business, furniture, engineering, industrial, manufacturing, mechanical, multipurpose, construction">
    <meta name="author" content="kaisha1313">
    <?php if(isset($meta)) {
      foreach ($meta as $meta) {
        echo $meta;
      }
    }?>
    <!-- ==============================================
    Favicons
    =============================================== -->
    <link rel="shortcut icon" href="<?= base_url()?>assets/v1/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?= base_url()?>assets/v1/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>assets/v1/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>assets/v1/images/apple-touch-icon-114x114.png">

    <!-- ==============================================
    CSS VENDOR
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/vendor/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/vendor/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/vendor/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/nice-select.css">
    
    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/v1/css/shop.css">
    <script src="<?= base_url()?>assets/v1/js/vendor/modernizr.min.js"></script>
  </head>