		<?php
			//$post = $_GET['reference'];
			if(!$ajax_query){
				$ajax_query = new WP_Query(array(
					'post_type'		=> 'realisation',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order'   => 'ASC',
					'tax_query' => array(
							array(
									'taxonomy' => 'categorie',
									'field' => 'term_id',
									'terms' => $lieu,
							)
						),
				));
			}
			//print_r($ajax_query);
				?>
		<div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
      <ol class="carousel-indicators hidden-xs">
       <?php rewind_posts(); 
       $toto=0;?>
       <?php if ( $ajax_query->have_posts() ) { ?>
		<?php while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
			<li class="" data-slide-to="<?php echo $toto;$toto++; ?>" data-target="#carousel-example-generic"></li>
		<?php endwhile;  } else{?>
        	<!-- <li class="test" data-slide-to="0" data-target="#carousel-example-generic"></li> -->
        <?php }?>
      </ol>
      <div role="listbox" class="carousel-inner">
      	<?php rewind_posts(); ?>
      	<?php if ( $ajax_query->have_posts() ) { ?>
		<?php while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
        <div class="item">
          <?php 
				//real dimension of the slideshow image is 516w x 248h
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					//the_post_thumbnail(array(4000,9999), array('class' => 'feature-large'));?>
					<a href="<?php the_permalink();?>"><picture id="picture<?php echo $post->ID; ?>">
				<?php 
					$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'tablette' );
					$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sidebar' );
					$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'boutique' );
					$img_id = get_post_thumbnail_id($post->ID);
					$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
					if (!$alt_text){
						$alt_text= get_the_title();
					}
					//echo 'test : '.$alt_text; //echo $test[0]; 
				?>
			    <source srcset="<?php echo $srcmedium[0]; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge[0]; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull[0]; ?>">
			    <img src="<?php echo $srclarge[0]; ?>" srcset="<?php echo $srcfull[0]; ?>" alt="<?php echo $alt_text;?>">
                                            </picture></a>
				<?php	}
				?>
				<div class="carousel-caption">
                                    <?php if(get_field('titre')){ ?>
                                        <h3><a href="<?php the_permalink();?>"><?php the_field('titre');?></a></h3>
                                        <?php $terms = get_the_terms( $post->ID, 'tagexpo' );
                                        foreach($terms as $term){
                                        $term_link = get_term_link( $term );?>
                                        <h4 class="lignes"><a href="<?php echo $term_link; ?>"><?php echo $term->name;?></a></h4>
                                        <?php }?>
                                        
                                    <?php }
                                    else {?>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <?php }?>
				</div>
        </div>
        <?php endwhile;   } 
        else{?>
        	<div class="item">
        		<img alt="First slide [900x500]" src="<?php header_image(); ?>" alt="<?php bloginfo( 'description' ); ?>">
        	</div>
        <?php }?>
      </div>
      <?php if ( $ajax_query->have_posts() ) { ?>
      <a data-slide="prev" role="button" href="#carousel-example-generic" class="left carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a data-slide="next" role="button" href="#carousel-example-generic" class="right carousel-control">
        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
      <?php } ?>
    </div>
    <script>
    jQuery(document).ready(function() { 
    	jQuery('[data-toggle="tooltip"]').tooltip();
    	//jQuery('body').css('background-color','red');
    	//jQuery('#slider').css('border','1px red solid');
    	jQuery('#slider .carousel ol.carousel-indicators li:first-child').addClass('active');
    	jQuery('#slider .carousel-inner .item:first-child').addClass('active');
    	//jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
    	//jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
    	//jQuery('.carousel-inner').css('display','none');
    	jQuery('.carousel').carousel({
    		interval:3000
    	});
    });
    </script>