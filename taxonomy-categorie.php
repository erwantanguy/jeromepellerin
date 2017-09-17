<?php get_header(); ?>

<section class="row">
	<?php
		$queried_object = get_queried_object();
		//$image_tax = get_field('image', $queried_object);
	?>
	<header class="col-md-12">
		<?php if(!empty($image_tax)){?>
				<figure>
					<picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][page]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][page]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][mobile]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][page]; ?>><img src=<?php echo $image_tax[sizes][page]; ?> alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
				</figure>
			<?php }?>
		<?php 
		?>
		<h1><?php single_cat_title(); ?></h1>
		<?php $urlcat = "/?categorie=".$term;$catname = $term; ?>
		<?php $idcat = get_queried_object()->term_id; ?>
		<?php //$current_category = single_cat_title("", false); ?>
	</header>
	<?php include 'breadcrumb-realisations.php'; ?>
</section>
<section class="row events">
	<?php $post = $_GET['reference']; ?>
	<nav id="localisation" class="col-lg-12 navbar navbar-default">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="javascript:;" data-categorie="<?php echo $idcat;?>">Tout</a></li>
			<?php //$terms = get_terms('referece', array('orderby'=> 'name','hide_empty' => false,));
                        $terms = get_terms( array(
                            'taxonomy' => 'referece',
                            /*'tax_query' => [
                                "relation" => "AND",
                                array('taxonomy' => 'categorie',
                                'field' => 'term_id',
                                'terms' => $idcat,
                                ),
                                array(
                                    'taxonomy' => 'referece',
                                )
                            ],*/
                            'hide_empty' => true,
                        ) );
			//print_r($terms);
			foreach ($terms as $term) {
			      $wpq = array ('taxonomy'=>'referece','orderby'=> 'name','term'=>$term->slug);
			      $myquery = new WP_Query ($wpq);
			      $article_count = $myquery->post_count;
				  if ($term->slug === $post){
				  	echo "<li><a class='on' href=\"javascript:;\" rel=\"".$term->slug."\">";
				  }else{
			      	echo "<li><a href=\"javascript:;\" rel=\"".$term->slug."\" data-categorie=\"".$idcat."\">";
				  }
			      echo $term->name;
			      echo "</a></li>";
			}
			?>
		</ul>
	</nav>
</section>
<?php 
$lieu = $wp_query->get_queried_object()->term_id;
//print_r($lieu.' - '.$slug);
?>
<section id="slider" class="row">
<?php include 'slider-tax-real.php';?>
</section>
<?php get_footer(); ?>