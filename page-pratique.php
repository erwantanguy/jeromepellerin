<?php /*
Template name: Pratique
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
		if( have_rows('lieu') ):
		
		 	// loop through the rows of data
		    while ( have_rows('lieu') ) : the_row();?>
		    <article class="row">
				<?php $lieu = get_sub_field('nom_du_lieu'); ?>
				<?php $lien = get_term_by('id', $lieu, 'lieux');?><?php //print_r($lien);?>
				<header class="col-md-6 col-xs-12">
					<h1><i class="fa fa-map-marker"></i> <a href="<?php echo get_bloginfo('url').'/'.$lien->taxonomy.'/'.$lien->slug; ?>"><?php echo $lien->name; ?></a></h1>
					<address><i class="fa fa-location-arrow"></i> <?php the_sub_field('adresse');?><br>
					<?php if(get_sub_field('mail')):?><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo antispambot(get_sub_field('mail'));?>"><?php echo antispambot(get_sub_field('mail')); ?></a><br><?php endif;?>
					<?php if(get_sub_field('telephone')):?><i class="fa fa-phone"></i> <a href="tel:<?php echo get_sub_field('telephone');?>"><?php echo get_sub_field('telephone'); ?></a><br><?php endif;?>
					<?php if(get_sub_field('site_web')):?><i class="fa fa-external-link"></i> <a href="<?php echo get_sub_field('site_web');?>"><?php echo get_sub_field('site_web'); ?></a><?php endif;?>
					</address>
				</header>
				<div class="col-md-6 col-xs-12">
					<time><i class="fa fa-calendar"></i> <?php echo get_sub_field('date_douverture', false);?></time>
					<?php the_sub_field('horaires');?>
					<?php the_sub_field('tarifs');?>
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
	<aside class="col-md-4">
		<?php if(get_field('texte')){ ?>
			<?php the_field('texte'); ?>
		<?php }?>
	</aside>
</section>


<?php get_footer(); ?>