<?php get_header(); ?>
<?php //phpinfo(); ?>
<?php //if(!isMobile()){
	//include 'slider.php';
//} ?>
<?php
$my_query2 = new WP_Query(array(
		'post_type' => array( 'realisation'),
		'meta_query' => array(
				'relation' => 'OR',
				array(
						'key' => 'accueil',
						'value' => true,
				),
				array(
						'post__in' => get_option('sticky_posts'),
				),
		),
		'posts_per_page' => '4',
));
//print_r($my_query2);?>
<section id="realisations" class="row">
    <header>
    <?php if(get_field('zone_2', 'option')){?><h1><?php the_field('zone_2', 'option'); ?></h1><?php } ?>
    </header>
<?php 
if ( $my_query2->have_posts() ) :
while ( $my_query2->have_posts() ) : $my_query2->the_post();?>
<article class="col-xs-6 col-md-3">
<a href="<?php the_permalink(); ?>">
    <figure>
	<picture id="picture<?php echo $post->ID; ?>" alt="<?php echo $alt_text;?>">
		<?php 
			$srcfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'tablette' );
			$srclarge = wp_get_attachment_image_src( get_post_thumbnail_id(), 'sidebar' );
			$srcmedium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'boutique' );
			$img_id = get_post_thumbnail_id($post->ID);
			$alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);
                        //data-toggle="tooltip"
			if (!$alt_text){
				$alt_text= get_the_title();
			}
			//echo 'test : '.$alt_text; //echo $test[0]; 
		?>
	    <source srcset="<?php echo $srcmedium[0]; ?>" media="(max-width: 768px)">
	    <source srcset="<?php echo $srclarge[0]; ?>" media="(max-width: 1000px)">
	    <source srcset="<?php echo $srcfull[0]; ?>">
	    <img src="<?php echo $srclarge[0]; ?>" srcset="<?php echo $srcfull[0]; ?>" alt="<?php echo $alt_text;?>"  data-placement="bottom">
	</picture>
    </figure>
    <header>
        <?php $terms = wp_get_post_terms(get_the_ID(),array('categorie'));
        //print_r($terms);
        $refs = wp_get_post_terms(get_the_ID(),array('tagexpo'));
        //print_r($refs);
        foreach($refs as $ref):
        $refid = $ref->term_id;
        $ref_link = get_category_link( $refid );//echo esc_url( $ref_link );
        //var_dump($category_link);
        //echo '<a href="'.esc_url( $ref_link ).'">'.$term->name.'</a> ';
        endforeach;
        ?>
        <?php //print_r($terms); ?>
        <h1><?php the_field('titre');?></h1>
        <?php if( have_rows('sous-titre') ):while ( have_rows('sous-titre') ) : the_row();?><h2<?php if( get_row_layout() == 'sous-titre2' ): echo " class=\"lignes\""; endif;?>><?php the_sub_field('sous-titre');?></h2><?php endwhile;endif;?>
        <?php if(get_field('auteur')){?><h3><?php the_field('auteur');?></h3><?php }?>
        <div class="menuRef"><?php foreach($terms as $term):
            $catid = $term->term_id;
            $category_link = get_category_link( $catid );
            //var_dump($category_link);
            //echo '<a href="'.esc_url( $category_link ).'">'.$term->name.'</a> ';
            echo $term->name;
            endforeach;
            ?>
        </div>
    </header></a>
</article>
<?php endwhile;
else :
echo wpautop( 'Sorry, no posts were found' );
endif;?>
</section>
<section id="categories" class="row">
<?php
	$terms = get_terms( 'categorie',array(
		'meta_query' => array(
			'relation'		=> 'AND',
			array(
				'key' => 'accueil',
				'value' => true,
				'compare' => '='
			)
		)
 	));
	//print_r($terms);
	foreach ($terms as $term) :
	$catid = $term->term_id;
	$category_link = get_category_link( $catid );
	//$queried_object = get_queried_object(); 
	//var_dump($queried_object);
	//$image_tax = get_field('image', $queried_object);
	//$cat = $wp_query->get_queried_object()->term_id;
	//$terms_cat = get_the_terms( get_the_ID(), 'categorie');
	//$term_cat = array_pop($terms_cat);
	//$image_tax = get_field('image', $term_cat );
	//print_r($catid);
	$image_tax = get_field('image', $term );
        $image_survol = get_field('image_survol', $term);
	//var_dump($custom_field);
?>
	<aside class="col-md-3">
	<?php echo '<a href="'.esc_url( $category_link ).'">';?>
	<?php //var_dump($term); ?>
		<figure>
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][tablette]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][sidebar]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][boutique]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][tablette]; ?>><img src=<?php echo $image_tax[sizes][tablette]; ?> alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
                    <picture class="survol" alt="<?php echo $image_survol[alt] ?>"><source srcset=<?php echo $image_survol[sizes][tablette]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_survol[sizes][sidebar]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_survol[sizes][boutique]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_survol[sizes][tablette]; ?>><img src=<?php echo $image_survol[sizes][tablette]; ?> alt="<?php echo $image_survol[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$term->name.'</h2>'; ?>
		<?php echo '</a>';?>
	</aside>
<?php endforeach;
    $query_content = new WP_Query(array(
        'post_type' => 'page',
        'meta_query' => array(
		array(
                    //'post_type' => 'page',
                    'key' => 'accueil',
                    'value' => true,
                    //'compare' => '=='
		)
	),
    ));
    //print_r($query_content);
    if ( $query_content->have_posts() ) : while ( $query_content->have_posts() ) : $query_content->the_post();$image_survol=get_field('image_survol');$image_a_la_une=get_field('image_a_la_une');//print_r($image_survol);?>
        <aside class="col-md-3">
            <a href="<?php the_permalink(); ?>">
                <figure>
                    <picture>
                        <?php if($image_a_la_une){?>
                        <img src="<?php echo $image_a_la_une[url]; ?>" class="attachment-tablette size-tablette wp-post-image" alt="<?php echo $image_a_la_une[alt]; ?>" srcset="<?php echo $image_a_la_une[url]; ?> 768w, <?php echo $image_a_la_une[sizes][medium]; ?> 225w, <?php echo $image_a_la_une[sizes][event]; ?> 90w, <?php echo $image_a_la_une[sizes][sidebar]; ?> 360w, <?php echo $image_a_la_une[sizes][boutique]; ?> 250w, <?php echo $image_a_la_une[sizes][calendar]; ?> 116w" sizes="(max-width: 768px) 100vw, 768px" height="1024" width="768">
                        <?php }else{the_post_thumbnail('tablette');} ?>
                    </picture>
                    <picture class="survol">
                        <img src="<?php echo $image_survol[url]; ?>" class="attachment-tablette size-tablette wp-post-image" alt="<?php echo $image_survol[alt]; ?>" srcset="<?php echo $image_survol[url]; ?> 768w, <?php echo $image_survol[sizes][medium]; ?> 225w, <?php echo $image_survol[sizes][event]; ?> 90w, <?php echo $image_survol[sizes][sidebar]; ?> 360w, <?php echo $image_survol[sizes][boutique]; ?> 250w, <?php echo $image_survol[sizes][calendar]; ?> 116w" sizes="(max-width: 768px) 100vw, 768px" height="1024" width="768">
                        <?php  ?>
                    </picture>
                </figure>
                <h2><?php the_title(); ?></h2>
            </a>
        </aside>
<?php endwhile;endif; ?>
<?php 
    $blogs = get_terms(
            'category'
            /*,array(
                //'taxonomy' => ,
                //'hide_empty' => false,
                'meta_query' => array(
                     array(
                        //'key'       => 'accueil',
                        //'value'     => true,
                        //'compare'   => '='
                     )
                 )
            )*/
    );
    foreach ($blogs as $blog) :
	$catid = $blog->term_id;
	$category_link = get_category_link( $catid );
	//$queried_object = get_queried_object(); 
	//var_dump($queried_object);
	//$image_tax = get_field('image', $queried_object);
	//$cat = $wp_query->get_queried_object()->term_id;
	//$terms_cat = get_the_terms( get_the_ID(), 'categorie');
	//$term_cat = array_pop($terms_cat);
	//$image_tax = get_field('image', $term_cat );
	//print_r($catid);
	$image_tax = get_field('image', $blog );
        $image_survol = get_field('image_survol', $blog);
        $condition = get_field('accueil', $blog);
	//var_dump($custom_field);
        //var_dump($condition);
        if ($condition) :
?>
    <aside class="col-md-3">
	<?php echo '<a href="'.esc_url( $category_link ).'">';?>
	<?php //var_dump($term); ?>
		<figure>
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][tablette]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][sidebar]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][boutique]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][tablette]; ?>><img src=<?php echo $image_tax[sizes][tablette]; ?> alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
                    <picture class="survol" alt="<?php echo $image_survol[alt] ?>"><source srcset=<?php echo $image_survol[sizes][tablette]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_survol[sizes][sidebar]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_survol[sizes][boutique]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_survol[sizes][tablette]; ?>><img src=<?php echo $image_survol[sizes][tablette]; ?> alt="<?php echo $image_survol[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$blog->name.'</h2>'; ?>
		<?php echo '</a>';?>
	</aside>
<?php endif;endforeach;?>
<?php 
    if(have_rows('liens_externes_dans_la_zone_3', 'option')):
        while ( have_rows('liens_externes_dans_la_zone_3', 'option') ) : the_row();?>
        <?php $image_tax = get_sub_field('image');$image_survol = get_sub_field('image_survol');?>
        <aside class="col-md-3">
	<a href="<?php the_sub_field('lien'); ?>">
	<?php //var_dump($term); ?>
		<figure>
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][tablette]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][sidebar]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][boutique]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][tablette]; ?>><img src=<?php echo $image_tax[sizes][tablette]; ?> alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
                    <picture class="survol" alt="<?php echo $image_survol[alt] ?>"><source srcset=<?php echo $image_survol[sizes][tablette]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_survol[sizes][sidebar]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_survol[sizes][boutique]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_survol[sizes][tablette]; ?>><img src=<?php echo $image_survol[sizes][tablette]; ?> alt="<?php echo $image_survol[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
            <h2 id="heading<?php echo $catid; ?>" class="panel-heading col-md-8" role="tab"><?php the_sub_field('titre'); ?></h2>
        </a>
	</aside>
    <?php endwhile;
    endif;
?>
</section>

<?php
	if( get_field('oeuvres','option') ):
	$o_query = new WP_Query(
		array(
			'post_type' => 'oeuvre',
			'posts_per_page' => 1,
			'orderby' => 'rand',
			'meta_query' => array(
				array(
					'key' => 'accueil',
					'value' => true,
				)
			),
		)
	);
	$os_query = new WP_Query(
		array(
			'post_type' => 'oeuvre',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => ASC,
		)
	);
	//print_r($o_query);
	while($o_query->have_posts()): $o_query->the_post();
?>
	<section id="oeuvres" class="row">
		<article>
			<div id="oeuvre">
				<div class="col-md-4" id="img">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home_oeuvres'/*, array('class'=>'img-thumbnail')*/); ?></a>
				</div>
				<div class="col-md-4" id="titre">
					<header>
						<h1><?php the_title(); ?></h1>
						<?php //echo get_post_meta($post->ID,'_home_page',true); ?>
						<?php $terms = wp_get_post_terms($o_query->post->ID,array('lieux'));?>
					<?php foreach($terms as $term):
					echo '<h2><i class="fa fa-map-marker"></i> Lieu : <a href="'.get_bloginfo('url').'/'.$term->taxonomy.'/'.$term->slug.'">'.$term->name.'</a></h2>';
					endforeach;
					?>
					</header>
					<?php the_content('',FALSE,''); ?>
					<a href="<?php the_permalink(); ?>" class="btn btn-default">En savoir plus</a>
				</div>
			</div>
			<aside class="col-md-4">
				<dl class="list-group">
					<dt class="list-group-item active">Toutes les œuvres</dt>
					<dd class="list-group-item">
						<ul><!--  class="nav nav-pills nav-stacked" -->
				<?php while($os_query->have_posts()): $os_query->the_post(); ?>
							<li><a class="see" href="javascript:;" rel="<?php echo get_the_ID();?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
						</ul>
					</dd>
				</dl>
			</aside>
		</article>
	</section>
<?php endwhile; 
	endif; ?>
<?php if( get_field('socialmedia','option') ):  ?>
	<?php get_template_part('monfooter'); ?>
<?php endif; ?>
<?php get_footer(); ?>