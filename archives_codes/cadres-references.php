<section id="masonry" class="row">
    <?php
        $terms = get_terms( 'tagexpo');
        $numero_archive = [];
        foreach ($terms as $term){
            $numero = get_field('numero', $term);
            $numero_archive[$numero] = ['nom'=>$term->name,'catid' => $term->term_id,'category_link' => get_category_link( $term->term_id ),'image_tax' => get_field('logo', $term ),'structure' => get_field('strutures', $term)];
            //$numero_archive[$numero]->nom .= $term->name;
            //$numero_archive[$numero].= array('catid' => $term->term_id);
            //$numero_archive[$numero].= array('category_link' => get_category_link( $term->term_id ));
            //$numero_archive[$numero].= array('image_tax' => get_field('logo', $term ));
            //$numero_archive[$numero][content]= 'test';
        }
        ksort( $numero_archive, SORT_NUMERIC );
        //print_r($numero_archive);
        $i = 0;
        foreach ( $numero_archive as $number => $term )if ($i < 12){
            $catid = $term[catid];
            $structure = $term[structure];
            //print_r($structure);
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
            
            //print_r($term);echo '<hr>';
            ?>
          
            <?php if($post2){?>
        <?php $os = $strutures;if(in_array($post2, $os)) {?>
        <article class="col-md-3 item" rel="<?php echo $struture.' - '.$catid; ?>">
	<?php echo '<a href="'.esc_url( $category_link ).'">';?>
	<?php //var_dump($term); ?>
		<figure rel="<?php echo $post; ?>">
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?>><img src="<?php echo $image_tax[sizes][vignetteAccueil]; ?>" alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
            <header>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$term[nom].'</h2>'; ?>
            </header>
		<?php echo '</a>';?>
            </article>
        <?php }?>
        <?php }else{?>
        <article class="col-md-3 item" rel="<?php echo $struture.' - '.$catid.' - '.$number; ?>">
           <?php echo '<a href="'.esc_url( $category_link ).'">';?>
	<?php //var_dump($term); ?>
		<figure>
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?>><img src="<?php echo $image_tax[sizes][vignetteAccueil]; ?>" alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
            <header>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$term[nom].'</h2>'; ?>
            </header>
		<?php echo '</a>';?>
            </article>
        <?php }?>
        <?php $i +=1;}
        
        echo '<article class="col-md-3 item">OLD</article>';
        
	$terms = get_terms( 'tagexpo', array(
            //'orderby'=>'id',
            'order'=>'ASC',
            //'meta_key' => 'numero',
            //'orderby' => 'meta_value',
            //'order' => 'DESC',
            ) );
	//print_r($terms);
        //var_dump($post2);
	foreach ($terms as $term) :
        //var_dump($term);
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
	$image_tax = get_field('logo', $term );
        if(empty($image_tax)){
            $image_tax = [
                'alt'=> 'test',
                'sizes' =>[
                    'news' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-390x390.jpg',
                    'vignetteAccueil' => 'http://www.ticoet.fr/jpellerin/wp-content/uploads/sites/18/2016/11/cadre-410x410.jpg',
                ]
            ];   
        }
        //$image_survol = get_field('image_survol', $term);
	//var_dump($custom_field);
?>
	
        <?php if($post2){?>
        <?php $os = get_field('strutures', $term);if(in_array($post2, $os)) {?>
        <article class="col-md-3 item" rel="<?php the_field('strutures', $term);echo ' - '.$catid; ?>">
	<?php echo '<a href="'.esc_url( $category_link ).'">';?>
	<?php //var_dump($term); ?>
		<figure rel="<?php echo $post; ?>">
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?>><img src="<?php echo $image_tax[sizes][vignetteAccueil]; ?>" alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
            <header>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$term->name.'</h2>'; ?>
            </header>
		<?php echo '</a>';?>
            </article>
        <?php }?>
        <?php }else{?>
        <article class="col-md-3 item" rel="<?php the_field('strutures', $term);echo ' - '.$catid; ?>">
           <?php echo '<a href="'.esc_url( $category_link ).'">';?>
	<?php //var_dump($term); ?>
		<figure>
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?>><img src="<?php echo $image_tax[sizes][vignetteAccueil]; ?>" alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
            <header>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$term->name.'</h2>'; ?>
            </header>
		<?php echo '</a>';?>
            </article>
        <?php }?>
	
<?php endforeach;?>
</section>