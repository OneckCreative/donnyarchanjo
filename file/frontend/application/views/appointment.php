<?php
	require_once "includes/header.php";	
?>

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
		<div class="row" style="margin-top: 10px;">
			<div class="col-sm-4">&nbsp;</div>
			<div class="col-sm-4" style="text-align: center; font-size: 25px; color: #FFF; font-weight: bold;">
				<?php echo $site_name; ?>
				<!-- <center><img src="<?=base_url()?>assets/images/logo.png" height="100px" /></center> -->
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-sm-4">&nbsp;</div>
			<div class="col-sm-4">
				
				<form action="<?=base_url()?>appointment/makeAppointment" method="post" id="msform">
					
					<!-- progressbar -->
					<ul id="progressbar">
						<li class="active">Choose Your Service</li>
						<li>Appointment Time</li>
						<li>Personal Details</li>
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
		<div class="sec_next action-button" style="width: 100%;">Another Appointment</div>
	</a>
</fieldset>
					<?php
						} else {
					?>
					
						<h2 class="fs-title">Choose Your Service</h2>
						<h3 class="fs-subtitle">Step 1</h3>
						
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
						
						<input type="button" name="next" class="next action-button" value="Next" />
					</fieldset>
					
					<!-- fieldsets -->
					<fieldset>
						<h2 class="fs-title">Appointment Time</h2>
						<h3 class="fs-subtitle">Step 2</h3>
						
						<input type="text" id="datepicker" name="appointment_date" placeholder="Appointment Date" autocomplete="off" />
						<input type="text" id="timepicker" class="time" class="form-control" name="appointment_time" placeholder="00:00am" />
						
						<input type="button" name="previous" class="previous action-button" value="Previous" />
						<input type="button" name="next" class="sec_next action-button" value="Next" id="second_step" />
					</fieldset>
					
					<!-- fieldsets -->
					<fieldset>
						<h2 class="fs-title">Personal Details</h2>
						<h3 class="fs-subtitle">Step 3</h3>
						
						<input type="text" name="fname" id="fname" placeholder="First Name" />
						<input type="text" name="lname" id="lname" placeholder="Last Name" />
						<input type="email" name="email" id="email" placeholder="Email Address" />
						
						<input type="button" name="previous" class="previous action-button" value="Previous" />
						<input type="submit" name="submit" class="submit action-button" value="Submit" />
					</fieldset>
				<?php
					}	
				?>
					
				</form>
				
			</div>
			<div class="col-sm-4">&nbsp;</div>
		</div>
	</div>


<?php
	require_once 'includes/footer.php';	
?>