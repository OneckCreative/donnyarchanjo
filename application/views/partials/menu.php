<div id="loading-screen" class="template-section cadre"></div>
	<div class="hidden">
		<script type="text/javascript">
			var images = new Array()
			function preload() {
				for (i = 0; i < preload.arguments.length; i++) {
					images[i] = new Image()
					images[i].src = preload.arguments[i]
				}
			}
			preload(
				"<?php echo base_url();?>assets/images/menu/default-bg.jpg",
				"<?php echo base_url();?>assets/images/menu/atelier-bg.jpg",
				"<?php echo base_url();?>assets/images/menu/tendencias-bg.jpg",
				"<?php echo base_url();?>assets/images/menu/colecoes-bg.jpg",
				"<?php echo base_url();?>assets/images/menu/contato-bg.jpg",
			)
		</script>
	</div>
	<div class="menu cadre">
		<div class="leftSide">
			<img src="assets/images/logo.svg" alt="Donny Archanjo Atelier" width="250">
		</div>
		<div class="hvCentered_wrapper t-center">
			<div class="hvCentered_element">
				<nav>
					<a href="<?php echo base_url();?>" data-img="<?php echo base_url();?>assets/images/menu/default-bg.jpg"><span>I</span> <span class="dashed"></span><span>Home</span></a>
					<a href="atelier.html" data-img="<?php echo base_url();?>assets/images/menu/atelier-bg.jpg"><span>II</span> <span class="dashed"></span><span>Ateliê</span></a>
					<a href="tendencias.html" data-img="<?php echo base_url();?>assets/images/menu/tendencias-bg.jpg"><span>III</span> <span class="dashed"></span><span>Tendências</span></a>
					<a href="colecoes.html" data-img="<?php echo base_url();?>assets/images/menu/colecoes-bg.jpg"><span>IV</span> <span class="dashed"></span><span>Coleções</span></a>
					<a href="contato.html" data-img="<?php echo base_url();?>assets/images/menu/contato-bg.jpg"><span>V</span> <span class="dashed"></span><span>Fale conosco</span></a>
				</nav>
			</div>
		</div>
		<div class="closeIcon"><span></span><span></span></div>
	</div>
	<div class="menuButton">
		<div class="menuIcon menuButton_icon">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<p class="menuButton_text">Menu</p>
	</div>