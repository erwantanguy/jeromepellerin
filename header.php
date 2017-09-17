<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>
			<?php 
				if(is_home() || is_front_page()) :
					bloginfo('name');
				else :
					wp_title("", true);
				endif;
			?>
		</title>
		<meta name="author" content="Jérôme Pellerin">
		<meta property="fb:admins" content="100009528190403" />
		<?php $date = new DateTime();?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?ver=<?php echo $date->format('His')?>" />
		<!--<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); echo '?ver=' . filemtime( get_bloginfo( 'stylesheet_url' ) ); ?>" type="text/css" media="screen" />     <?php bloginfo('template_url'); ?>/js/jquery.min.js <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    <script src="<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js?ver=1.12.3"></script>  -->
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
		<?php if ( is_home() || is_page() || is_single() /*|| is_tax()*/ ){?>
		<script>
			jQuery(document).ready(function(){
				jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
				jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
				//jQuery('.carousel-inner').css('display','none');
				jQuery('.carousel').carousel({
					interval:5000
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				
			});
		</script>
		<?php } ?>
		<?php wp_head(); ?>
		<?php if ( is_home() ){ 
			if( get_field('image_à_la_une','option') ) {?>
				<?php 
				$image = get_field('image_à_la_une','option');
				//print_r($image); ?>
			<meta property="og:image" content="<?php echo $image[url]; ?>" />
			<meta property="og:image:width" content="<?php echo $image[width]; ?>" />
			<meta property="og:image:height" content="<?php echo $image[height]; ?>" />
			<meta name="twitter:image" content="<?php echo $image[url]; ?>" />
		<?php } } ?>
                        <?php if(get_field('zigouigoui', 'option')): $zigouigoui = get_field('zigouigoui', 'option');?>
                        <style>
                            body > footer .row::before{
                                content:url(<?php echo $zigouigoui[url]; ?>);
                            }
                        </style>
                        <?php endif; ?>
	</head>

	<body <?php body_class(); ?> id="top">
		<nav class="navbar navbar-default">
		<div class="container">
			
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	          <button aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand visible-xs-block" href="#">Menu</a>
	        </div>
	        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
	          <?php wp_nav_menu(array(
					'theme_location' => 'premier',
					'container'         => 'div',
                	'container_class'   => '',
        			'container_id'      => '',
                	'menu_class'        => 'nav navbar-nav navbar-right',
                	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                	'walker' => new Bootstrap_Walker_Nav_Menu(),
				) );
				?>
			<?php wp_nav_menu(array(
					'theme_location' => 'deuxieme',
					'container'         => 'div',
                	'container_class'   => '',
        			'container_id'      => '',
                	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker' => new Bootstrap_Walker_Nav_Menu(),
					'menu_class' => 'nav navbar-nav navbar-right'
				) );
				?>
                    <ul class="social-links nav navbar-nav">
						<?php if(get_option('facebook')){?>
							<li><a href="<?php echo get_option('facebook'); ?>" title="Facebook <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php }?>
						<?php if(get_option('twitter')){?>
							<li><a href="<?php echo get_option('twitter'); ?>" title="Twitter <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php }?>
						<?php if(get_option('google')){?>
							<li><a href="<?php echo get_option('google'); ?>" title="Google+ <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php }?>
						<?php if(get_option('instagram')){?>
							<li><a href="<?php echo get_option('instagram'); ?>" title="Instagram <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php }?>
						<?php if(get_option('pinterest')){?>
							<li><a href="<?php echo get_option('pinterest'); ?>" title="Pinterest <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php }?>
						<?php if(get_option('flickr')){?>
							<li><a href="<?php echo get_option('flickr'); ?>" title="Flickr <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
						<?php }?>
						<?php if(get_option('spotify')){?>
							<li><a href="<?php echo get_option('spotify'); ?>" title="Spotify <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
						<?php }?>
                                                <?php if(get_option('linkedin')){?>
							<li><a href="<?php echo get_option('linkedin'); ?>" title="LinkedIn <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php }?>
                                                <?php if(get_option('tumblr')){?>
							<li><a href="<?php echo get_option('tumblr'); ?>" title="Tumblr <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
						<?php }?>
						<?php if(get_option('mail')){?>
							<li class="mail hidden-md"><a href="<?php echo get_option('mail'); ?>" title="Mail à <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
						<?php }?>
					</ul><!-- data-toggle="tooltip" data-placement="bottom"  -->
                </div>
        </div>
        </nav>
        <?php if(is_home()){?>
        <header id="top" class="container">
			<div class="row">
				<?php $image = get_field('logo', 'option');//[sizes][medium]?>
				<?php //print_r($image[sizes]); ?>
				<div id="logo" class="col-md-12"><a href="<?php bloginfo('url'); ?>"><?php if(!$image){bloginfo('name');} else{echo'<img src="'.$image[url].'" alt="'.$image['alt'].'" class="logo" />';} ?></a></div>
				<div id="title" class="hidden"><span><?php bloginfo('name'); ?></span><?php echo html_entity_decode(get_bloginfo('description'));//bloginfo('description'); ?></div>
			</div>
		</header>
		<?php }?>
		<div class="container">