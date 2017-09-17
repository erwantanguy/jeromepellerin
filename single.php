<?php get_header(); ?>

<section class="row">
	<article>
		<header class="col-md-12<?php if(get_the_post_thumbnail()){echo ' vertical';}?>">
			<?php include 'entete.php'; ?>
			<h1><?php the_title(); ?></h1>
		</header>
		<?php include 'breadcrumb.php'; ?>
		<main class="col-md-8">
			<time><i class="fa fa-clock-o" aria-hidden="true"></i> publié le
 <?php the_date(); ?></time>
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
			<aside id="comments">
				<?php //comments_template(); ?>
			</aside>
		</main>
		<aside id="sidebar" class="col-md-4">
			<?php get_sidebar(); ?>
		</aside>
	</article>
</section>


<?php get_footer(); ?>