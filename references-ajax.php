        <article class="col-md-3 item">
          <?php 
				$imageUne = get_field('image_à_la_une');
                                if($imageUne){
                                    ?>
					<a href="<?php the_permalink();?>"><picture id="picture<?php echo $post->ID; ?>">
				<?php 
					$srcfull = $imageUne['sizes']['news'];
					$srclarge = $imageUne['sizes']['vignette'];
					$srcmedium = $imageUne['sizes']['vignette'];
					$img_id = get_post_thumbnail_id($post->ID);
					$alt_text = $imageUne['alt'];
					if (!$alt_text){
						$alt_text= get_the_title();
					}
					//echo 'test : '.$alt_text; //echo $test[0]; 
				?>
			    <source srcset="<?php echo $srcmedium; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull; ?>">
			    <img src="<?php echo $srclarge; ?>" srcset="<?php echo $srcfull; ?>" alt="<?php echo $alt_text;?>">
                                        </picture></a>
                                <?php
                                }
                                else{
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					//the_post_thumbnail(array(4000,9999), array('class' => 'feature-large'));?>
					<a href="<?php the_permalink();?>"><picture id="picture<?php echo $post->ID; ?>">
				<?php 
					$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news' );
					$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'vignette' );
					$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'vignette' );
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
                                <?php	}}
				?>
				<div>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php //$terms = get_terms('categorie', array('orderby'=> 'name',)); print_r($terms); ?>
					<?php $terms = wp_get_post_terms(get_the_ID(),array('category'));//print_r($terms);?>
					<?php foreach($terms as $term):
					echo '<a href="'.get_bloginfo('url').'/'.$term->taxonomy.'/'.$term->slug.'">'.$term->name.'</a> ';
					endforeach;
					?>
				</div>
        </article>