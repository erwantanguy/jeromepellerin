<?php /*
Template name: Présentations
 */
?>
<?php get_header(); ?>
		<section class="row">
			<header class="col-md-12<?php if(get_the_post_thumbnail()){echo ' vertical';}?>">
				<?php include 'entete.php'; ?>
				<h1><?php the_title(); ?></h1>
			</header>
			<?php include 'breadcrumb.php'; ?>
			<main class="col-md-8">
				<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php //endwhile; endif; ?>
				<?php if(get_field('code_video')){ ?>
				<aside id="video">
					<div class="embed-responsive embed-responsive-16by9">
						<?php the_field('code_video'); ?>
					</div>
				</aside>
				<?php }?>
			</main>
			<aside class="col-md-4">
				<?php if(get_field('colonne_droite')){?>
					<?php $image = get_field('colonne_droite'); ?>
					<img src="<?php echo $image[sizes][sidebar]; ?>" class="test" alt="<?php echo $image[alt]; ?>">
				<?php }else{
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page') );
				}?>
			</aside>
			<?php if( have_rows('les_blocs','option') ):
			while ( have_rows('les_blocs','option') ) : the_row();
			if( have_rows('bloc','option') ):
			while ( have_rows('bloc','option') ) : the_row();
			if( get_row_layout() == 'map_events' ):?>
    	<style type="text/css">
			
			.acf-map {
				width: 100%;
				height: 400px;
				border: none;
				background-color:#000;
			}
			
			/* fixes potential theme css conflict */
			.acf-map img {
			   max-width: inherit !important;
			}
			.acf-map img.logo{
				max-width: 100% !important;
			}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
				<script type="text/javascript">
				(function($) {
				
				/*
				*  new_map
				*
				*  This function will render a Google Map onto the selected jQuery element
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	$el (jQuery element)
				*  @return	n/a
				*/
				
				function new_map( $el ) {
					
					// var
					var $markers = $el.find('.marker');
					
					
					// vars
					var args = {
						zoom		: 16,
						center		: new google.maps.LatLng(0, 0),
						mapTypeId	: google.maps.MapTypeId.ROADMAP
					};
					
					
					// create map	        	
					var map = new google.maps.Map( $el[0], args);
					
					
					// add a markers reference
					map.markers = [];
					
					
					// add markers
					$markers.each(function(){
						
				    	add_marker( $(this), map );
						
					});
					
					
					// center map
					center_map( map );
					
					
					// return
					return map;
					
				}
				
				/*
				*  add_marker
				*
				*  This function will add a marker to the selected Google Map
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	$marker (jQuery element)
				*  @param	map (Google Map object)
				*  @return	n/a
				*/
				
				function add_marker( $marker, map ) {
				
					// var
					var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
				
					// create marker
					var marker = new google.maps.Marker({
						position	: latlng,
						map			: map
					});
				
					// add to array
					map.markers.push( marker );
				
					// if marker contains HTML, add it to an infoWindow
					if( $marker.html() )
					{
						// create info window
						var infowindow = new google.maps.InfoWindow({
							content		: $marker.html()
						});
				
						// show info window when marker is clicked
						google.maps.event.addListener(marker, 'click', function() {
				
							infowindow.open( map, marker );
				
						});
					}
				
				}
				
				/*
				*  center_map
				*
				*  This function will center the map, showing all markers attached to this map
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	map (Google Map object)
				*  @return	n/a
				*/
				
				function center_map( map ) {
				
					// vars
					var bounds = new google.maps.LatLngBounds();
				
					// loop through all markers and create bounds
					$.each( map.markers, function( i, marker ){
				
						var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
				
						bounds.extend( latlng );
				
					});
				
					// only 1 marker?
					if( map.markers.length == 1 )
					{
						// set center of map
					    map.setCenter( bounds.getCenter() );
					    map.setZoom( 16 );
					}
					else
					{
						// fit to bounds
						map.fitBounds( bounds );
					}
				
				}
				
				/*
				*  document ready
				*
				*  This function will render each map when the document is ready (page has loaded)
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	5.0.0
				*
				*  @param	n/a
				*  @return	n/a
				*/
				// global var
				var map = null;
				
				$(document).ready(function(){
				
					$('.acf-map').each(function(){
				
						// create map
						map = new_map( $(this) );
				
					});
				
				});
				
				})(jQuery);
				</script>
    			<div class="col-md-8" id="map">	
    				<div class="acf-map">
    					<?php
						if( have_rows('map') ):
							$map=0;
						    while ( have_rows('map') ) : the_row();
						    	$location[$map] = get_sub_field('map');
						    	$image=get_sub_field('image');?>
						    	<div class="marker row" data-lat="<?php echo $location[$map]['lat']; ?>" data-lng="<?php echo $location[$map]['lng']; ?>">
						    		<div class="col-sm-6">
						    		<img src="<?php echo $image[sizes][calendar]; ?>" alt="<?php $image[alt]; ?>" class="logo">
						    		<h4><?php the_sub_field('nom'); ?></h4>
						    		</div>
						    		<div class="col-sm-6">
									<!-- <p class="address"><?php echo $location[$map]['address']; ?></p> -->
									<?php the_sub_field('descriptif'); ?>
									<?php $id=get_sub_field('url'); $lien = get_term_by('id', $id, 'lieux');?>
									<a href="<?php echo get_bloginfo('url').'/'.$lien->taxonomy.'/'.$lien->slug; ?>" class="btn btn-default">Découvrir le lieu et les oeuvres</a>
									</div>
						    	</div>
						    	<?php $map++;
						    endwhile;
						else :
						    // no rows found
						endif;
						endif;
						endwhile;
						endif;
						endwhile;
						endif;
						?>
		</div></div>
		<aside id="lieux" class="col-md-4"><h3>Accès direct sur les pages des lieux</h3><?php wp_nav_menu( array( 'theme_location' => 'lieux','menu_class' => 'nav navbar-nav col-sm-12' ) ); ?></aside>
</section>


<?php get_footer(); ?>