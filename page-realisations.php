<?php /*
Template name: Réalisations
 */
?>
<?php get_header(); ?>
<section class="row" rel="<?php the_field('accueil'); ?>">
	<header class="col-md-12">
		<h1><?php the_title(); ?></h1>
		<?php //$current_category = single_cat_title("", false); ?>
	</header>
	<?php include 'breadcrumb.php'; ?>
</section>
<section class="row events">
	<?php $post = $_GET['categorie']; ?>
	<nav id="localisation" class="col-lg-12 navbar navbar-default">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="javascript:;">Tout</a></li>
			<?php $terms = get_terms('categorie', array('orderby'=> 'name',));
			//print_r($terms);
			foreach ($terms as $term) {
			      $wpq = array ('taxonomy'=>'categorie','orderby'=> 'name','term'=>$term->slug);
			      $myquery = new WP_Query ($wpq);
			      $article_count = $myquery->post_count;
				  if ($term->slug === $post){
				  	echo "<li><a class='on' href=\"javascript:;\" rel=\"".$term->slug."\"><!--?categorie=".$term->slug."-->";
				  }else{
			      	echo "<li><a href=\"javascript:;\" rel=\"".$term->slug."\"><!--?categorie=".$term->slug."-->";
				  }
			      echo $term->name;
			      echo "</a></li>";
			}
			?>
		</ul>
	</nav>
</section>
<?php include 'slider-realisations.php';?>
<?php get_footer(); ?>