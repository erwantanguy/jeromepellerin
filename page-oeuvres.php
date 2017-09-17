<?php /*
Template name: Oeuvres
 */
?>
<?php get_header(); ?>
<section class="row">
			<header class="col-md-12<?php if(get_the_post_thumbnail()){echo ' vertical';}?>">
				<?php include 'entete.php'; ?>
				<h1><?php the_title(); ?></h1>
			</header>
			<?php include 'breadcrumb.php'; ?>
			<div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
		<?php
			$terms = get_terms( 'lieux' );
			//print_r($terms);
		 ?>
		<?php 
		foreach ($terms as $term) :
		echo '<main class="col-md-12 panel panel-default">';
		//print_r($term);
		$catid = $term->term_id;
		echo '<div class="row"><h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab"><i class="fa fa-map-marker"></i> Lieu : <a href="'.get_bloginfo('url').'/'.$term->taxonomy.'/'.$term->slug.'">'.$term->name.'</a></h2>
						<aside class="col-md-4 text-right"><a class="collapsed" aria-controls="collapse'.$catid.'" aria-expanded="false" href="#collapse'.$catid.'" data-parent="#accordion" data-toggle="collapse" role="button"><i data-toggle="tooltip" data-placement="left" title="Voir les œuvres" class="fa fa-plus-square" aria-hidden="true"></i></a></aside></div>';
		//echo '<a href="http://schad-bretagne.fr/lieux/'.$term->slug.'" class="btn">En savoir plus</a>';
		//print_r($catid);
		$cat_query = new WP_Query (array(
			'post_type' => 'oeuvre',
			'orderby' => 'title',
			'order'   => 'ASC',
			'tax_query' => array(array('taxonomy' => 'lieux',
			'field' => 'id',
			'terms' => array($catid))),
			//'orderby' => 'menu_order',
			'posts_per_page' => -1,));
		//print_r($cat_query);?>
		<div aria-labelledby="heading<?php echo $catid; ?>" role="tabpanel" class="panel-collapse collapse row" id="collapse<?php echo $catid; ?>" aria-expanded="true">
		<?php if ($cat_query->have_posts()) : while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
		<article class="col-md-3 panel-body">
			<div class="thumbnail">
			<figure class="text-center">
				<?php if(has_post_thumbnail()) {?>
					<?php the_post_thumbnail('news'); ?>
				<?php }else{?>
					<i class="fa fa-eye-slash" aria-hidden="true"></i>
				<?php }?>
			</figure>
			<header class="caption"><?php if(get_field('long_titre')){$titre=substr(get_the_title(),0,15);$titre=$titre.'...'; }else{$titre=get_the_title();} ?>
				<h3<?php if(get_field('long_titre')){echo ' data-toggle="tooltip" data-placement="top" title="'.get_the_title().'"';}?>><a href="<?php the_permalink(); ?>"><?php echo $titre; ?></a></h3>
				<!--<h4><?php the_excerpt(); ?></h4>-->
			</header>
			</div>
		</article>
		<?php endwhile; endif; ?>
		</div>
		<?php if(get_field('code_video')){ ?>
		<aside id="video">
			<div class="embed-responsive embed-responsive-16by9">
				<?php the_field('code_video'); ?>
			</div>
		</aside>
		
		<?php } echo '</main>'; endforeach; ?>
		</div>
</section>
<script>
	jQuery(document).ready(function(){
		$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
	});
</script>

<?php get_footer(); ?>