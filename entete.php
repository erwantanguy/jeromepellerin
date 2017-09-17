<?php if( have_rows('slider_copie') ){?>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		 <div class="carousel-inner" role="listbox">
		<?php  while ( have_rows('slider_copie') ) : the_row();?>
			<div class="item"><?php $image = get_sub_field('image');//print_r($image); ?>
				<picture alt="<?php echo $image['alt']; ?>"><source srcset=<?php echo $image['sizes']['mobile1']; ?> media="(max-width:767px)"><img src="<?php echo $image['sizes']['page']; ?>" alt="<?php echo $image['alt']; ?>" /></picture>
			</div>
		<?php endwhile;?>
		</div>
	</div>
<?php }else{?>
	<?php if(get_the_post_thumbnail()){?>
		<?php $image_full = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page');$image_mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mobile');$alt_text = get_post_meta(get_post_thumbnail_id($post->ID) , '_wp_attachment_image_alt', true);//print_r($alt_text); ?>
		<figure>
			<!--<picture>
				<?php the_post_thumbnail('page'); ?>
			</picture>-->
			<picture alt="<?php echo $alt_text; ?>"><source srcset=<?php echo $image_full[0]; ?> media="(min-width:1200px)"><source srcset=<?php echo $image_full[0]; ?> media="(max-width:991px) and (min-width: 768px)"><source srcset=<?php echo $image_mobile[0]; ?> media="(max-width:767px)"><source srcset=<?php echo $image_full[0]; ?>><img src=<?php echo $image_full[0]; ?> alt="<?php echo $alt_text; ?>" title="<?php the_sub_field('titre'); ?>"></picture>
		</figure>
	<?php }?>
<?php }?>