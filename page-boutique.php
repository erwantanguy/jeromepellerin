<?php /*
Template name: Boutique
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
		<?php
		
		// check if the repeater field has rows of data
		if( have_rows('produit') ):
		
		 	// loop through the rows of data
		    while ( have_rows('produit') ) : the_row();?>
		    <article class="row">
		    	<figure class="col-md-4">
		    		<?php $image = get_sub_field('image'); //print_r($image[sizes]); ?>
		    		<picture alt="<?php echo $image[alt] ?>"><source srcset=<?php echo $image[sizes][sidebar]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image[sizes][medium]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image[sizes][thumbnail]; ?> media="(max-width:767px)"><source srcset=<?php echo $image[url]; ?>><img src=<?php echo $image[sizes][medium]; ?> alt="<?php echo $image[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		    	</figure>
		    	<div class="col-md-8">
		    		<header>
		    			<h1><?php the_sub_field('titre'); ?></h1>
		    		</header>
		    		<?php the_sub_field('texte'); ?>
		    		<?php if(get_sub_field('prix')):?><p class="prix"><span class="label label-danger"><i class="fa fa-euro"></i> <?php the_sub_field('prix'); ?></span><?php if(get_sub_field('texte_prix')):?> <span class="price"><?php the_sub_field('texte_prix');?></span><?php endif; ?></p><?php endif;?>
		    		<?php if(get_sub_field('lien')):?><a href="<?php the_sub_field('lien'); ?>"><i class="fa fa-link"></i> <?php the_sub_field('lien'); ?></a><?php else:?>
		    		Renseignement dans les boutiques des sites<br>
					<?php endif;?>
		    	</div>
				</article>
		    <?php endwhile;
		
		else :
		
		    // no rows found
		
		endif;
		
		?>
		<?php //the_content(); ?>
		<?php //endwhile; endif; ?>
		<?php if(get_field('code_video')){ ?>
		<aside id="video">
			<div class="embed-responsive embed-responsive-16by9">
				<?php the_field('code_video'); ?>
			</div>
		</aside>
		<?php }?>
	</main>
	<aside id="sidebar" class="col-md-4">
		<?php get_sidebar(); ?>
	</aside>
</section>


<?php get_footer(); ?>