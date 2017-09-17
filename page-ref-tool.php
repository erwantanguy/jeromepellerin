<article class="col-md-3 col-sm-4 col-xs-6 item" rel="<?php echo 'cat'.$catid.' - class'.$number; ?>">
           <?php echo '<a href="'.esc_url( $category_link ).'">';?>
		<figure>
                    <picture alt="<?php echo $image_tax[alt] ?>"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_tax[sizes][news]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_tax[sizes][vignetteAccueil]; ?>><img src="<?php echo $image_tax[sizes][vignetteAccueil]; ?>" alt="<?php echo $image_tax[alt] ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
            <header>
		<?php echo '<h2 id="heading'.$catid.'" class="panel-heading col-md-8" role="tab">'.$term[nom].'</h2>'; ?>
            </header>
		<?php echo '</a>';?>
            </article>