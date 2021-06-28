<footer>
	<div id="footer-container" class="d-flex flex-wrap align-items-center my-4">
		<?php if(is_home() || is_front_page()) : ?>
			<div class="col-12 col-sm-4"></div>
		<?php else : ?>
			<div class="col-12 col-sm-2"></div>
		<?php endif; ?>
		<div class="col-12 col-sm-2">
			<span class="small">&copy; <?php echo date('Y'); ?> leBoStudio</span><!--  Tous droits réservés leBo studio -->
		</div>
		<?php if(!is_home() && !is_front_page()) : ?>
			<div class="col-12 col-sm-4 d-flex align-items-center justify-content-center">
				<span class="poppins contact-mail font-weight-500 px-2"> <a href="mailto:contact@lebostudio.fr"> Contact@lebostudio.fr</a></span>
				<span class="silk contact-phone px-2" style="padding-top:7px;"> <a href="tel:+33 01 33 33 60 32">09 51 14 87 65</a></span>
			</div>
		<?php endif; ?>
		<div class="mentions text-center text-sm-right col-12 col-sm-2 <?php if(is_home() || is_front_page()) : ?>text-left<?php endif; ?>">
			<a href="https://www.lebostudio.fr/mentions-legales"><span class="small">Mentions légales</span></a>
			<a href="#main" class="go-top d-flex align-items-center justify-content-center">
				<img src="<?php echo get_template_directory_uri();?>/images/top.svg" alt="">
			</a>
		</div>
		
		<?php if(is_home() || is_front_page()) : ?>
			<div class="col-12 col-sm-4"></div>
		<?php else : ?>
			<div class="col-12 col-sm-2"></div>
		<?php endif; ?>
	</div>
</footer>