<?php
	$siteSettingResult 		= $this->db->get_where('setting'); 
	$siteSettingData 		= $siteSettingResult->result();
	
	$site_name 				= $siteSettingData[0]->site_name;
	$site_url 				= $siteSettingData[0]->site_url;
	
	$alert_msg 				= $this->session->flashdata('alert_msg');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceSimple"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceSimple"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceSimple"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceSimple"> <![endif]-->
<!--[if !IE]><!--><html class="paceSimple"><!-- <![endif]-->
<head>
    <title><?php echo $site_name; ?></title>

    <meta charset="utf-8">    
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/styles.css" />
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <!-- Form -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/stepbystep_styles.css" />
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/stepbystep.js"></script>
    
    <!-- Responsive -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    
</head>
<body>