<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
    <?php $this->load->view('partials/css'); ?>
    <?php $this->load->view('partials/js'); ?>
    <meta name="author" content="Oneck Creative">    
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="image" content="<?php echo base_url(); ?><?php echo $image; ?>">
    <meta itemprop="name" content="<?php echo $title; ?>">
    <meta itemprop="description" content="<?php echo $description; ?>">
    <meta itemprop="image" content="<?php echo base_url(); ?><?php echo $image; ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <meta name="twitter:site" content="@oneckcreative">
    <meta name="twitter:creator" content="@oneckcreative">
    <meta name="twitter:image:src" content="<?php echo base_url(); ?><?php echo $image; ?>">
    <meta name="og:title" content="<?php echo $title; ?>">
    <meta name="og:description" content="<?php echo $description; ?>">
    <meta name="og:image" content="<?php echo base_url(); ?><?php echo $image; ?>">
    <meta name="og:url" content="<?php echo base_url(); ?><?php echo $slug; ?>.html">
    <meta name="og:site_name" content="<?php echo $title; ?>">
    <meta name="og:locale" content="pt_BR">
    <meta name="fb:admins" content="100001164935172">
    <meta name="fb:app_id" content="1917974601827716">
    <meta name="og:type" content="website">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url(); ?>assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url(); ?>assets/images/favicon/safari-pinned-tab.svg" color="#0a0a0a">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-config" content="<?php echo base_url(); ?>assets/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">    
</head>
<body>
<?php $this->load->view('partials/menu'); ?>