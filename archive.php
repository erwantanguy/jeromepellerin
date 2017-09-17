<?php get_header(); ?>

<section class="row">
	<header class="col-md-12">
		<h1><?php single_cat_title('<i class="fa fa-newspaper-o" aria-hidden="true"></i>
 '); ?></h1>
	</header>
	<?php include 'breadcrumb.php'; ?>
	<div class="col-md-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="row">
			<picture class="col-md-4">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('events'); ?></a>
			</picture>
			<div class="col-md-8">
				<header>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<time><i class="fa fa-clock-o" aria-hidden="true"></i>
 <?php the_date(); ?></time>
				</header>
				<main>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="pull-right btn btn-default">Lire la suite</a>
				</main>
			</div>
			
		</article>
		<?php endwhile; endif; ?>
	</div>
	
	<aside id="sidebar" class="col-md-4">
		<?php get_sidebar(); ?>
	</aside>
</section>


<?php get_footer(); ?>