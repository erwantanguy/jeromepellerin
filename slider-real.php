<section id="slider" class="row">
		<div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
      <ol class="carousel-indicators hidden-xs">
       <?php rewind_posts(); 
       $toto=0;?>
       <?php if ( have_rows('images') ) { ?>
		<?php while (have_rows('images')) : the_row(); ?>
			<li class="" data-slide-to="<?php echo $toto;$toto++; ?>" data-target="#carousel-example-generic"></li>
		<?php endwhile;  } else{?>
        	<!-- <li class="test" data-slide-to="0" data-target="#carousel-example-generic"></li> -->
        <?php }?>
      </ol>
      <div role="listbox" class="carousel-inner">
      	<?php rewind_posts(); ?>
      	<?php if ( have_rows('images') ) { ?>
		<?php while (have_rows('images')) : the_row(); ?>
        <div class="item">
        <?php //the_sub_field('image');
		$image = get_sub_field('image');
		//print_r($image['sizes']['tablette']);

				//real dimension of the slideshow image is 516w x 248h
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					//the_post_thumbnail(array(4000,9999), array('class' => 'feature-large'));?>
					<picture id="picture<?php echo $post->ID; ?>">
				<?php 
					$srcfull = $image['sizes']['tablette'];
					$srclarge = $image['sizes']['sidebar'];
					$srcmedium = $image['sizes']['boutique'];
					$img_id = get_post_thumbnail_id($post->ID);
					$alt_text = $image['alt'];
					if (!$alt_text){
						$alt_text= get_the_title();
					}
					//echo 'test : '.$alt_text; //echo $test[0]; 
				?>
			    <source srcset="<?php echo $srcmedium; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull; ?>">
			    <img src="<?php echo $srclarge; ?>" srcset="<?php echo $srcfull[0]; ?>" alt="<?php echo $alt_text;?>">
			</picture>
				<?php	}
				?>
        </div>
        <?php endwhile;   } else{?>
        	<div class="item">
        		<picture>
        		<?php the_post_thumbnail('tablette'); ?>
        		</picture>
        	</div>
        <?php }?>
      </div>
      <?php if ( have_rows('images') ) { ?>
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
   </section>