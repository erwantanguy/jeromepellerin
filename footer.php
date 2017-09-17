	</div>

	<?php //get_template_part('monfooter'); ?>
		<footer class="container">
			<div class="row">
                            
				<div class="col-sm-8">
					<nav>
						<?php wp_nav_menu(array(
					'theme_location' => 'troisieme',
					'walker' => new Bootstrap_Walker_Nav_Menu(),
					'menu_class' => 'col-sm-12 nav navbar-nav'
				) );
				?>
					</nav>
				</div>

				<div class="hidden-xs hidden-sm hidden-lg hidden-md text-center">
					
					<p class="sub">
						<?php if(get_field('texte_footer','option'))
                                                     {//the_field('texte_footer','option');$titre=get_field('texte_footer','option');                                               
                                                }
                                                else{echo '&copy; Copyright 2016 Les chemins du patrimoine - Tous droits reservés';} ?>
					</p>
				</div>

				<div id="logo-footer" class="col-xs-offset-3 col-sm-offset-0 col-xs-6 col-sm-4 text-right nav"><!-- col-sm-offset-3 -->
					<?php if ( get_field('logo', 'option') ) {?>
						<?php //$image = get_field('logo_footer', 'option'); //var_dump($image); ?>
						<a href="<?php //bloginfo('url'); ?>#top" class="inner-link">
							<?php if(!$image){the_field('texte_footer', 'options');} 
                                                        else{echo'<img src="'.$image['sizes']['medium'].'" alt="'.$image['alt'].'" title="'.$titre.'" />';} ?>
						</a>
					<?php }
                                        else{?>
						<a href="<?php bloginfo('url'); ?>">
							<?php if(!$image){bloginfo('name');}
                                                        else{echo'<img src="'.$image['sizes']['calendar'].'" alt="'.$image['alt'].'" width="'.$image['width'].'" height="'.$image['height'].'" title="'.$titre.'" />';} ?>
      					</a>
      				<?php }?>
				</div>
			</div>
				<?php wp_footer(); ?>
				<script type='text/javascript' src='http://schad-bretagne.fr/wp-content/plugins/enjoy-instagram-instagram-responsive-images-gallery-and-carousel/js/owl.carousel.js?ver=4.5'></script>
				<script type='text/javascript' src='http://schad-bretagne.fr/wp-content/plugins/enjoy-instagram-instagram-responsive-images-gallery-and-carousel/js/jquery.swipebox.js?ver=4.5'></script>
				<script type='text/javascript' src='http://schad-bretagne.fr/wp-content/plugins/enjoy-instagram-instagram-responsive-images-gallery-and-carousel/js/modernizr.custom.26633.js?ver=4.5'></script>
				<script type='text/javascript' src='http://schad-bretagne.fr/wp-content/plugins/enjoy-instagram-instagram-responsive-images-gallery-and-carousel/js/jquery.gridrotator.js?ver=4.5'></script>
				<script type='text/javascript' src='http://schad-bretagne.fr/wp-content/plugins/enjoy-instagram-instagram-responsive-images-gallery-and-carousel/js/ios-orientationchange-fix.js?ver=4.5'></script>
				<script type='text/javascript' src='http://schad-bretagne.fr/wp-content/plugins/super-rss-reader/public/srr-js.js?ver=4.5'></script>
			</footer>
	
		</div>
		<?php 
		//echo get_bloginfo(‘template_url’).'<br>';
		//echo get_template().'<br>';
		//echo get_template_directory_uri().'<br>';
		//echo get_stylesheet_directory_uri().'<br>';
		//bloginfo('template_url');
		?>
        <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/flexslider.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/smooth-scroll.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/placeholders.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/twitterfetcher.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/spectragram.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/parallax.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script> -->
        <?php if(is_home()) :?>
        <script>
			$(document).ready(function() {
				$(".owl-item .box > a").removeClass( "swipebox" );
			});
			$(window).load(function() {
				 // executes when complete page is fully loaded, including all frames, objects and images
				 //alert("window is loaded");
				 //$(".owl-item .box > a").removeClass( "swipebox" );
			});
		</script>
		<?php endif; ?>
		<?php
		if ( is_admin_bar_showing() ) {?>
		    <style>
		    	@media screen and (min-width: 768px){
		    		body > nav.navbar-default{
		    			top: 32px !important;
		    		}
		    	}
		    </style>
		<?php }
		?>
	</body>
</html>