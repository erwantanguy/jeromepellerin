<?php /*
Template name: Espace Pro
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
	<aside class="col-md-4" id="plus">
		<div class="widget_sidebar">
		<?php if(get_field('texte')){?>
			<?php the_field('texte'); ?>
			<?php if(get_field('telephone')):?><i class="fa fa-phone"></i> <a href="tel:<?php echo get_field('telephone');?>"><?php echo get_field('telephone'); ?></a><br><?php endif;?>
				<?php if(get_field('portable')):?><i class="fa fa-mobile"></i> <a href="tel:<?php echo get_field('portable');?>"><?php echo get_field('portable'); ?></a><br><?php endif;?>
			<?php if(get_field('mail')):?><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo antispambot(get_field('mail'));?>"><?php echo antispambot(get_field('mail')); ?></a><?php endif;?>
		<?php }else{
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page') );
		}?>
		</div>
	</aside>
</section>


<?php get_footer(); ?>