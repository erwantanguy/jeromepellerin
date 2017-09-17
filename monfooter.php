		<section id="socialmedia" class="row hidden-xs">
			<h3 class="col-md-12"><?php if( get_field('titre_bloc_socialmedia','option') ){ echo get_field('titre_bloc_socialmedia','option'); }else{?>Suivez-nous !<?php }?></h3>
			<div class="col-sm-4">
				<?php
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_1') )
				?>
			</div>
			<div class="col-sm-4">
				<?php
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_2') )
				?>
			</div>
			<div class="col-sm-4">
				<?php
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_3') )
				?>
			</div>
		</section>