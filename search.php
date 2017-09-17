<?php get_header(); ?>
<div id="single" class="row">
	<header class="col-md-12">
		<h1><?php printf( __( 'Votre recherche&nbsp;: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header>
	<?php if ( function_exists('yoast_breadcrumb') ) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb col-md-12 hidden-xs">','</p>');} ?>
	<section>
	    
	</section>
	<section id="event">
		<div id="single-content" class="col-lg-8 col-md-8 col-sm-8">
			<?php dynamic_sidebar('home_sidebar3'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
									<header class="entry-header article-header">
	
										<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
										<p class="byline entry-meta vcard">
											<?php printf( __( 'Posté le ' ).' %1$s %2$s',
	                  							     /* the time the post was published */
	                  							     '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	                       								/* the author of the post */
	                       								'<span class="by">'.__('par').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
	                    							); ?>
										</p>
	
									</header>
	
									<main class="entry-content cf">
	
										<?php //the_post_thumbnail( 'medium' ); ?>
	
										<?php the_excerpt(); ?>
	
									</main>
	
									<footer class="article-footer">
	<a href="<?php the_permalink() ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Pour en savoir plus', 'tribe-events-calendar' ) ?> &raquo;</a>
									</footer>
									
							</article>

							<?php endwhile; ?>


							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php echo 'Oups, Aucun contenu trouvé !'; ?></h1>
										</header>
										<main class="entry-content">
											<p><?php echo 'Faites une nouvelle recherche.'; ?></p>
										</main>
									</article>

							<?php endif; ?>
</div>
		<aside class="col-lg-4 col-md-4 col-sm-4 hidden-xs" id="info">
	    	<?php get_sidebar(); ?>
	    </aside>
</section>
</div>

<?php get_footer(); ?>