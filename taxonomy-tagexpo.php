<?php get_header(); ?>

<section class="row">
	<?php
		$queried_object = get_queried_object();
		//$image_tax = get_field('logo', $queried_object);
	?>
	<header class="col-md-12<?php if( !empty($image) ){echo ' vertical';} ?>">
		<?php if(!empty($image_tax)){?>
				<figure>
					<picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][page]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][page]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][mobile]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][page]; ?>><img src=<?php echo $image_tax[sizes][page]; ?> alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
				</figure>
			<?php }?>
		<?php 
		?>
		<h1><?php single_cat_title(); ?></h1>
	</header>
	<?php include 'breadcrumb-reference.php'; ?>
	<?php if(do_shortcode(get_the_archive_description())){?>
	<main class="col-md-12">
		<?php echo do_shortcode(get_the_archive_description()); ?>
	</main>
        <?php
        $row=1;
        if( have_rows('seconde_ligne', $queried_object) ):?>
        <div id="subcontent" class="row"> 
        <?php while ( have_rows('seconde_ligne', $queried_object) ) : the_row();?>
          <aside class="col-md-12" rel="<?php echo $row; ?>">
            <main class="col-md-8<?php if($row%2==0){echo ' col-md-push-4';} ?>">
                <div><?php the_sub_field('texte');?></div>
            </main>
            <figure class="col-md-4<?php if($row%2==0){echo ' col-md-pull-8';} ?>">
                <?php $img = get_sub_field('image'); //print_r($img); ?>
                <picture alt="<?php echo $img['alt']; ?>">
                    <a href="<?php echo $img['sizes']['large']; ?>" rel="gallery-0"><img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>"></a>
                </picture>
            </figure>
          </aside>  
        <?php $row++;endwhile;?>
        </div>
        <div id="slides" class="row">
            <aside id="slideshow" class="col-md-12">
                <?php
                if( have_rows('calimeo_ou_slideshare', $queried_object) ):
                    while ( have_rows('calimeo_ou_slideshare', $queried_object) ) : the_row();
                        if( get_row_layout() == 'calimeo' ):?>
                            <div class="embed-responsive embed-responsive-<?php echo the_sub_field('169_ou_43'); ?>">
                                <?php the_sub_field('calimeo'); ?>
                            </div>
                        <?php elseif( get_row_layout() == 'slideshare' ): ?>
                            <div class="embed-responsive embed-responsive-<?php echo the_sub_field('169_ou_43'); ?>">
                                <?php the_sub_field('slideshare'); ?>
                            </div>
                        <?php endif;
                    endwhile;
                else :
                endif;
                ?>
            </aside>
        </div>
        <?php endif;?> 
	<?php } ?>
	<?php if(get_field('google_map', $queried_object)){?>
	<div id="map" class="col-md-6">
		<div class="embed-responsive embed-responsive-4by3">
			<?php echo get_field('google_map', $queried_object); ?>
		</div>
	</div>
	<?php } ?>
	<?php
		$lieu = $wp_query->get_queried_object()->term_id;
		$slug = $wp_query->get_queried_object()->slug;
		$oeuvres = new WP_Query(array(
			'post_type' => 'realisation',
			'orderby' => 'title',
			'order'   => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'tagexpo',
					'field' => 'term_id',
					'terms' => $lieu,
				),
			),
                        /*'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'archive',
                                    'value' => '',
                                    'compare' => 'NOT EXISTS',
                                ),
                                //array(
                                    //'key' => 'archive',
                                    //'value' => false,
                                    ////'compare' => 'NOT EXISTS',
                                //),
                                array(
                                    'key' => 'archive',
                                    'value' => true,
                                    'compare' => 'NOT IN',
                                ),
                            ),*/
		));
		if($oeuvres->have_posts()){?>
	<aside class="row">
		<h3 class="col-md-12">Les réalisations</h3>
		<?php while($oeuvres->have_posts()):$oeuvres->the_post(); ?>
		 <article class="col-md-2 col-xs-6 text-center"><?php //print_r(the_post_thumbnail_url('full')) ?>
                     <div class="thumbnail"><a href="<?php the_post_thumbnail_url('full');//the_permalink(); ?>" rel="gallery-<?php echo $lieu; ?>">
                           
				<figure>
					<?php if(has_post_thumbnail()) {?>
					<picture alt="<?php the_title(); ?>"><?php the_post_thumbnail('full'); ?></picture>
				<?php }else{?>
					<i class="fa fa-eye-slash" aria-hidden="true"></i>
				<?php }?>
				</figure>
                            </a>
			</div>
		</article>
	<?php endwhile;?>	
	<?php }
		//else{echo '<aside><h3 class="col-md-12">Il n\'y a pas d\'œuvre associée à ce lieu pour l\'instant</h3></aside>';}
	?>
                <?php if( have_rows('les_images', $queried_object) ):?>
                <?php while ( have_rows('les_images', $queried_object) ) : the_row();?>
                <article class="col-md-2 col-xs-6 text-center"><?php $img = get_sub_field('image'); //print_r($img); ?>
                    <div class="thumbnail"><a href="<?php echo $img['sizes']['large']; ?>" rel="gallery-<?php echo $lieu; ?>">
      <figure>
                <picture alt="<?php echo $img['alt']; ?>">
                    <img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>">
                </picture></figure>
                            </a>
			</div>
                </article>
    <?php endwhile;?>
    <?php endif;?>            
	</aside>

</section>

<?php get_footer(); ?>