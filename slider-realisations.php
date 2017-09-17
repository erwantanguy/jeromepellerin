<section id="masonry" class="row">
		<?php
			$post = $_GET['categorie'];
			$lieu = $wp_query->get_queried_object()->term_id;
			$slug = $wp_query->get_queried_object()->slug;
			//print_r($post.' - '.$lieu.' - '.$slug);
			if($post){
				$my_query2 = new WP_Query(array(
					'post_type'		=> 'realisation',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order'   => 'DESC',
					'tax_query' => array(
						//'relation' => 'AND',
							array(
									'taxonomy' => 'categorie',
									//'field' => 'term_id',
									//'terms' => $lieu,
									'field' => 'slug',
									'terms' => $post,
							),
							/*array(
								'taxonomy' => 'referece',
								'field' => 'slug',
								'terms' => $post,
							)*/
						),
					//'tag_slug__in' => $post,
				));
			}
                        else{
                                if (is_page_template('page-archives.php')){
                                    $my_query2 = new WP_Query(array(
					'post_type' => 'realisation',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order'   => 'DESC',
                                        'meta_query' => array(
                                            array(
                                                'key' => 'archive',
                                                'value' => true,
                                            ),
                                        ),
                                    ));
                                }else{
                                    $my_query2 = new WP_Query(array(
					'post_type' => 'realisation',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order'   => 'DESC',
                                        'meta_query' => array(
                                            'relation' => 'OR',
                                            array(
                                                'key' => 'archive',
                                                'value' => '',
                                                'compare' => 'NOT EXISTS',
                                            ),
                                            /*array(
                                                'key' => 'archive',
                                                'value' => false,
                                                //'compare' => 'NOT EXISTS',
                                            ),*/
                                            array(
                                                'key' => 'archive',
                                                'value' => true,
                                                'compare' => 'NOT IN',
                                            ),
                                        ),
                                    ));//print_r($my_query2);
                                }
			}
				?>
      	<?php rewind_posts(); ?>
      	<?php if ( have_posts() ){ ?>
		<?php while ($my_query2->have_posts()) : $my_query2->the_post(); ?>
        <article class="col-md-3 col-sm-6 item"><a href="<?php the_permalink();?>">
          <?php                 $imageUne = get_field('image_à_la_une');
                                if($imageUne){
                                    ?>
					<picture id="picture<?php echo $post->ID; ?>">
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
			    <source srcset="<?php echo $srcfull; ?>" media="(max-width: 767px)">
			    <source srcset="<?php echo $srcfull; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull; ?>">
			    <img src="<?php echo $srclarge; ?>" srcset="<?php echo $srcfull; ?>" alt="<?php echo $alt_text;?>">
                                        </picture>
                                <?php
                                }
                                else{
					if ( function_exists( 'add_theme_support' ) && has_post_thumbnail()){
					//the_post_thumbnail(array(4000,9999), array('class' => 'feature-large'));?>
					<picture id="picture<?php echo $post->ID; ?>">
				<?php 
					$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'news' );
					$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'vignette' );
					$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'vignette' );
					$img_id = get_post_thumbnail_id($post->ID);
					$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
                                        $class = array();
					if (!$alt_text){
						$alt_text= get_the_title();
					}
					//echo 'test : '.$alt_text; //echo $test[0]; 
				?>
			    <source srcset="<?php echo $srcmedium[0]; ?>" media="(max-width: 768px)">
			    <source srcset="<?php echo $srclarge[0]; ?>" media="(max-width: 1000px)">
			    <source srcset="<?php echo $srcfull[0]; ?>">
			    <img src="<?php echo $srclarge[0]; ?>" srcset="<?php echo $srcfull[0]; ?>" alt="<?php echo $alt_text;?>">
                                        </picture>
                                <?php	}}
				?>
				<header>
                                    <?php $terms = wp_get_post_terms(get_the_ID(),array('categorie'));//print_r($terms);?>
                                    <?php //print_r($terms); ?>
                                    <?php if( get_field('long') )
{
    $class[$post->ID] = " class=\"lignes\"";
}?>
                                    <h1<?php echo $class[$post->ID]; ?>><?php the_field('titre');?></h1>
                                    <?php if( have_rows('sous-titre') ):while ( have_rows('sous-titre') ) : the_row();?><h2<?php if( get_row_layout() == 'sous-titre2' ): echo " class=\"lignes\""; endif;?>><?php the_sub_field('sous-titre');?></h2><?php endwhile;endif;?>
                                    <?php if(get_field('auteur')){?><h3><?php the_field('auteur');?></h3><?php }?>
                                    <div class="menuRef"><?php foreach($terms as $term):
                                        $catid = $term->term_id;
                                        $category_link = get_category_link( $catid );
                                        //var_dump($category_link);
                                        echo $term->name;
                                        endforeach;
                                        ?>
                                    </div>
                                </header>
        </a></article>
        <?php endwhile;   } 
        else{?>
        	<article class="item">
        		<img alt="First slide [900x500]" src="<?php header_image(); ?>" alt="<?php bloginfo( 'description' ); ?>">
        	</article>
        <?php }?>
    <?php //print_r($class); ?>
   </section>