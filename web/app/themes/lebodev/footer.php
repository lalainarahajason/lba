<?php
/**
 * Created by Clapat.
 * Date: 18/05/20
 * Time: 11:14 AM
 */
?>
			<?php
				
			// display footer section
			get_template_part('sections/footer_section'); 
				
			?>
			
			<div id="app"></div>
			
			</div>
			<!--/Page Content -->
		</div>
		<!--/Cd-main-content -->
</div>
	<!--/Main -->	
	
	<div class="cd-cover-layer"></div>
    <div id="magic-cursor" <?php if( !lebotheme_get_theme_options('clapat_lebotheme_enable_magic_cursor') ){ echo "class='disable-cursor'"; } ?>>
        <div id="ball">
        	<div id="ball-drag"></div>
        	<div id="ball-loader"></div>
        </div>
    </div>
    <div id="clone-image"></div>
    <div id="rotate-device"></div>
<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script> 

</body>
</html>
