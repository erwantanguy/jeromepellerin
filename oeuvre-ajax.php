        <?php unset($class); ?>
        <article class="col-md-3 col-sm-6 item" rel="<?php var_dump(get_field('long')); echo ' - '.$class; ?>">
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
			    <source srcset="<?php echo $srcfull; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srcfull; ?>" media="(max-width: 1000px)">
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
					
					//$class = array();
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
				<header>
                                    <?php $terms = wp_get_post_terms(get_the_ID(),array('categorie'));//print_r($terms);?>
                                    <?php //print_r($terms); ?>
                                    <?php if( get_field('long') === true )
{
    $class = " class=\"lignes\"";
}?>
                                    <h1<?php echo $class; ?>><a href="<?php the_permalink(); ?>"><?php the_field('titre');?></a></h1>
                                    <?php if( have_rows('sous-titre') ):while ( have_rows('sous-titre') ) : the_row();?><h2<?php if( get_row_layout() == 'sous-titre2' ): echo " class=\"lignes\""; endif;?>><a href="<?php the_permalink(); ?>"><?php the_sub_field('sous-titre');?></a></h2><?php endwhile;endif;?>
                                    <?php if(get_field('auteur')){?><h3><a href="<?php the_permalink(); ?>"><?php the_field('auteur');?></a></h3><?php }?>
                                    <div class="menuRef"><?php foreach($terms as $term):
                                        $catid = $term->term_id;
                                        $category_link = get_category_link( $catid );
                                        //var_dump($category_link);
                                        echo '<a href="'.esc_url( $category_link ).'">'.$term->name.'</a> ';
                                        endforeach;
                                        ?>
                                    </div>
                                </header>
        </article>