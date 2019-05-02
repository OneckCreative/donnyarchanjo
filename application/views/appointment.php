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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
	$( function(){
		$( "#datepicker" ).datepicker();
	});
</script>	

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.timepicker.css" />
<script src="<?=base_url()?>assets/js/jquery.timepicker.js"></script>
<script src="<?=base_url()?>assets/js/jquery.timepicker.min.js"></script>
<script src="<?=base_url()?>assets/js/jt.timepicker.jquery.json"></script>
<script type="text/javascript">
	$(function() {
        $('#timepicker').timepicker();
    });
</script>

	<div class="container-fluid">
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-sm-4">&nbsp;</div>
			<div class="col-sm-4">				
				<form action="<?=base_url()?>appointment/makeAppointment" method="post" id="msform">
					
					<!-- progressbar -->
					<ul id="progressbar">
						<li class="active">Assunto</li>
						<li>Data e hora</li>
						<li>Informações</li>
					</ul>
					
					<!-- fieldsets -->
					<fieldset>
					<?php
						if(!empty($alert_msg))	{
							$flash_desc 	= $alert_msg[2];
					?>
<div class="row">
	<div class="col-sm-12" style="text-align: center; font-size: 21px; color: #27ae60; padding: 10px 0px;">
		<?php echo $flash_desc; ?>
	</div>
</div>
<fieldset style="margin-top: 50px;">
	<a href="<?=base_url()?>" style="text-decoration: none;">
		<div class="sec_next action-button" style="width: 100%;">Outro agendamento</div>
	</a>
</fieldset>
					<?php
						} else {
					?>
					
						<h2 class="fs-title">Escolha o tipo</h2>						
						<div class="service_selector" style="overflow-y: scroll; height: 220px;">
							<?php
								$serviceResult 	= $this->db->query("SELECT * FROM services WHERE status = '1' ");
								$serviceData 	= $serviceResult->result();
								for($i = 0; $i < count($serviceData); $i++){
									$service_id 	= $serviceData[$i]->id;
									$service_name 	= $serviceData[$i]->service_name;
							?>
					<input id="ser_<?php echo $service_id; ?>" type="radio" name="service" value="<?php echo $service_id; ?>" style="border: 0px;" />
					<label class="service_each" for="ser_<?php echo $service_id; ?>"><?php echo $service_name; ?></label>
							<?php
									unset($service_id);
									unset($service_name);
								}
								unset($serviceResult);
								unset($serviceData);
							?>
							
							
						</div>						
						<input type="button" name="next" class="next action-button" value="Avançar" />
					</fieldset>					
					<!-- fieldsets -->
					<fieldset>
						<h2 class="fs-title">Data da visita</h2>
						
						<input type="text" id="datepicker" name="appointment_date" placeholder="Escolha a data da visita" autocomplete="off" />
						<input type="text" id="timepicker" class="time" class="form-control" name="appointment_time" placeholder="00:00am" />
						
						<input type="button" name="previous" class="previous action-button" value="Voltar" />
						<input type="button" name="next" class="sec_next action-button" value="Avançar" id="second_step" />
					</fieldset>
					
					<!-- fieldsets -->
					<fieldset>
						<h2 class="fs-title">Informações de contato</h2>						
						<input type="text" name="fname" id="fname" placeholder="Nome " />
						<input type="text" name="lname" id="lname" placeholder="Sobrenome" />
						<input type="email" name="email" id="email" placeholder="Seu email" />
						
						<input type="button" name="previous" class="previous action-button" value="Voltar" />
						<input type="submit" name="submit" class="submit action-button" value="Avançar" />
					</fieldset>
				<?php
					}	
				?>
					
				</form>
				
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>
	</div>


</body>
</html>