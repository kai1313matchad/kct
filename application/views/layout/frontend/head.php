<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PT Kreasi Cipta Tritunggal is a company focused on the field of billboard construction">
    <meta name="author" content="Kaisha">
    <link rel="icon" href="<?php echo base_url();?>assets/img/icon.ico"/>
    <!-- Twitter Card data -->
    <!-- <meta name="twitter:card" value="summary"> -->
    <!-- Open Graph data -->
    <!-- <meta property="og:title" content="PT Kreasi Cipta Tritunggal" /> -->
    <!-- <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.tritunggalmetalworks.com/" />
    <meta property="og:image" content="<?php echo base_url();?>assets/img/tritunggal.png" /> -->
    <!-- <meta property="og:description" content="PT Kreasi Cipta Tritunggal is a company focused on the field of billboard construction" /> -->
    <?php 
         foreach ($meta_add as $key)
         {
                 echo $key."\n";
         }
    ?>
    <title><?php echo $title ; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/css/scrolling-nav.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/extra_frontend.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>