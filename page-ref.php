<?php /*
Template name: Références 2
 */
?>
<?php get_header(); ?>
<section class="row">
	<header class="col-md-12">
		<h1><?php the_title(); ?></h1>
		<?php //$current_category = single_cat_title("", false); ?>
	</header>
	<?php include 'breadcrumb.php'; ?>
</section>
    <?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
        			'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'institution',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="institution" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
		<?php include 'page-ref-tool.php';?>
        <?php $i +=1;}?>
        
	</section><?php endif; ?>
	
	<?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
					'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'event',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="event" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
        <?php include 'page-ref-tool.php';?>

        <?php $i +=1;}?>
        
	</section><?php endif; ?>
	
	<?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
					'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'compagnie',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="compagnie" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
        <?php include 'page-ref-tool.php';?>

        <?php $i +=1;}?>
        
	</section><?php endif; ?>
	
	<?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
					'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'artiste',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="artiste" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
        <?php include 'page-ref-tool.php';?>

        <?php $i +=1;}?>
        
	</section><?php endif; ?>
	
	<?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
					'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'collectivite',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="collectivite" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
        <?php include 'page-ref-tool.php';?>

        <?php $i +=1;}?>
        
	</section><?php endif; ?>
	
	<?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
					'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'entreprise',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="entreprise" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
        <?php include 'page-ref-tool.php';?>

        <?php $i +=1;}?>
        
	</section><?php endif; ?>
		
	<?php
        $terms = get_terms( array(
                    'taxonomy' => 'tagexpo',
					'hide_empty' => 0,
                    'meta_query' => array(
                        array(
                           'key'       => 'strutures',
                           'value'     => 'publique',
                           'compare'   => 'LIKE'
                        )
                   )
                    ) );
        $numero_archive = [];
        if($terms):
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
        }
        ksort( $numero_archive, SORT_NUMERIC );
        $i = 0;?>
        <section rel="publique" class="row masonry">
        <?php foreach ( $numero_archive as $number => $term )if ($i < 1000){
            $catid = $term[catid];
            $structure = $term[structure];
            $category_link = $term[category_link];
            $image_tax = $term[image_tax];
            if(empty($image_tax)){
                $image_tax = [
                    'alt'=> 'test',
                    'sizes' =>[
                        'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                        'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                    ]
                ];   
            }
            ?>
        <?php include 'page-ref-tool.php';?>

        <?php $i +=1;}?>
        
	</section><?php endif; ?>

<?php get_footer(); ?>